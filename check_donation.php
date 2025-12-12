<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$donation = \App\Models\BloodDonation::find(1);

if ($donation) {
    echo "Donation ID: {$donation->id}\n";
    echo "Status: {$donation->status}\n";
    echo "Updated At: {$donation->updated_at}\n";
    echo "User: {$donation->user->first_name} {$donation->user->last_name}\n";
} else {
    echo "Donation not found\n";
}
