<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hospitals = [
            [
                'name' => 'Philippine General Hospital',
                'address' => 'Taft Avenue, Ermita, Manila',
                'city' => 'Manila',
                'province' => 'Metro Manila',
                'contact_number' => '(02) 8554-8400',
                'email' => 'pgh@up.edu.ph',
                'is_active' => true,
            ],
            [
                'name' => 'St. Luke\'s Medical Center - Global City',
                'address' => 'Bonifacio Global City, Taguig',
                'city' => 'Taguig',
                'province' => 'Metro Manila',
                'contact_number' => '(02) 7789-7700',
                'email' => 'info@stluke.com.ph',
                'is_active' => true,
            ],
            [
                'name' => 'The Medical City',
                'address' => 'Ortigas Avenue, Pasig City',
                'city' => 'Pasig',
                'province' => 'Metro Manila',
                'contact_number' => '(02) 8988-1000',
                'email' => 'info@themedicalcity.com',
                'is_active' => true,
            ],
            [
                'name' => 'Makati Medical Center',
                'address' => '2 Amorsolo Street, Legaspi Village, Makati',
                'city' => 'Makati',
                'province' => 'Metro Manila',
                'contact_number' => '(02) 8888-8999',
                'email' => 'info@makatimed.net.ph',
                'is_active' => true,
            ],
            [
                'name' => 'Asian Hospital and Medical Center',
                'address' => '2205 Civic Drive, Filinvest Corporate City, Alabang, Muntinlupa',
                'city' => 'Muntinlupa',
                'province' => 'Metro Manila',
                'contact_number' => '(02) 8771-9000',
                'email' => 'info@asianhospital.com',
                'is_active' => true,
            ],
            [
                'name' => 'Chinese General Hospital',
                'address' => '286 Blumentritt Street, Santa Cruz, Manila',
                'city' => 'Manila',
                'province' => 'Metro Manila',
                'contact_number' => '(02) 8711-4141',
                'email' => 'info@cgh.com.ph',
                'is_active' => true,
            ],
            [
                'name' => 'Veterans Memorial Medical Center',
                'address' => 'North Avenue, Quezon City',
                'city' => 'Quezon City',
                'province' => 'Metro Manila',
                'contact_number' => '(02) 8927-5555',
                'email' => 'info@vmmc.gov.ph',
                'is_active' => true,
            ],
            [
                'name' => 'Manila Doctors Hospital',
                'address' => '667 United Nations Avenue, Ermita, Manila',
                'city' => 'Manila',
                'province' => 'Metro Manila',
                'contact_number' => '(02) 8558-0888',
                'email' => 'info@maniladoctors.com.ph',
                'is_active' => true,
            ],
            [
                'name' => 'De La Salle University Medical Center',
                'address' => 'Governor D. Mangubat Avenue, Dasmariñas, Cavite',
                'city' => 'Dasmariñas',
                'province' => 'Cavite',
                'contact_number' => '(046) 481-8000',
                'email' => 'info@dlsumc.com.ph',
                'is_active' => true,
            ],
            [
                'name' => 'Lung Center of the Philippines',
                'address' => 'Quezon Avenue, Quezon City',
                'city' => 'Quezon City',
                'province' => 'Metro Manila',
                'contact_number' => '(02) 8924-6101',
                'email' => 'info@lungcenter.gov.ph',
                'is_active' => true,
            ],
        ];

        foreach ($hospitals as $hospital) {
            Hospital::create($hospital);
        }
    }
}
