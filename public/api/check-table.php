<?php
// Check the appointments table structure
require_once __DIR__ . '/../../vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__ . '/../../bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    // Check if table exists
    $tableExists = \Illuminate\Support\Facades\Schema::hasTable('appointments');
    echo "Table exists: " . ($tableExists ? 'YES' : 'NO') . "\n";
    
    if ($tableExists) {
        // Get column info
        $columns = \Illuminate\Support\Facades\Schema::getColumnListing('appointments');
        echo "Columns: " . json_encode($columns) . "\n";
        
        // Check specific columns
        $hasAppointmentNumber = \Illuminate\Support\Facades\Schema::hasColumn('appointments', 'appointment_number');
        echo "Has appointment_number column: " . ($hasAppointmentNumber ? 'YES' : 'NO') . "\n";
    }
    
    // Try to describe the table using raw query
    $result = \Illuminate\Support\Facades\DB::select('DESCRIBE appointments');
    echo "Table structure:\n";
    foreach ($result as $column) {
        echo "- {$column->Field} ({$column->Type}) " . ($column->Null === 'YES' ? 'NULL' : 'NOT NULL') . "\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
