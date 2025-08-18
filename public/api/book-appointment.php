<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

try {
    // Include Laravel's autoloader and bootstrap
    require_once __DIR__ . '/../../vendor/autoload.php';
    $app = require_once __DIR__ . '/../../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();

    // Start session to access Laravel session data
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Get current user info from session
    $userId = null;
    $userEmail = null;
    
    // Try to get Laravel session data
    try {
        if (function_exists('session')) {
            $userId = session('user_id');
            $userEmail = session('user_email');
        }
    } catch (Exception $e) {
        // Fallback - create a guest user record if needed
        error_log('Session access failed: ' . $e->getMessage());
    }

    // If no user session, use the first available user for testing
    if (!$userId) {
        // For guest bookings, use the first available user
        $firstUser = \App\Models\AppUser::first();
        if ($firstUser) {
            $userId = $firstUser->id;
            $userEmail = $firstUser->email;
        } else {
            // If no users exist, create a default guest user
            $guestUser = \App\Models\AppUser::create([
                'name' => 'Guest User',
                'email' => 'guest@petsrology.com',
                'password' => bcrypt('guest123'),
                'role' => 'user'
            ]);
            $userId = $guestUser->id;
            $userEmail = $guestUser->email;
        }
    }

    // Get form data and normalize field names
    $data = [];
    foreach ($_POST as $key => $value) {
        $data[$key] = trim($value);
    }

    // Map camelCase to snake_case for backwards compatibility
    $fieldMap = [
        'ownerName' => 'owner_name',
        'ownerEmail' => 'owner_email', 
        'ownerPhone' => 'owner_phone',
        'petName' => 'pet_name',
        'petType' => 'pet_type',
        'petAge' => 'pet_age',
        'serviceType' => 'service_type',
        'vetId' => 'vet_id',
        'preferredDate' => 'preferred_date',
        'preferredTime' => 'preferred_time',
        'specialNotes' => 'special_notes'
    ];

    // Convert camelCase to snake_case
    foreach ($fieldMap as $camelCase => $snakeCase) {
        if (isset($data[$camelCase]) && !isset($data[$snakeCase])) {
            $data[$snakeCase] = $data[$camelCase];
        }
    }

    // Basic validation
    $required = ['owner_name', 'owner_phone', 'pet_name', 'pet_type', 'service_type', 'preferred_date', 'preferred_time'];
    $errors = [];

    foreach ($required as $field) {
        if (empty($data[$field])) {
            $errors[] = ucfirst(str_replace('_', ' ', $field)) . ' is required';
        }
    }

    if (!empty($errors)) {
        echo json_encode(['error' => 'Validation failed', 'details' => $errors]);
        exit;
    }

    // Check if date is not in the past
    if (strtotime($data['preferred_date']) < strtotime(date('Y-m-d'))) {
        echo json_encode(['error' => 'Cannot book appointments for past dates']);
        exit;
    }

    // Generate appointment number
    $appointmentNumber = 'APT-' . date('Ymd') . '-' . sprintf('%04d', rand(1000, 9999));

    // Create appointment record
    try {
        error_log('Attempting to create appointment with data: ' . json_encode($data));
        
        $appointment = \App\Models\Appointment::create([
            'user_id' => $userId,
            'vet_id' => !empty($data['vet_id']) ? $data['vet_id'] : null,
            'appointment_number' => $appointmentNumber,
            'owner_name' => $data['owner_name'],
            'owner_phone' => $data['owner_phone'],
            'owner_email' => $data['owner_email'] ?? $userEmail,
            'pet_name' => $data['pet_name'],
            'pet_type' => $data['pet_type'],
            'pet_age' => $data['pet_age'] ?? null,
            'pet_breed' => $data['pet_breed'] ?? null,
            'service_type' => $data['service_type'],
            'preferred_date' => $data['preferred_date'],
            'preferred_time' => $data['preferred_time'] . ':00', // Add seconds
            'urgency_level' => $data['urgency_level'] ?? 'routine',
            'symptoms' => $data['symptoms'] ?? null,
            'additional_notes' => $data['additional_notes'] ?? null,
            'status' => 'pending',
            'estimated_cost' => calculateEstimatedCost($data['service_type'], $data['vet_id'] ?? null)
        ]);

        error_log('Appointment created successfully with ID: ' . $appointment->id);

        echo json_encode([
            'success' => true,
            'message' => 'Appointment booked successfully!',
            'appointment_number' => $appointmentNumber,
            'data' => [
                'id' => $appointment->id,
                'appointment_number' => $appointmentNumber,
                'owner_name' => $data['owner_name'],
                'pet_name' => $data['pet_name'],
                'service_type' => $data['service_type'],
                'preferred_date' => $data['preferred_date'],
                'preferred_time' => $data['preferred_time'],
                'status' => 'pending'
            ]
        ]);
    } catch (Exception $e) {
        error_log('Error creating appointment: ' . $e->getMessage());
        error_log('Stack trace: ' . $e->getTraceAsString());
        
        echo json_encode([
            'error' => 'Database error',
            'message' => 'Failed to create appointment: ' . $e->getMessage(),
            'debug_info' => [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'data_received' => $data
            ]
        ]);
    }

} catch (Exception $e) {
    error_log('Error in book-appointment.php: ' . $e->getMessage());
    echo json_encode([
        'error' => 'Failed to book appointment',
        'message' => 'Please try again later or contact support'
    ]);
}

function calculateEstimatedCost($serviceType, $vetId = null) {
    $baseCosts = [
        'general-checkup' => 1500,
        'vaccination' => 800,
        'surgery' => 5000,
        'grooming' => 2000,
        'emergency' => 2500,
        'dental' => 3000,
        'skin-treatment' => 2200
    ];

    $baseCost = $baseCosts[$serviceType] ?? 1500;

    // If vet is specified, try to use their pricing
    if ($vetId) {
        try {
            $vet = \App\Models\VetDetails::find($vetId);
            if ($vet) {
                if ($serviceType === 'general-checkup' && $vet->general_price) {
                    return $vet->general_price;
                }
                if ($serviceType === 'surgery' && $vet->surgery_price_min) {
                    return $vet->surgery_price_min;
                }
            }
        } catch (Exception $e) {
            // Fallback to base cost
        }
    }

    return $baseCost;
}

exit;
?>
