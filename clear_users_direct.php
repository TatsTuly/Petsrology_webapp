<?php

use Illuminate\Support\Facades\DB;

// Simple PHP script to clear app_users table
echo "Clearing app_users table...\n";

try {
    // Connect to database using Laravel's database configuration
    $config = require 'config/database.php';
    
    // Use MySQLi for direct database access
    $host = env('DB_HOST', '127.0.0.1');
    $username = env('DB_USERNAME', 'root');
    $password = env('DB_PASSWORD', '');
    $database = env('DB_DATABASE', 'petsrology_db');
    
    // For XAMPP default settings
    $host = '127.0.0.1';
    $username = 'root';
    $password = '';
    $database = 'petsrology_db';
    
    $connection = new mysqli($host, $username, $password, $database);
    
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    
    // Count existing records
    $result = $connection->query("SELECT COUNT(*) as count FROM app_users");
    $row = $result->fetch_assoc();
    $count = $row['count'];
    
    echo "Found {$count} records in app_users table.\n";
    
    if ($count > 0) {
        // Clear the table
        if ($connection->query("TRUNCATE TABLE app_users")) {
            echo "Successfully cleared {$count} records from app_users table.\n";
        } else {
            echo "Error clearing table: " . $connection->error . "\n";
        }
    } else {
        echo "Table is already empty.\n";
    }
    
    // Verify table is empty
    $result = $connection->query("SELECT COUNT(*) as count FROM app_users");
    $row = $result->fetch_assoc();
    $remaining = $row['count'];
    
    echo "Remaining records: {$remaining}\n";
    echo "Operation completed!\n";
    
    $connection->close();
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

?>
