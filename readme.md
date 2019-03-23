# 📦 Gram - A Laravel Starter Pack

[![Build Status](https://travis-ci.org/ruhaycreative/gram.svg?branch=master)](https://travis-ci.org/ruhaycreative/gram)
[![StyleCI Status](https://github.styleci.io/repos/174728418/shield?branch=master)](https://github.styleci.io/repos/174728418)
[![Total Download](https://poser.pugx.org/ruhaycreative/gram/d/total.svg?format=flat-square)](https://packagist.org/packages/ruhaycreative/gram)
[![Latest Stable Version](https://poser.pugx.org/ruhaycreative/gram/v/stable.svg?format=flat-square)](https://packagist.org/packages/ruhaycreative/gram)
[![License](https://img.shields.io/badge/license-Apache%202-blue.svg?style=flat-square)](https://choosealicense.com/licenses/apache-2.0/)

## Introduction

Gram is the Laravel template with TailwindCSS as default preset and ships with some features like 
Passport, Socialite, and some debugging tools. Gram used for (nearly) all our projects, but you 
may use our template but please notice that we offer no support whatsoever. We also don't follow 
semver for this project and won't guarantee that the code (especially the master branch) is stable. 
In short: when using this, you're on your own.

## Quick Start

At least you will need `PHP >= 7.2` and `Nodejs >= 8.15`. You can choose between `PostgreSQL >= 9.6` 
or `MySQL >= 5.7` or `MariaDB >= 10.3` for your application database. Also, you maybe want to use 
`Redis >= 3.2` for session store and caching.

### Create New Project

```
composer create-project ruhaycreative/gram <app_name> <version>
```

Change `<app_name>` with your own and `<version>` with this gram version. 
See [release page](https://github.com/ruhaycreative/gram/release) for the version number.

### Local Installation

Edit or create `.env` file and then execute:

```bash
composer install
npm i --no-optional
npm run development
php artisan web-tinker:install
php artisan migrate:fresh --seed
php artisan passport:install
```

### Nginx Configuration

```nginx
location / {
    try_files $request_uri $request_uri/ /index.php?$query_string;
}
```

### Automatic Versioning

Edit `config/version.yml` file and change the remote git repository value with your own. 
You will need add git hooks, open `.git/hooks/post-commit` and put this code:

```bash
#!/bin/sh
php artisan version:refresh
```

## Contributing

Current state we won't accept any PR requests to this project. If you have discovered a bug or 
have an idea to improve the code, contact us first before you start coding.

## Security Issue

If you discover any security related issues, please send an e-mail to
[dev@ruhaycreative.com](mailto:dev@ruhaycreative.com) instead of using the issue tracker.

## License

Laravel is a trademark of Taylor Otwel, and TailwindCSS is a trademark of Adam Wathan. 
Gram licensed under the terms of [Apache License 2.0](https://choosealicense.com/licenses/apache-2.0/).
Please see [license file](./license.txt) for more information.