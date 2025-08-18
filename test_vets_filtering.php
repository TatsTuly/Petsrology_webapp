<?php
// Simple test script to verify vet filtering functionality
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\VetDetails;

echo "=== VET DETAILS TEST ===\n";

// Get all approved vets
$vets = VetDetails::where('status', 'approved')->get();

echo "Total approved vets: " . $vets->count() . "\n\n";

foreach ($vets as $vet) {
    echo "Vet: Dr. " . $vet->name . "\n";
    echo "Role: " . $vet->role . "\n";
    echo "Experience: " . $vet->experience . " years\n";
    echo "Location: " . $vet->location . "\n";
    echo "Phone: " . $vet->phone . "\n";
    echo "Rating: " . $vet->getRating() . "\n";
    echo "Profile Image: " . ($vet->profile_image ? 'Yes' : 'No') . "\n";
    echo "Available: " . $vet->visit_start_time . " - " . $vet->visit_end_time . "\n";
    echo "---\n";
}

// Test filtering logic
echo "\n=== FILTERING TEST ===\n";

echo "General Practice vets: " . $vets->where('role', 'general_checkup')->count() . "\n";
echo "Surgery vets: " . $vets->where('role', 'surgery')->count() . "\n";
echo "Both vets: " . $vets->where('role', 'both')->count() . "\n";

echo "\nJunior vets (< 10 years): " . $vets->where('experience', '<', 10)->count() . "\n";
echo "Senior vets (10-15 years): " . $vets->whereBetween('experience', [10, 15])->count() . "\n";
echo "Expert vets (15+ years): " . $vets->where('experience', '>=', 15)->count() . "\n";

?>
