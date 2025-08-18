<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Update existing vets with availability data
        $vets = DB::table('vet_details')->get();
        
        foreach ($vets as $vet) {
            // Set default availability if not already set
            $availableDays = $vet->available_days;
            
            if (empty($availableDays) || $availableDays === 'null') {
                $defaultDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                $availableDays = json_encode($defaultDays);
            } else {
                // Ensure it's properly formatted JSON
                $decoded = json_decode($availableDays, true);
                if (!is_array($decoded)) {
                    $defaultDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                    $availableDays = json_encode($defaultDays);
                }
            }
            
            // Set default working hours if not already set
            $startTime = $vet->visit_start_time ?? '09:00:00';
            $endTime = $vet->visit_end_time ?? '18:00:00';
            
            DB::table('vet_details')
                ->where('id', $vet->id)
                ->update([
                    'available_days' => $availableDays,
                    'visit_start_time' => $startTime,
                    'visit_end_time' => $endTime,
                    'status' => 'approved' // Ensure they're approved
                ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // This migration doesn't need a rollback as it's just updating data
    }
};
