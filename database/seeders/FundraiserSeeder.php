<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Get the first user (or create a default one if none exists)
        $user = User::first();

        if (!$user) {
            echo "No users found. Please create a user first.\n";
            return;
        }

        $fundraisers = [
            [
                'user_id' => $user->id,
                'title' => 'Emergency Medical Fund for Maria Santos',
                'description' => 'Help Maria fight leukemia. She needs urgent chemotherapy treatment.',
                'story' => 'Maria Santos is a 32-year-old teacher who was recently diagnosed with acute leukemia. She needs immediate chemotherapy treatment to save her life. The treatment costs are overwhelming for her family. Your support will help cover her medical expenses, medications, and hospital care. Every contribution brings hope to Maria and her family during this difficult time.',
                'category' => 'medical',
                'goal_amount' => 500000,
                'current_amount' => 125000,
                'beneficiary_name' => 'Maria Santos',
                'beneficiary_contact' => '+63 917 123 4567',
                'start_date' => Carbon::now()->subDays(10),
                'end_date' => Carbon::now()->addDays(50),
                'status' => 'active',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Education Fund for Orphaned Children',
                'description' => 'Supporting 15 orphaned children to continue their education and build a better future.',
                'story' => 'After losing their parents in a tragic accident, 15 children are now under the care of their elderly grandmother. Despite their circumstances, these children are bright and eager to learn. This fundraiser aims to provide them with school supplies, uniforms, tuition fees, and daily meals so they can continue their education. Your generosity can transform these children\'s lives and give them hope for a brighter tomorrow.',
                'category' => 'education',
                'goal_amount' => 300000,
                'current_amount' => 85000,
                'beneficiary_name' => 'Hope for Children Foundation',
                'beneficiary_contact' => '+63 918 234 5678',
                'start_date' => Carbon::now()->subDays(5),
                'end_date' => Carbon::now()->addDays(85),
                'status' => 'active',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Rebuild Homes After Typhoon Devastation',
                'description' => 'Help 50 families rebuild their homes destroyed by Typhoon Elena.',
                'story' => 'Typhoon Elena left a trail of destruction in the coastal community of San Isidro. Over 50 families lost their homes and all their belongings. They are currently living in evacuation centers with limited resources. This fundraiser will provide construction materials, tools, and labor to rebuild their homes. With your help, these families can return to a safe and stable living environment. Together, we can restore hope and rebuild lives.',
                'category' => 'disaster_relief',
                'goal_amount' => 750000,
                'current_amount' => 320000,
                'beneficiary_name' => 'San Isidro Community Association',
                'beneficiary_contact' => '+63 919 345 6789',
                'start_date' => Carbon::now()->subDays(15),
                'end_date' => Carbon::now()->addDays(45),
                'status' => 'active',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Clean Water Project for Rural Village',
                'description' => 'Bring clean drinking water to 200 families in Barangay Malaya.',
                'story' => 'For decades, the residents of Barangay Malaya have struggled without access to clean drinking water. Families walk kilometers daily to fetch water from contaminated sources, leading to frequent illnesses, especially among children. This project will install a deep well pump and water distribution system, providing clean and safe drinking water to over 200 families. Your contribution will improve health, save time, and transform this community forever.',
                'category' => 'community',
                'goal_amount' => 400000,
                'current_amount' => 180000,
                'beneficiary_name' => 'Barangay Malaya Council',
                'beneficiary_contact' => '+63 920 456 7890',
                'start_date' => Carbon::now()->subDays(20),
                'end_date' => Carbon::now()->addDays(70),
                'status' => 'active',
            ],
            [
                'user_id' => $user->id,
                'title' => 'Heart Surgery for Baby Miguel',
                'description' => 'Baby Miguel needs urgent heart surgery to survive. Help save his life.',
                'story' => 'Baby Miguel was born with a severe congenital heart defect that requires immediate surgery. At just 8 months old, he is struggling to breathe and gain weight. His parents, both daily wage earners, cannot afford the expensive operation. The surgery costs ₱600,000 and must be done within the next two months. Your donation can give Miguel a chance at life and bring immeasurable joy to his loving family. Please help save Baby Miguel.',
                'category' => 'medical',
                'goal_amount' => 600000,
                'current_amount' => 225000,
                'beneficiary_name' => 'Miguel Reyes',
                'beneficiary_contact' => '+63 921 567 8901',
                'start_date' => Carbon::now()->subDays(7),
                'end_date' => Carbon::now()->addDays(53),
                'status' => 'active',
            ],
        ];

        foreach ($fundraisers as $fundraiser) {
            Fundraiser::create($fundraiser);
        }

        $this->command->info('Successfully created 5 fundraising campaigns!');
    }
}
