<?php

namespace Database\Seeders;

use App\Models\DefaultSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = [
            'site_name' => 'Laravel',
            'site_url' => 'https://laravel.com',
            'site_timezone' => 'UTC',
            'site_currency' => 'USD',
            'site_currency_symbol' => '$',
            'site_logo' => 'default_site_logo.png',
            'site_favicon' => 'default_site_favicon.png',
            'site_main_email' => 'info@gmail.com',
            'site_support_email' => 'support@gmail.com',
            'site_main_phone' => '1234567890',
            'site_support_phone' => '1234567890',
            'site_address' => '123, Street, City, Country',
            'site_facebook' => 'https://facebook.com',
            'site_twitter' => 'https://twitter.com',
            'site_instagram' => 'https://instagram.com',
            'site_linkedin' => 'https://linkedin.com',
            'site_pinterest' => 'https://pinterest.com',
            'site_youtube' => 'https://youtube.com',
            'site_whatsapp' => 'https://whatsapp.com',
            'site_telegram' => 'https://telegram.com',
            'site_tiktok' => 'https://tiktok.com',
        ];

        DefaultSetting::create($setting);

        $this->command->info('Default settings added successfully.');

        return;
    }
}
