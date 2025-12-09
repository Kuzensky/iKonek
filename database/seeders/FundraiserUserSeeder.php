<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FundraiserUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Maria Santos',
                'email' => 'maria.santos@example.com',
                'password' => Hash::make('password123'),
                'contact_number' => '+63 917 123 4567',
                'blood_type' => 'O+',
                'birthdate' => '1985-03-15',
                'sex' => 'female',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'juan.delacruz@example.com',
                'password' => Hash::make('password123'),
                'contact_number' => '+63 918 234 5678',
                'blood_type' => 'A+',
                'birthdate' => '1990-07-22',
                'sex' => 'male',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Pedro Gonzales',
                'email' => 'pedro.gonzales@example.com',
                'password' => Hash::make('password123'),
                'contact_number' => '+63 919 345 6789',
                'blood_type' => 'B+',
                'birthdate' => '1982-11-08',
                'sex' => 'male',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Ana Reyes',
                'email' => 'ana.reyes@example.com',
                'password' => Hash::make('password123'),
                'contact_number' => '+63 920 456 7890',
                'blood_type' => 'AB+',
                'birthdate' => '1988-05-30',
                'sex' => 'female',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Rosa Cruz',
                'email' => 'rosa.cruz@example.com',
                'password' => Hash::make('password123'),
                'contact_number' => '+63 921 567 8901',
                'blood_type' => 'O-',
                'birthdate' => '1992-09-12',
                'sex' => 'female',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        $this->command->info('Successfully created 5 fundraiser user accounts!');
        $this->command->info('All accounts use password: password123');
    }
}
