<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use RecursiveIteratorIterator;

class VendorCleanup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vendor:cleanup {--o : Verbose Output} {--dry : Runs in dry mode without deleting files.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleans up useless files from vendor folder.';

    // Default patterns for common files
    protected $patterns = [
        '.git',
        '.github',
        'test',
        'tests',
        'docs',
        'travis',
        'demo',
        'demos',
        'example',
        'examples',
        'todo',
        'license',
        'changelog*',
        'contributing*',
        'upgrading*',
        'upgrade*',
        '.idea',
        '.vagrant',
        'readme*',
        '_ide_helper.php',
        '{,.}*.yml',
        '*.dist',
        '*.md',
        '*.log',
        '*.txt',
        '*.pdf',
        '*.xls',
        '*.doc',
        '*.docx',
        '*.png',
        '*.gif',
        '*.bmp',
        '*.ico',
        '*.jpg',
        '*.jpeg',
        '.php_cs*',
        '.scrutinizer',
        '.gitignore',
        '.gitattributes',
        '.editorconfig',
        'dockerfile',
        'phpcs.xml',
        'phpunit.xml',
        'build.xml',
        'package.xml',
        'package.json',
        'Makefile',
        'Doxyfile',
        'gulpfile.js',
        'bower.json',
        'karma.conf.js',
        'yarn.lock',
        '.babelrc',
        'package.js',
        '.htaccess',
        'CNAME',
        'LICENSE*',
        '.gitmodules',
        'composer.json',
        'composer.lock',
    ];

    // These paths/patterns will NOT be deleted
    protected $excluded = [
        'laravel-mail-preview/tests',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $patterns = array_diff($this->patterns, $this->excluded);
        $directories = $this->expandTree(base_path('vendor'));
        $isDry = $this->option('dry');
        foreach ($directories as $directory) {
            foreach ($patterns as $pattern) {
                $casePattern = preg_replace_callback('/([a-z])/i', [$this, 'prepareWord'], $pattern);
                $files = glob($directory.'/'.$casePattern, GLOB_BRACE);
                if (!$files) {
                    continue;
                }
                $files = array_diff($files, $this->excluded);
                foreach ($this->excluded as $excluded) {
                    $key = $this->arrayFind($excluded, $files);
                    if ($key !== false) {
                        $this->out('SKIPPED: '.$files[$key]);
                        unset($files[$key]);
                    }
                }
                foreach ($files as $file) {
                    if (is_dir($file)) {
                        $this->out('DELETING DIR: '.$file);
                        if (!$isDry) {
                            $this->delTree($file);
                        }
                    } else {
                        $this->out('DELETING FILE: '.$file);
                        if (!$isDry) {
                            @unlink($file);
                        }
                    }
                }
            }
        }
        $this->out('Vendor Cleanup Done!');
    }

    /**
     * Recursively traverses the directory tree.
     *
     * @param string $dir
     *
     * @return array
     */
    protected function expandTree($dir)
    {
        $directories = [];
        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            $directory = $dir.'/'.$file;
            if (is_dir($directory)) {
                $directories[] = $directory;
                $directories = array_merge($directories, $this->expandTree($directory));
            }
        }

        return $directories;
    }

    /**
     * Recursively deletes the directory.
     *
     * @param string $dir
     *
     * @return bool
     */
    protected function delTree($dir)
    {
        if (!file_exists($dir) || !is_dir($dir)) {
            return false;
        }
        $iterator = new RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );
        foreach ($iterator as $filename => $fileInfo) {
            if ($fileInfo->isDir()) {
                @rmdir($filename);
            } else {
                @unlink($filename);
            }
        }
        @rmdir($dir);
    }

    /**
     * Prepare word.
     *
     * @param string $matches
     *
     * @return string
     */
    protected function prepareWord($matches)
    {
        return '['.strtolower($matches[1]).strtoupper($matches[1]).']';
    }

    protected function arrayFind($needle, array $haystack)
    {
        foreach ($haystack as $key => $value) {
            if (false !== stripos($value, $needle)) {
                return $key;
            }
        }

        return false;
    }

    protected function out($message)
    {
        if ($this->option('o') || $this->option('dry')) {
            $this->info(PHP_EOL.$message);
        }
    }
}
