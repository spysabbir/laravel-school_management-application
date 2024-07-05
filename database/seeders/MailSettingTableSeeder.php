<?php

namespace Database\Seeders;

use App\Models\MailSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = [
            'mail_driver' => 'smtp',
            'mail_mailer' => 'smtp',
            'mail_host' => 'smtp.mailtrap.io',
            'mail_port' => '2525',
            'mail_username' => 'your_username',
            'mail_password' => 'your_password',
            'mail_encryption' => 'tls',
            'mail_from_address' => 'noreply@gmail.com',
        ];

        MailSetting::create($setting);

        $this->command->info('Mail settings added successfully.');

        return;
    }
}
