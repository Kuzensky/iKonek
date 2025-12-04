<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FundraiserContribution;
use App\Models\Fundraiser;
use App\Models\User;
use Carbon\Carbon;

class FundraiserContributionSeeder extends Seeder
{
    public function run(): void
    {
        // Get all fundraisers and users
        $fundraisers = Fundraiser::all();
        $users = User::all();

        if ($fundraisers->isEmpty() || $users->isEmpty()) {
            $this->command->warn('No fundraisers or users found. Please seed those first.');
            return;
        }

        // Sample donation quotes/messages
        $quotes = [
            "Praying for Baby Mia's recovery. Stay strong!",
            "Our thoughts are with the affected families.",
            "Education is the key to success!",
            "Kaya natin ito! Bangon Pilipinas!",
            "May God bless this noble cause.",
            "Every little bit helps. Praying for recovery.",
            "Hope this helps the community rebuild.",
            "Supporting our brothers and sisters in need.",
            "For a brighter future! Stay strong!",
            "Sending prayers and support!",
            null, // Some donations without notes
            null,
        ];

        // Payment methods (must match enum in migration)
        $paymentMethods = ['cash', 'gcash', 'paymaya', 'bank_transfer', 'other'];

        // Create sample contributions
        $contributions = [
            ['first_name' => 'Anonymous', 'last_name' => 'Donor', 'amount' => 10000, 'status' => 'verified'],
            ['first_name' => 'John', 'last_name' => 'Santos', 'amount' => 5000, 'status' => 'verified'],
            ['first_name' => 'Maria', 'last_name' => 'Garcia', 'amount' => 15000, 'status' => 'verified'],
            ['first_name' => 'Anonymous', 'last_name' => 'Donor', 'amount' => 8000, 'status' => 'pending'],
            ['first_name' => 'Carlos', 'last_name' => 'Reyes', 'amount' => 20000, 'status' => 'verified'],
            ['first_name' => 'Anonymous', 'last_name' => 'Donor', 'amount' => 12000, 'status' => 'verified'],
            ['first_name' => 'Lisa', 'last_name' => 'Cruz', 'amount' => 7500, 'status' => 'pending'],
            ['first_name' => 'Miguel', 'last_name' => 'Ramos', 'amount' => 3000, 'status' => 'verified'],
            ['first_name' => 'Sofia', 'last_name' => 'Mendoza', 'amount' => 6000, 'status' => 'pending'],
            ['first_name' => 'Pedro', 'last_name' => 'Torres', 'amount' => 4500, 'status' => 'rejected'],
            ['first_name' => 'Ana', 'last_name' => 'Lopez', 'amount' => 9000, 'status' => 'verified'],
            ['first_name' => 'Roberto', 'last_name' => 'Aquino', 'amount' => 11000, 'status' => 'verified'],
        ];

        foreach ($contributions as $index => $contributionData) {
            // Find or create user with this name
            $user = User::where('first_name', $contributionData['first_name'])
                        ->where('last_name', $contributionData['last_name'])
                        ->first();

            if (!$user) {
                // Use existing users instead of creating new ones
                $user = $users->random();
            }

            // Pick a random fundraiser
            $fundraiser = $fundraisers->random();

            // Create contribution
            $contribution = FundraiserContribution::create([
                'fundraiser_id' => $fundraiser->id,
                'user_id' => $user->id,
                'amount' => $contributionData['amount'],
                'status' => $contributionData['status'],
                'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                'reference_number' => 'REF' . str_pad($index, 10, '0', STR_PAD_LEFT),
                'notes' => $quotes[array_rand($quotes)],
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
                'updated_at' => Carbon::now()->subDays(rand(0, 15)),
            ]);

            // If verified, set verified_at and verified_by (admin)
            if ($contributionData['status'] === 'verified') {
                $contribution->update([
                    'verified_at' => Carbon::now()->subDays(rand(0, 10)),
                    'verified_by' => 1, // Assuming admin ID is 1
                ]);

                // Update fundraiser current_amount
                $fundraiser->current_amount += $contributionData['amount'];
                $fundraiser->save();
            }

            $this->command->info("Created contribution: {$contributionData['first_name']} {$contributionData['last_name']} - ₱{$contributionData['amount']}");
        }

        $this->command->info('Fundraiser contributions seeded successfully!');
    }
}
