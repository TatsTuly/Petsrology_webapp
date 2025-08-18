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
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
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
                <a href="{{ route('contact') }}" class="btn-dashboard">
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
            <div class="stat-number" id="todayAppointments">12</div>
            <div class="stat-label">Today's Appointments</div>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>+15% from yesterday</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon patients">
                <i class="fas fa-paw"></i>
            </div>
            <div class="stat-number" id="totalPatients">247</div>
            <div class="stat-label">Total Patients</div>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>+8% this month</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon emergency">
                <i class="fas fa-ambulance"></i>
            </div>
            <div class="stat-number" id="emergencyCases">3</div>
            <div class="stat-label">Emergency Cases</div>
            <div class="stat-trend trend-down">
                <i class="fas fa-arrow-down"></i>
                <span>-20% from last week</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon revenue">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-number">৳45,280</div>
            <div class="stat-label">Monthly Revenue</div>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>+12% from last month</span>
            </div>
        </div>
    </section>

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
@endsection

@section('scripts')
<script>
    // Dashboard functionality
    document.addEventListener('DOMContentLoaded', function() {
        loadDashboardData();
        setInterval(loadDashboardData, 300000);
    });

    function loadDashboardData() {
        animateNumber('todayAppointments', 12);
        animateNumber('totalPatients', 247);
        animateNumber('emergencyCases', 3);
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
</script>
@endsection
