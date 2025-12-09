<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fundraiser;
use App\Models\User;
use Carbon\Carbon;

class FundraiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get users by email - these should be created by FundraiserUserSeeder first
        $users = [
            User::where('email', 'maria.santos@example.com')->first(),
            User::where('email', 'juan.delacruz@example.com')->first(),
            User::where('email', 'pedro.gonzales@example.com')->first(),
            User::where('email', 'ana.reyes@example.com')->first(),
            User::where('email', 'rosa.cruz@example.com')->first(),
        ];

        // Check if any user is missing
        if (in_array(null, $users, true)) {
            $this->command->warn('Some fundraiser users not found. Please run FundraiserUserSeeder first.');
            return;
        }

        $fundraisers = [
            [
                'user_id' => $users[0]->id,
                'title' => 'Emergency Medical Fund for Maria Santos',
                'description' => 'Help Maria fight leukemia. She needs urgent chemotherapy treatment that costs ₱500,000. Your support will cover her medical expenses, medications, and hospital care.',
                'category' => 'medical',
                'goal_amount' => 500000,
                'current_amount' => 125000,
                'contributors_count' => 45,
                'campaign_duration_days' => 60,
                'start_date' => Carbon::now()->subDays(10),
                'end_date' => Carbon::now()->addDays(50),
                'beneficiary_name' => 'Maria Santos',
                'beneficiary_relationship' => 'Self',
                'beneficiary_contact' => '+63 917 123 4567',
                'beneficiary_address' => '123 Sampaguita Street, Brgy. San Roque, Manila, Metro Manila',
                'organizer_name' => $users[0]->name,
                'organizer_email' => $users[0]->email,
                'organizer_phone' => $users[0]->contact_number,
                'payment_method' => 'GCash',
                'account_number' => encrypt('09171234567'),
                'account_name' => 'Maria Santos',
                'status' => 'active',
                'is_featured' => true,
                'terms_agreed' => true,
                'information_accurate' => true,
            ],
            [
                'user_id' => $users[1]->id,
                'title' => 'Education Fund for Orphaned Children',
                'description' => 'Supporting 15 orphaned children to continue their education and build a better future. Help provide school supplies, uniforms, tuition fees, and daily meals.',
                'category' => 'education',
                'goal_amount' => 300000,
                'current_amount' => 85000,
                'contributors_count' => 32,
                'campaign_duration_days' => 90,
                'start_date' => Carbon::now()->subDays(5),
                'end_date' => Carbon::now()->addDays(85),
                'beneficiary_name' => 'Hope for Children Foundation',
                'beneficiary_relationship' => 'Organization/Charity',
                'beneficiary_contact' => '+63 918 234 5678',
                'beneficiary_address' => '456 Katarungan Avenue, Brgy. Pasong Tamo, Quezon City, Metro Manila',
                'organizer_name' => $users[1]->name,
                'organizer_email' => $users[1]->email,
                'organizer_phone' => $users[1]->contact_number,
                'payment_method' => 'BDO',
                'account_number' => encrypt('123456789012'),
                'account_name' => 'Hope Foundation Inc',
                'status' => 'active',
                'is_featured' => false,
                'terms_agreed' => true,
                'information_accurate' => true,
            ],
            [
                'user_id' => $users[2]->id,
                'title' => 'Rebuild Homes After Typhoon Devastation',
                'description' => 'Help 50 families rebuild their homes destroyed by Typhoon Elena. Provide construction materials, tools, and labor to restore their lives.',
                'category' => 'disaster_relief',
                'goal_amount' => 750000,
                'current_amount' => 320000,
                'contributors_count' => 78,
                'campaign_duration_days' => 60,
                'start_date' => Carbon::now()->subDays(15),
                'end_date' => Carbon::now()->addDays(45),
                'beneficiary_name' => 'San Isidro Community Association',
                'beneficiary_relationship' => 'Community Member',
                'beneficiary_contact' => '+63 919 345 6789',
                'beneficiary_address' => 'San Isidro, Batangas City, Batangas',
                'organizer_name' => $users[2]->name,
                'organizer_email' => $users[2]->email,
                'organizer_phone' => $users[2]->contact_number,
                'payment_method' => 'PayMaya',
                'account_number' => encrypt('09193456789'),
                'account_name' => 'San Isidro Assoc',
                'status' => 'active',
                'is_featured' => true,
                'terms_agreed' => true,
                'information_accurate' => true,
            ],
            [
                'user_id' => $users[3]->id,
                'title' => 'Clean Water Project for Rural Village',
                'description' => 'Bring clean drinking water to 200 families in Barangay Malaya by installing a deep well pump and water distribution system.',
                'category' => 'community',
                'goal_amount' => 400000,
                'current_amount' => 180000,
                'contributors_count' => 56,
                'campaign_duration_days' => 90,
                'start_date' => Carbon::now()->subDays(20),
                'end_date' => Carbon::now()->addDays(70),
                'beneficiary_name' => 'Barangay Malaya Council',
                'beneficiary_relationship' => 'Community Member',
                'beneficiary_contact' => '+63 920 456 7890',
                'beneficiary_address' => 'Barangay Malaya, Tanauan, Batangas',
                'organizer_name' => $users[3]->name,
                'organizer_email' => $users[3]->email,
                'organizer_phone' => $users[3]->contact_number,
                'payment_method' => 'UnionBank',
                'account_number' => encrypt('987654321098'),
                'account_name' => 'Brgy Malaya Council',
                'status' => 'active',
                'is_featured' => false,
                'terms_agreed' => true,
                'information_accurate' => true,
            ],
            [
                'user_id' => $users[4]->id,
                'title' => 'Heart Surgery for Baby Miguel',
                'description' => 'Baby Miguel needs urgent heart surgery to survive. At just 8 months old, he has a congenital heart defect requiring ₱600,000 for the operation.',
                'category' => 'medical',
                'goal_amount' => 600000,
                'current_amount' => 225000,
                'contributors_count' => 62,
                'campaign_duration_days' => 60,
                'start_date' => Carbon::now()->subDays(7),
                'end_date' => Carbon::now()->addDays(53),
                'beneficiary_name' => 'Miguel Reyes',
                'beneficiary_relationship' => 'Family Member',
                'beneficiary_contact' => '+63 921 567 8901',
                'beneficiary_address' => '789 Mabini Street, Brgy. Poblacion, Caloocan City, Metro Manila',
                'organizer_name' => $users[4]->name,
                'organizer_email' => $users[4]->email,
                'organizer_phone' => $users[4]->contact_number,
                'payment_method' => 'GCash',
                'account_number' => encrypt('09215678901'),
                'account_name' => 'Rosa Cruz',
                'status' => 'active',
                'is_featured' => true,
                'terms_agreed' => true,
                'information_accurate' => true,
            ],
        ];

        foreach ($fundraisers as $fundraiser) {
            Fundraiser::create($fundraiser);
        }

        $this->command->info('Successfully created 5 fundraising campaigns!');
    }
}
