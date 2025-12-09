<?php

namespace Database\Seeders;

use App\Models\Hospital;
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
                'region' => 'National Capital Region (NCR)',
                'contact_number' => '(02) 8554-8400',
                'email' => 'pgh@up.edu.ph',
                'blood_types_available' => ['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'],
                'operating_hours' => '24/7',
                'monthly_capacity' => 200,
                'status' => 'active',
                'is_active' => true,
            ],
            [
                'name' => 'St. Luke\'s Medical Center - Global City',
                'address' => 'Bonifacio Global City, Taguig',
                'city' => 'Taguig',
                'region' => 'National Capital Region (NCR)',
                'contact_number' => '(02) 7789-7700',
                'email' => 'info@stluke.com.ph',
                'blood_types_available' => ['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'],
                'operating_hours' => '24/7',
                'monthly_capacity' => 180,
                'status' => 'active',
                'is_active' => true,
            ],
            [
                'name' => 'The Medical City',
                'address' => 'Ortigas Avenue, Pasig City',
                'city' => 'Pasig',
                'region' => 'National Capital Region (NCR)',
                'contact_number' => '(02) 8988-1000',
                'email' => 'info@themedicalcity.com',
                'blood_types_available' => ['O+', 'A+', 'B+', 'AB+'],
                'operating_hours' => '24/7',
                'monthly_capacity' => 150,
                'status' => 'active',
                'is_active' => true,
            ],
            [
                'name' => 'Makati Medical Center',
                'address' => '2 Amorsolo Street, Legaspi Village, Makati',
                'city' => 'Makati',
                'region' => 'National Capital Region (NCR)',
                'contact_number' => '(02) 8888-8999',
                'email' => 'info@makatimed.net.ph',
                'blood_types_available' => ['O+', 'O-', 'A+', 'B+', 'AB+'],
                'operating_hours' => '24/7',
                'monthly_capacity' => 160,
                'status' => 'active',
                'is_active' => true,
            ],
            [
                'name' => 'Asian Hospital and Medical Center',
                'address' => '2205 Civic Drive, Filinvest Corporate City, Alabang, Muntinlupa',
                'city' => 'Muntinlupa',
                'region' => 'National Capital Region (NCR)',
                'contact_number' => '(02) 8771-9000',
                'email' => 'info@asianhospital.com',
                'blood_types_available' => ['O+', 'A+', 'B+', 'AB+', 'O-'],
                'operating_hours' => '24/7',
                'monthly_capacity' => 140,
                'status' => 'active',
                'is_active' => true,
            ],
            [
                'name' => 'Chinese General Hospital',
                'address' => '286 Blumentritt Street, Santa Cruz, Manila',
                'city' => 'Manila',
                'region' => 'National Capital Region (NCR)',
                'contact_number' => '(02) 8711-4141',
                'email' => 'info@cgh.com.ph',
                'blood_types_available' => ['O+', 'A+', 'B+', 'AB+'],
                'operating_hours' => '24/7',
                'monthly_capacity' => 120,
                'status' => 'active',
                'is_active' => true,
            ],
            [
                'name' => 'Veterans Memorial Medical Center',
                'address' => 'North Avenue, Quezon City',
                'city' => 'Quezon City',
                'region' => 'National Capital Region (NCR)',
                'contact_number' => '(02) 8927-5555',
                'email' => 'info@vmmc.gov.ph',
                'blood_types_available' => ['O+', 'O-', 'A+', 'A-', 'B+', 'AB+'],
                'operating_hours' => '24/7',
                'monthly_capacity' => 100,
                'status' => 'active',
                'is_active' => true,
            ],
            [
                'name' => 'Manila Doctors Hospital',
                'address' => '667 United Nations Avenue, Ermita, Manila',
                'city' => 'Manila',
                'region' => 'National Capital Region (NCR)',
                'contact_number' => '(02) 8558-0888',
                'email' => 'info@maniladoctors.com.ph',
                'blood_types_available' => ['O+', 'A+', 'B+'],
                'operating_hours' => 'MON-FRI 8AM-5PM',
                'monthly_capacity' => 80,
                'status' => 'active',
                'is_active' => true,
            ],
            [
                'name' => 'De La Salle University Medical Center',
                'address' => 'Governor D. Mangubat Avenue, Dasmariñas, Cavite',
                'city' => 'Dasmariñas',
                'region' => 'Region IV-A (CALABARZON)',
                'contact_number' => '(046) 481-8000',
                'email' => 'info@dlsumc.com.ph',
                'blood_types_available' => ['O+', 'A+', 'B+', 'AB+'],
                'operating_hours' => '24/7',
                'monthly_capacity' => 130,
                'status' => 'active',
                'is_active' => true,
            ],
            [
                'name' => 'Lung Center of the Philippines',
                'address' => 'Quezon Avenue, Quezon City',
                'city' => 'Quezon City',
                'region' => 'National Capital Region (NCR)',
                'contact_number' => '(02) 8924-6101',
                'email' => 'info@lungcenter.gov.ph',
                'blood_types_available' => ['O+', 'A+', 'B+', 'AB+', 'O-', 'A-'],
                'operating_hours' => 'MON-SAT 7AM-7PM',
                'monthly_capacity' => 90,
                'status' => 'active',
                'is_active' => true,
            ],
        ];

        foreach ($hospitals as $hospital) {
            Hospital::create($hospital);
        }

        $this->command->info('Successfully created 10 hospitals!');
    }
}
