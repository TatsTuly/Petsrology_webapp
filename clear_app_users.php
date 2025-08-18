<?php

// Script to clear all data from app_users table

require_once __DIR__ . '/vendor/autoload.php';

// Laravel bootstrap
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

use App\Models\AppUser;
use Illuminate\Support\Facades\DB;

echo "Clearing app_users table...\n";

try {
    // Count current users
    $userCount = AppUser::count();
    echo "Current users in table: {$userCount}\n";
    
    if ($userCount > 0) {
        // Clear all users
        DB::table('app_users')->truncate();
        echo "Successfully cleared all {$userCount} users from app_users table.\n";
    } else {
        echo "Table is already empty.\n";
    }
    
    // Verify table is empty
    $remainingCount = AppUser::count();
    echo "Remaining users: {$remainingCount}\n";
    
    echo "app_users table has been reset!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

?>
