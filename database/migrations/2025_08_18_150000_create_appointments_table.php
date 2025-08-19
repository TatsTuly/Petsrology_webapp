<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vet_id')->nullable();
            $table->string('appointment_number')->unique();
            
            // Pet Owner Information
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->string('owner_email')->nullable();
            
            // Pet Information
            $table->string('pet_name');
            $table->string('pet_type');
            $table->string('pet_age')->nullable();
            $table->string('pet_breed')->nullable();
            
            // Appointment Details
            $table->string('service_type');
            $table->date('preferred_date');
            $table->time('preferred_time');
            $table->time('assigned_time')->nullable();
            $table->enum('urgency_level', ['routine', 'urgent', 'emergency'])->default('routine');
            
            // Medical Information
            $table->text('symptoms')->nullable();
            $table->text('additional_notes')->nullable();
            
            // Status and Management
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed', 'no_show'])->default('pending');
            $table->decimal('estimated_cost', 8, 2)->nullable();
            $table->decimal('final_cost', 8, 2)->nullable();
            
            // Timestamps
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('appointment_date')->nullable();
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('app_users')->onDelete('cascade');
            $table->foreign('vet_id')->references('id')->on('vet_details')->onDelete('set null');
            
            // Indexes
            $table->index(['user_id', 'status']);
            $table->index(['vet_id', 'status']);
            $table->index('appointment_date');
            $table->index('preferred_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
