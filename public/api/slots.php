<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

try {
    // Include Laravel's autoloader to access the database
    require_once __DIR__ . '/../../vendor/autoload.php';
    $app = require_once __DIR__ . '/../../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();

    $date = $_GET['date'] ?? date('Y-m-d');
    $vetId = $_GET['vet_id'] ?? null;
    
    // Get day of week for the selected date
    $dayOfWeek = strtolower(date('l', strtotime($date)));
    
    $availableSlots = [];
    
    if ($vetId) {
        // Get specific vet's availability
        $vet = \App\Models\VetDetails::where('id', $vetId)
            ->where('status', 'approved')
            ->first();
            
        if ($vet) {
            $availableSlots = getVetTimeSlots($vet, $dayOfWeek, $date);
        }
    } else {
        // Get time slots from all available vets for this day
        $vets = \App\Models\VetDetails::where('status', 'approved')->get();
        
        foreach ($vets as $vet) {
            $vetSlots = getVetTimeSlots($vet, $dayOfWeek, $date);
            // Merge slots from all vets (union of available times)
            $availableSlots = array_merge($availableSlots, $vetSlots);
        }
        
        // Remove duplicates and sort
        $availableSlots = array_unique($availableSlots, SORT_REGULAR);
        ksort($availableSlots);
    }
    
    // Remove already booked slots
    $bookedSlots = getBookedSlots($date, $vetId);
    foreach ($bookedSlots as $bookedTime) {
        $bookedTimeFormatted = date('H:i', strtotime($bookedTime));
        unset($availableSlots[$bookedTimeFormatted]);
    }
    
    // Remove past time slots for today
    if ($date === date('Y-m-d')) {
        $currentTime = date('H:i');
        foreach ($availableSlots as $time => $label) {
            if ($time <= $currentTime) {
                unset($availableSlots[$time]);
            }
        }
    }
    
    echo json_encode($availableSlots);

} catch (Exception $e) {
    error_log('Error in slots.php: ' . $e->getMessage());
    
    // Return basic fallback slots
    $fallbackSlots = [
        '09:00' => '9:00 AM',
        '10:00' => '10:00 AM',
        '14:00' => '2:00 PM',
        '15:00' => '3:00 PM',
        '16:00' => '4:00 PM'
    ];
    
    echo json_encode($fallbackSlots);
}

/**
 * Get time slots for a specific vet based on their availability
 */
function getVetTimeSlots($vet, $dayOfWeek, $date) {
    $slots = [];
    
    // Check if vet is available on this day
    $availableDays = $vet->available_days;
    
    // Handle JSON format
    if (is_string($availableDays)) {
        $availableDays = json_decode($availableDays, true);
    }
    
    if (!is_array($availableDays)) {
        // Default availability if not set
        $availableDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
    }
    
    // Normalize to lowercase
    $availableDays = array_map('strtolower', $availableDays);
    
    // Check if vet works on this day
    if (!in_array($dayOfWeek, $availableDays)) {
        return []; // Vet not available on this day
    }
    
    // Get vet's working hours
    $startTime = $vet->visit_start_time ?? '09:00:00';
    $endTime = $vet->visit_end_time ?? '18:00:00';
    
    // Convert to comparable format
    $startHour = (int) date('H', strtotime($startTime));
    $startMinute = (int) date('i', strtotime($startTime));
    $endHour = (int) date('H', strtotime($endTime));
    $endMinute = (int) date('i', strtotime($endTime));
    
    // Generate time slots based on working hours
    $currentHour = $startHour;
    $currentMinute = $startMinute;
    
    while (($currentHour < $endHour) || ($currentHour === $endHour && $currentMinute < $endMinute)) {
        $timeKey = sprintf('%02d:%02d', $currentHour, $currentMinute);
        $timeLabel = date('g:i A', strtotime($timeKey));
        
        $slots[$timeKey] = $timeLabel;
        
        // Increment by 1 hour (you can adjust this interval)
        $currentMinute += 60;
        if ($currentMinute >= 60) {
            $currentHour += 1;
            $currentMinute = 0;
        }
    }
    
    return $slots;
}

/**
 * Get already booked time slots for a specific date
 */
function getBookedSlots($date, $vetId = null) {
    try {
        $query = \App\Models\Appointment::where('preferred_date', $date)
            ->whereIn('status', ['pending', 'confirmed']);
            
        if ($vetId) {
            $query->where('vet_id', $vetId);
        }
        
        return $query->pluck('preferred_time')->toArray();
        
    } catch (Exception $e) {
        error_log('Error getting booked slots: ' . $e->getMessage());
        return [];
    }
}

exit;
?>
