<?php

namespace Database\Seeders;

use App\Models\SmsSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SmsSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = [
            'sms_driver' => 'Twilio',
            'sms_api_key' => '1234567890',
            'sms_from' => '1234567890',
        ];

        SmsSetting::create($setting);

        $this->command->info('SMS settings added successfully.');

        return;
    }
}
