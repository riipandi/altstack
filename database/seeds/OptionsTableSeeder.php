<?php

use Appstract\Options\Option;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $options = [
                ['key' => 'site_name',    'value' => 'Your Company Name'],
                ['key' => 'site_tagline', 'value' => 'An inspiring tagline'],
            ];

            foreach ($options as $option) {
                Option::create($option);
            }
    }
}
