<?php

namespace Database\Seeders;

use App\Models\SeoSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = [
            'meta_title' => 'Laravel',
            'meta_author' => 'Laravel',
            'meta_keywords' => 'Laravel',
            'meta_description' => 'Laravel',

            'og_title' => 'Laravel',
            'og_type' => 'Laravel',
            'og_url' => 'Laravel',
            'og_image' => 'default_og_image.png',
            'og_description' => 'Laravel',
            'og_site_name' => 'Laravel',

            'twitter_card' => 'Laravel',
            'twitter_site' => 'Laravel',
            'twitter_title' => 'Laravel',
            'twitter_description' => 'Laravel',
            'twitter_image' => 'default_twitter_image.png',
            'twitter_image_alt' => 'Laravel',
        ];

        SeoSetting::create($setting);

        $this->command->info('SEO settings added successfully.');

        return;
    }
}
