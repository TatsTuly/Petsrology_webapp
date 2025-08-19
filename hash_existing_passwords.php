<?php

// Script to hash existing plain text passwords in app_users table

require_once __DIR__ . '/vendor/autoload.php';

// Laravel bootstrap
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

use App\Models\AppUser;

echo "Checking for unhashed passwords...\n";

$users = AppUser::all();
$updated = 0;

foreach ($users as $user) {
    // Check if password looks like it's not hashed (bcrypt hashes start with $2y$ and are 60 chars)
    if ($user->password && !str_starts_with($user->password, '$2y$') && strlen($user->password) < 60) {
        echo "Converting password for user: {$user->email}\n";
        $user->password = bcrypt($user->password);
        $user->save();
        $updated++;
    }
}

echo "Updated {$updated} passwords.\n";
echo "Password conversion complete!\n";

?>
