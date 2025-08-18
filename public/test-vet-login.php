<?php
// Simulate vet login and redirect to dashboard
session_start();

// Set session data for the vet associated with the appointment
$_SESSION['user_authenticated'] = true;
$_SESSION['user_email'] = 'jamil1@gmail.com';
$_SESSION['user_role'] = 'vet';
$_SESSION['user_id'] = 8; // User ID for this vet

echo "Vet login session set! Redirecting to dashboard...";
echo "<br><a href='http://127.0.0.1:8000/vet-dashboard'>Go to Vet Dashboard</a>";
?>
