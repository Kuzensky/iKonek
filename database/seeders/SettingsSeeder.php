<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'platform_name',
                'value' => 'iKonek',
                'type' => 'string',
                'group' => 'general'
            ],
            [
                'key' => 'platform_tagline',
                'value' => 'Connecting Communities',
                'type' => 'string',
                'group' => 'general'
            ],
            [
                'key' => 'contact_email',
                'value' => 'contact@ikonek.com',
                'type' => 'string',
                'group' => 'general'
            ],
            [
                'key' => 'contact_phone',
                'value' => '+63 XXX XXX XXXX',
                'type' => 'string',
                'group' => 'general'
            ],
            [
                'key' => 'contact_address',
                'value' => 'Manila, Philippines',
                'type' => 'string',
                'group' => 'general'
            ],
            [
                'key' => 'timezone',
                'value' => 'Asia/Manila',
                'type' => 'string',
                'group' => 'general'
            ],
            [
                'key' => 'default_language',
                'value' => 'en',
                'type' => 'string',
                'group' => 'general'
            ],
            [
                'key' => 'maintenance_mode',
                'value' => '0',
                'type' => 'boolean',
                'group' => 'general'
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
