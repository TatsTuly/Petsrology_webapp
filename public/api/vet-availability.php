<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

try {
    // Include Laravel's autoloader
    require_once __DIR__ . '/../../vendor/autoload.php';
    $app = require_once __DIR__ . '/../../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();

    $vetId = $_GET['vet_id'] ?? null;
    
    if ($vetId) {
        // Get specific vet's availability
        $vet = \App\Models\VetDetails::where('id', $vetId)
            ->where('status', 'approved')
            ->first();
            
        if ($vet) {
            $availableDays = $vet->available_days;
            
            // Handle JSON format
            if (is_string($availableDays)) {
                $availableDays = json_decode($availableDays, true);
            }
            
            if (!is_array($availableDays)) {
                $availableDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
            }
            
            // Normalize to lowercase
            $availableDays = array_map('strtolower', $availableDays);
            
            echo json_encode([
                'vet_id' => $vetId,
                'vet_name' => $vet->name,
                'available_days' => $availableDays,
                'working_hours' => [
                    'start' => $vet->visit_start_time ?? '09:00:00',
                    'end' => $vet->visit_end_time ?? '18:00:00'
                ]
            ]);
        } else {
            echo json_encode(['error' => 'Vet not found']);
        }
    } else {
        // Get all approved vets' availability
        $vets = \App\Models\VetDetails::where('status', 'approved')->get();
        
        $allAvailableDays = [];
        $vetInfo = [];
        
        foreach ($vets as $vet) {
            $availableDays = $vet->available_days;
            
            if (is_string($availableDays)) {
                $availableDays = json_decode($availableDays, true);
            }
            
            if (!is_array($availableDays)) {
                $availableDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
            }
            
            $availableDays = array_map('strtolower', $availableDays);
            $allAvailableDays = array_merge($allAvailableDays, $availableDays);
            
            $vetInfo[] = [
                'id' => $vet->id,
                'name' => $vet->name,
                'available_days' => $availableDays,
                'working_hours' => [
                    'start' => $vet->visit_start_time ?? '09:00:00',
                    'end' => $vet->visit_end_time ?? '18:00:00'
                ]
            ];
        }
        
        // Remove duplicates
        $allAvailableDays = array_unique($allAvailableDays);
        
        echo json_encode([
            'all_available_days' => $allAvailableDays,
            'vets' => $vetInfo
        ]);
    }

} catch (Exception $e) {
    error_log('Error in vet-availability.php: ' . $e->getMessage());
    echo json_encode(['error' => 'Failed to load vet availability']);
}

exit;
?>
