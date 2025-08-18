@extends('layouts.vet_app')

@section('title', 'Vet Dashboard - PETSROLOGY')

@section('styles')
<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }

    /* Dashboard Container */
    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
        flex: 1;
    }

    /* Welcome Section */
    .welcome-section {
        background: linear-gradient(135deg, #ff6f61 0%, #f8f9fa 100%);
        padding: 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        text-align: center;
        border: 1px solid rgba(255,111,97,0.1);
    }

    .welcome-section h2 {
        color: #ff6f61;
        font-size: 2.2rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .welcome-section p {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    /* Application Status Section */
    .application-status-section {
        margin-bottom: 2rem;
    }

    .application-status {
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        position: relative;
        overflow: hidden;
    }

    .application-status::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 20px 20px;
        animation: float 15s linear infinite;
    }

    .application-status .status-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .application-status h3 {
        margin: 0 0 1rem 0;
        font-size: 1.8rem;
        position: relative;
        z-index: 2;
    }

    .application-status p {
        margin: 0 0 1rem 0;
        opacity: 0.95;
        font-size: 1.1rem;
        position: relative;
        z-index: 2;
    }

    .application-status small {
        opacity: 0.8;
        font-style: italic;
        position: relative;
        z-index: 2;
    }

    .status-details {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        padding: 1.5rem;
        border-radius: 12px;
        margin: 1.5rem 0;
        text-align: left;
        position: relative;
        z-index: 2;
    }

    .status-details h3 {
        color: rgba(255,255,255,0.9);
        margin-bottom: 1rem;
        font-size: 1.2rem;
    }

    .status-detail-item {
        display: flex;
        justify-content: space-between;
        padding: 0.7rem 0;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        color: rgba(255,255,255,0.9);
    }

    .status-detail-item:last-child {
        border-bottom: none;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border: 1px solid rgba(255,111,97,0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #ff6f61, #ff9472);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 1rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .stat-icon.appointments {
        background: linear-gradient(135deg, #3498db, #2980b9);
    }

    .stat-icon.patients {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
    }

    .stat-icon.emergency {
        background: linear-gradient(135deg, #f39c12, #e67e22);
    }

    .stat-icon.revenue {
        background: linear-gradient(135deg, #27ae60, #2ecc71);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #7f8c8d;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .stat-trend {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .trend-up {
        color: #27ae60;
    }

    .trend-down {
        color: #e74c3c;
    }

    /* Quick Actions */
    .quick-actions {
        margin-bottom: 2rem;
    }

    .quick-actions h3 {
        color: #2c3e50;
        font-size: 1.8rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .action-card {
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
        padding: 1.5rem;
        border-radius: 12px;
        text-decoration: none;
        color: #2c3e50;
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid rgba(255,111,97,0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }

    .action-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255,111,97,0.15);
        text-decoration: none;
        color: #ff6f61;
        border-color: #ff9472;
    }

    .action-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #ff6f61, #ff9472);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }

    .action-card:hover .action-icon {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(255,111,97,0.3);
    }

    .action-card span {
        font-weight: 600;
        font-size: 1rem;
    }

    /* Button Styles */
    .btn-dashboard {
        display: inline-block;
        background: linear-gradient(135deg, rgba(255,255,255,0.2), rgba(255,255,255,0.1));
        color: white;
        padding: 1rem 2rem;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
        position: relative;
        z-index: 2;
    }

    .btn-dashboard:hover {
        transform: translateY(-2px);
        color: white;
        text-decoration: none;
        background: linear-gradient(135deg, rgba(255,255,255,0.3), rgba(255,255,255,0.2));
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .dashboard-container {
            padding: 1rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .actions-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .welcome-section h2 {
            font-size: 1.8rem;
        }

        .stat-number {
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        .actions-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Animation */
    @keyframes float {
        0% { transform: translate(0, 0) rotate(0deg); }
        100% { transform: translate(-20px, -20px) rotate(360deg); }
    }
</style>
@endsection

@section('content')
<div class="dashboard-container">
    <section class="welcome-section">
        <h2>Welcome, Dr. {{ session('user_email') ? explode('@', session('user_email'))[0] : 'Veterinarian' }}</h2>
        <p>Manage your veterinary practice efficiently from this comprehensive dashboard. Monitor appointments, track patient records, and oversee all practice activities.</p>
    </section>

    <!-- Vet Application Status Section -->
    @if(isset($vetApplication))
    <section class="application-status-section">
        @if($vetApplication->isPending())
            <div class="application-status pending" style="background: linear-gradient(135deg, #f39c12, #e67e22); color: white;">
                <div class="status-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Vet Application Under Review</h3>
                <p>Your application is being reviewed by our team. You'll be notified once approved.</p>
                <small>Submitted on {{ $vetApplication->created_at->format('M d, Y h:i A') }}</small>
            </div>
        @elseif($vetApplication->isApproved())
            <div class="application-status approved" style="background: linear-gradient(135deg, #27ae60, #2ecc71); color: white;">
                <div class="status-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Active Veterinarian</h3>
                <p>Welcome to our network! Your profile is active and you can receive appointments.</p>
                <small>Approved on {{ $vetApplication->updated_at->format('M d, Y h:i A') }}</small>
            </div>
        @elseif($vetApplication->isRejected())
            <div class="application-status rejected" style="background: linear-gradient(135deg, #e74c3c, #c0392b); color: white;">
                <div class="status-icon">
                    <i class="fas fa-times-circle"></i>
                </div>
                <h3>Application Not Approved</h3>
                <p>Your application was not approved. Please contact support for more information.</p>
                <a href="{{ route('vet.contact') }}" class="btn-dashboard">
                    <i class="fas fa-envelope"></i> Contact Support
                </a>
            </div>
        @endif
    </section>
    @else
    <section class="application-status-section">
        <div class="application-status not-applied" style="background: linear-gradient(135deg, #3498db, #2980b9); color: white;">
            <div class="status-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h3>Join Our Vet Network</h3>
            <p>You haven't applied to join our veterinary network yet. Apply now to start receiving appointments!</p>
            <a href="{{ route('vet.join') }}" class="btn-dashboard">
                <i class="fas fa-paper-plane"></i> Apply Now
            </a>
        </div>
    </section>
    @endif

    <section class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon appointments">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-number" id="todayAppointments">{{ $todayAppointments->count() }}</div>
            <div class="stat-label">Today's Appointments</div>
            <div class="stat-trend trend-up">
                <i class="fas fa-clock"></i>
                <span>{{ $upcomingAppointments->count() }} upcoming</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon patients">
                <i class="fas fa-paw"></i>
            </div>
            <div class="stat-number" id="totalPatients">{{ $appointments->count() }}</div>
            <div class="stat-label">Total Appointments</div>
            <div class="stat-trend trend-up">
                <i class="fas fa-calendar"></i>
                <span>{{ $appointments->where('status', 'pending')->count() }} pending</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon emergency">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stat-number" id="emergencyCases">{{ $appointments->where('urgency_level', 'emergency')->count() }}</div>
            <div class="stat-label">Emergency Cases</div>
            <div class="stat-trend trend-warning">
                <i class="fas fa-ambulance"></i>
                <span>{{ $appointments->where('urgency_level', 'urgent')->count() }} urgent</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon revenue">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-number" id="confirmedAppointments">{{ $appointments->where('status', 'confirmed')->count() }}</div>
            <div class="stat-label">Confirmed Appointments</div>
            <div class="stat-trend trend-up">
                <i class="fas fa-check-circle"></i>
                <span>{{ $appointments->where('status', 'completed')->count() }} completed</span>
            </div>
        </div>
    </section>

    @if($vetApplication && $vetApplication->status === 'approved')
    <!-- Today's Appointments Section -->
    <section class="appointments-section" style="margin-bottom: 2rem;">
        <h3 style="color: #2c3e50; font-size: 1.8rem; font-weight: 700; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 12px;">
            <i class="fas fa-calendar-day" style="color: #3498db;"></i>
            Today's Appointments
        </h3>
        
        @if($todayAppointments->count() > 0)
            <div class="appointments-grid" style="display: grid; gap: 1rem;">
                @foreach($todayAppointments as $appointment)
                <div class="appointment-card" style="background: white; border-radius: 12px; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-left: 4px solid {{ $appointment->status == 'confirmed' ? '#27ae60' : '#f39c12' }};">
                    <div style="display: flex; justify-content: between; align-items: flex-start; gap: 1rem;">
                        <div style="flex: 1;">
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <h4 style="color: #2c3e50; font-weight: 600; margin: 0;">{{ $appointment->pet_name }}</h4>
                                <span style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 2px 8px; border-radius: 10px; font-size: 0.75rem;">
                                    {{ ucfirst($appointment->pet_type) }}
                                </span>
                            </div>
                            <p style="color: #7f8c8d; margin: 4px 0;"><i class="fas fa-user"></i> {{ $appointment->owner_name }}</p>
                            <p style="color: #7f8c8d; margin: 4px 0;"><i class="fas fa-phone"></i> {{ $appointment->owner_phone }}</p>
                            <p style="color: #7f8c8d; margin: 4px 0;"><i class="fas fa-stethoscope"></i> {{ ucfirst(str_replace('-', ' ', $appointment->service_type)) }}</p>
                            @if($appointment->symptoms)
                                <p style="color: #e74c3c; margin: 8px 0; font-weight: 500;"><i class="fas fa-exclamation-circle"></i> {{ $appointment->symptoms }}</p>
                            @endif
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 1.2rem; font-weight: 700; color: #2c3e50; margin-bottom: 4px;">
                                {{ \Carbon\Carbon::parse($appointment->preferred_time)->format('g:i A') }}
                            </div>
                            <div style="margin-bottom: 8px;">
                                @if($appointment->status == 'pending')
                                    <span style="background: #f39c12; color: white; padding: 4px 10px; border-radius: 15px; font-size: 0.8rem; font-weight: 500;">Pending</span>
                                @elseif($appointment->status == 'confirmed')
                                    <span style="background: #27ae60; color: white; padding: 4px 10px; border-radius: 15px; font-size: 0.8rem; font-weight: 500;">Confirmed</span>
                                @endif
                            </div>
                            @if($appointment->urgency_level != 'routine')
                                <div>
                                    <span style="background: {{ $appointment->urgency_level == 'emergency' ? '#e74c3c' : '#f39c12' }}; color: white; padding: 3px 8px; border-radius: 10px; font-size: 0.75rem;">
                                        {{ ucfirst($appointment->urgency_level) }}
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    @if($appointment->status == 'pending')
                        <div style="margin-top: 1rem; display: flex; gap: 8px;">
                            <button onclick="updateAppointmentStatus('{{ $appointment->id }}', 'confirmed')" 
                                    style="background: #27ae60; color: white; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; font-size: 0.85rem;">
                                <i class="fas fa-check"></i> Confirm
                            </button>
                            <button onclick="updateAppointmentStatus('{{ $appointment->id }}', 'cancelled')" 
                                    style="background: #e74c3c; color: white; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; font-size: 0.85rem;">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 2rem; background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                <i class="fas fa-calendar-check" style="font-size: 3rem; color: #bdc3c7; margin-bottom: 1rem;"></i>
                <h4 style="color: #7f8c8d; margin: 0;">No appointments scheduled for today</h4>
                <p style="color: #95a5a6; margin-top: 0.5rem;">Enjoy your free day!</p>
            </div>
        @endif
    </section>

    <!-- All Appointments Section -->
    <section class="appointments-section" style="margin-bottom: 2rem;">
        <h3 style="color: #2c3e50; font-size: 1.8rem; font-weight: 700; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 12px;">
            <i class="fas fa-calendar-alt" style="color: #e74c3c;"></i>
            All Appointments
        </h3>
        
        @if($appointments->count() > 0)
            <div class="appointments-list" style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden;">
                @foreach($appointments->take(10) as $appointment)
                <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #ecf0f1; {{ $loop->last ? 'border-bottom: none;' : '' }}">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div style="flex: 1;">
                            <h5 style="margin: 0 0 4px 0; color: #2c3e50;">{{ $appointment->pet_name }} - {{ $appointment->owner_name }}</h5>
                            <div style="font-size: 0.9rem; color: #7f8c8d; margin-bottom: 8px;">
                                <span><i class="fas fa-calendar"></i> {{ $appointment->preferred_date->format('M d, Y') }}</span>
                                <span style="margin-left: 1rem;"><i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($appointment->preferred_time)->format('g:i A') }}</span>
                                <span style="margin-left: 1rem;"><i class="fas fa-stethoscope"></i> {{ ucfirst(str_replace('-', ' ', $appointment->service_type)) }}</span>
                            </div>
                            <div style="font-size: 0.85rem; color: #7f8c8d;">
                                <span><i class="fas fa-phone"></i> {{ $appointment->owner_phone }}</span>
                                @if($appointment->symptoms)
                                    <span style="margin-left: 1rem; color: #e74c3c;"><i class="fas fa-exclamation-circle"></i> {{ Str::limit($appointment->symptoms, 50) }}</span>
                                @endif
                            </div>
                        </div>
                        <div style="text-align: right; display: flex; flex-direction: column; align-items: flex-end; gap: 8px;">
                            <div>
                                @if($appointment->status == 'pending')
                                    <span style="background: #f39c12; color: white; padding: 4px 10px; border-radius: 15px; font-size: 0.8rem;">Pending</span>
                                @elseif($appointment->status == 'confirmed')
                                    <span style="background: #27ae60; color: white; padding: 4px 10px; border-radius: 15px; font-size: 0.8rem;">Confirmed</span>
                                @elseif($appointment->status == 'completed')
                                    <span style="background: #3498db; color: white; padding: 4px 10px; border-radius: 15px; font-size: 0.8rem;">Completed</span>
                                @elseif($appointment->status == 'cancelled')
                                    <span style="background: #e74c3c; color: white; padding: 4px 10px; border-radius: 15px; font-size: 0.8rem;">Cancelled</span>
                                @endif
                            </div>
                            
                            @if($appointment->status == 'pending')
                                <div style="display: flex; gap: 6px;">
                                    <button onclick="updateAppointmentStatus('{{ $appointment->id }}', 'confirmed')" 
                                            style="background: #27ae60; color: white; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer; font-size: 0.75rem;">
                                        <i class="fas fa-check"></i> Confirm
                                    </button>
                                    <button onclick="updateAppointmentStatus('{{ $appointment->id }}', 'cancelled')" 
                                            style="background: #e74c3c; color: white; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer; font-size: 0.75rem;">
                                        <i class="fas fa-times"></i> Cancel
                                    </button>
                                </div>
                            @elseif($appointment->status == 'confirmed')
                                <div style="display: flex; gap: 6px;">
                                    <button onclick="updateAppointmentStatus('{{ $appointment->id }}', 'completed')" 
                                            style="background: #3498db; color: white; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer; font-size: 0.75rem;">
                                        <i class="fas fa-check-double"></i> Complete
                                    </button>
                                    <button onclick="updateAppointmentStatus('{{ $appointment->id }}', 'cancelled')" 
                                            style="background: #e74c3c; color: white; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer; font-size: 0.75rem;">
                                        <i class="fas fa-times"></i> Cancel
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                
                @if($appointments->count() > 10)
                    <div style="padding: 1rem 1.5rem; text-align: center; background: #f8f9fa;">
                        <p style="margin: 0; color: #7f8c8d;">Showing 10 of {{ $appointments->count() }} appointments</p>
                    </div>
                @endif
            </div>
        @else
            <div style="text-align: center; padding: 2rem; background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                <i class="fas fa-calendar-times" style="font-size: 3rem; color: #bdc3c7; margin-bottom: 1rem;"></i>
                <h4 style="color: #7f8c8d; margin: 0;">No appointments yet</h4>
                <p style="color: #95a5a6; margin-top: 0.5rem;">Appointments will appear here once patients book with you.</p>
            </div>
        @endif
    </section>
    @endif

    <section class="quick-actions">
        <h3>Quick Actions</h3>
        <div class="actions-grid">
            <a href="{{ route('book.appointment') }}" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-plus"></i>
                </div>
                <span>New Appointment</span>
            </a>
            
            <a href="#" class="action-card" onclick="viewPatientRecords()">
                <div class="action-icon">
                    <i class="fas fa-file-medical"></i>
                </div>
                <span>Patient Records</span>
            </a>
            
            <a href="#" class="action-card" onclick="emergencyProtocol()">
                <div class="action-icon">
                    <i class="fas fa-ambulance"></i>
                </div>
                <span>Emergency</span>
            </a>
            
            <a href="#" class="action-card" onclick="viewPrescriptions()">
                <div class="action-icon">
                    <i class="fas fa-prescription-bottle"></i>
                </div>
                <span>Prescriptions</span>
            </a>
            
            <a href="#" class="action-card" onclick="viewInventory()">
                <div class="action-icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <span>Inventory</span>
            </a>
            
            <a href="#" class="action-card" onclick="generateReports()">
                <div class="action-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <span>Reports</span>
            </a>
            
            <a href="{{ route('all.vets') }}" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <span>All Vets</span>
            </a>
            
            <a href="{{ url('/vet-home') }}" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-home"></i>
                </div>
                <span>Vet Home</span>
            </a>
        </div>
    </section>
</div>

<script>
    // Dashboard functionality
    document.addEventListener('DOMContentLoaded', function() {
        loadDashboardData();
        setInterval(loadDashboardData, 300000);
    });

    function loadDashboardData() {
        // Use actual dynamic values from the database instead of dummy values
        animateNumber('todayAppointments', {{ $todayAppointments->count() }});
        animateNumber('totalPatients', {{ $appointments->count() }});
        animateNumber('emergencyCases', {{ $appointments->where('urgency_level', 'emergency')->count() }});
        animateNumber('confirmedAppointments', {{ $appointments->where('status', 'confirmed')->count() }});
    }

    function animateNumber(elementId, targetNumber) {
        const element = document.getElementById(elementId);
        if (!element) return;
        
        const duration = 1000;
        const startTime = performance.now();

        function updateNumber(currentTime) {
            const progress = Math.min((currentTime - startTime) / duration, 1);
            const currentNumber = Math.floor(progress * targetNumber);
            element.textContent = currentNumber;
            
            if (progress < 1) {
                requestAnimationFrame(updateNumber);
            }
        }
        
        requestAnimationFrame(updateNumber);
    }

    function viewPatientRecords() {
        alert('Patient Records system loading...');
    }

    function emergencyProtocol() {
        alert('Emergency Protocol activated...');
    }

    function viewPrescriptions() {
        alert('Prescription Management loading...');
    }

    function viewInventory() {
        alert('Inventory Management loading...');
    }

    function generateReports() {
        alert('Reports Generator loading...');
    }

    function updateAppointmentStatus(appointmentId, status) {
        console.log('Updating appointment status:', appointmentId, status);
        
        if (confirm(`Are you sure you want to ${status} this appointment?`)) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log('CSRF Token:', csrfToken);
            
            fetch(`/appointments/${appointmentId}/status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    status: status
                })
            })
            .then(response => {
                console.log('Response status:', response.status);
                if (!response.ok) {
                    throw new Error(`Network response was not ok: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Success response:', data);
                if (data.success) {
                    alert(`Appointment ${status} successfully!`);
                    location.reload();
                } else {
                    alert(`Failed to ${status} appointment: ${data.message || 'Please try again.'}`);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the appointment. Please try again.');
            });
        }
    }
</script>
@endsection
