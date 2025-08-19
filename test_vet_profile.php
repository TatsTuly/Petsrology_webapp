<?php

// Test script for vet profile functionality
require_once 'vendor/autoload.php';
require_once 'bootstrap/app.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\VetDetails;

echo "=== VET PROFILE TEST ===\n";

// Get all approved vets
$vets = VetDetails::where('status', 'approved')->get();

echo "Found " . $vets->count() . " approved vets:\n\n";

foreach ($vets as $vet) {
    echo "ID: " . $vet->id . "\n";
    echo "Name: Dr. " . $vet->name . "\n";
    echo "Role: " . $vet->role . "\n";
    echo "Phone: " . $vet->phone . "\n";
    echo "Location: " . $vet->location . "\n";
    echo "Experience: " . $vet->experience . " years\n";
    echo "Rating: " . $vet->getRating() . "/5\n";
    echo "Profile Image: " . ($vet->profile_image ? 'Yes' : 'No') . "\n";
    echo "URL: http://127.0.0.1:8000/vet-profile/" . $vet->id . "\n";
    echo "---\n";
}

echo "\nTesting availability days parsing:\n";
foreach ($vets as $vet) {
    echo "Vet: " . $vet->name . "\n";
    echo "Available Days Raw: " . $vet->available_days . "\n";
    $days = json_decode($vet->available_days, true);
    if (is_array($days)) {
        echo "Parsed Days: " . implode(', ', array_map('ucfirst', $days)) . "\n";
    } else {
        echo "Could not parse available days\n";
    }
    echo "---\n";
}

echo "\nVet profile functionality ready!\n";
echo "Access any vet profile at: http://127.0.0.1:8000/vet-profile/[vet_id]\n";

?>
