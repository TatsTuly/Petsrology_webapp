<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vet Dashboard - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Enhanced Header */
        .vet-header {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            padding: 20px 0;
            box-shadow: 0 4px 20px rgba(255,111,97,0.25);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .vet-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .vet-logo {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0.1) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(255,255,255,0.2);
            border: 2px solid rgba(255,255,255,0.3);
        }

        .brand-text h1 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 2px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .brand-text p {
            font-size: 1rem;
            opacity: 0.9;
            margin: 0;
            font-weight: 500;
        }

        .vet-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .vet-user {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 18px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .logout-btn {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #c0392b 0%, #a93226 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
            text-decoration: none;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Welcome Section */
        .welcome-section {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 40px;
            border: 1px solid rgba(255,255,255,0.8);
            position: relative;
            overflow: hidden;
        }

        .welcome-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #ff6f61, #ff9472, #e74c3c, #f39c12);
        }

        .welcome-section h2 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(45deg, #ff6f61, #ff9472);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .welcome-section p {
            font-size: 1.1rem;
            color: #5a6c7d;
            line-height: 1.6;
            margin: 0;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.8);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #ff6f61, #ff9472);
            transition: left 0.5s ease;
        }

        .stat-card:hover::before {
            left: 0;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 1.8rem;
            box-shadow: 0 8px 20px rgba(255,111,97,0.3);
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .stat-icon.appointments {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
        }

        .stat-icon.patients {
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
            box-shadow: 0 8px 20px rgba(33, 150, 243, 0.3);
        }

        .stat-icon.emergency {
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
            box-shadow: 0 8px 20px rgba(244, 67, 54, 0.3);
        }

        .stat-icon.revenue {
            background: linear-gradient(135deg, #FF9800 0%, #F57C00 100%);
            box-shadow: 0 8px 20px rgba(255, 152, 0, 0.3);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 8px;
            background: linear-gradient(45deg, #2c3e50, #ff6f61);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            color: #5a6c7d;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
            margin-top: 10px;
        }

        .trend-up {
            color: #4CAF50;
        }

        .trend-down {
            color: #f44336;
        }

        /* Quick Actions */
        .quick-actions {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
        }

        .quick-actions h3 {
            color: #2c3e50;
            margin-bottom: 25px;
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(45deg, #2c3e50, #ff6f61);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }

        .action-card {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px 25px;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border: 2px solid rgba(255,111,97,0.1);
            border-radius: 15px;
            text-decoration: none;
            color: #2c3e50;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #ff6f61, #ff9472);
            transition: left 0.5s ease;
        }

        .action-card:hover::before {
            left: 0;
        }

        .action-card:hover {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255,111,97,0.3);
            text-decoration: none;
        }

        .action-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            box-shadow: 0 5px 15px rgba(255,111,97,0.2);
            transition: all 0.3s ease;
        }

        .action-card:hover .action-icon {
            background: linear-gradient(135deg, #ffffff 0%, #ecf0f1 100%);
            color: #ff6f61;
            transform: scale(1.1) rotate(5deg);
        }

        /* Dashboard Sections */
        .dashboard-sections {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .section-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(255,111,97,0.08), 0 2px 8px rgba(0,0,0,0.04);
            border: 1px solid rgba(255,111,97,0.05);
        }

        .section-title {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: #ff6f61;
        }

        /* Recent Appointments */
        .appointment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 15px;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        .appointment-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .appointment-info h4 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .appointment-info p {
            color: #5a6c7d;
            font-size: 0.9rem;
            margin: 0;
        }

        .appointment-time {
            background: #ff6f61;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* Notifications */
        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 15px;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        .notification-item:hover {
            background: #e9ecef;
        }

        .notification-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            color: white;
            flex-shrink: 0;
        }

        .notification-icon.info {
            background: #2196F3;
        }

        .notification-icon.warning {
            background: #FF9800;
        }

        .notification-icon.success {
            background: #4CAF50;
        }

        .notification-content h5 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 0.95rem;
        }

        .notification-content p {
            color: #5a6c7d;
            font-size: 0.85rem;
            margin: 0;
            line-height: 1.4;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .vet-nav {
                flex-direction: column;
                gap: 10px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
            
            .dashboard-container {
                padding: 20px 15px;
            }
            
            .welcome-section h2 {
                font-size: 2rem;
            }
            
            .brand-text h1 {
                font-size: 1.5rem;
            }
            
            .brand-text p {
                font-size: 0.9rem;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dashboard-container {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Loading States */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,111,97,.3);
            border-radius: 50%;
            border-top-color: #ff6f61;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

    </style>
</head>
<body>
    <header class="vet-header">
        <div class="header-container">
            <div class="vet-brand">
                <div class="vet-logo">
                    <svg width="30" height="30" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="22" cy="30" rx="11" ry="8" fill="#fff"/>
                        <ellipse cx="12" cy="18" rx="4" ry="5" fill="#fff"/>
                        <ellipse cx="32" cy="18" rx="4" ry="5" fill="#fff"/>
                        <ellipse cx="17" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                        <ellipse cx="27" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                    </svg>
                </div>
                <div class="brand-text">
                    <h1>PETSROLOGY</h1>
                    <p>Veterinarian Dashboard</p>
                </div>
            </div>
            
            <nav class="vet-nav">
                <div class="vet-user">
                    <i class="fas fa-user-md"></i>
                    <span>Dr. {{ session('user_email') ? explode('@', session('user_email'))[0] : 'Veterinarian' }}</span>
                </div>
                <form method="POST" action="{{ url('/logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </nav>
        </div>
    </header>

    <main class="dashboard-container">
        <section class="welcome-section">
            <h2>Welcome, Dr. {{ session('user_email') ? explode('@', session('user_email'))[0] : 'Veterinarian' }}</h2>
            <p>Manage your veterinary practice efficiently from this comprehensive dashboard. Monitor appointments, track patient records, and oversee all practice activities.</p>
        </section>

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
    </main>

    <script>
        // Dashboard functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Load dashboard data
            loadDashboardData();
            
            // Check for emergency cases
            checkEmergencyCases();
            
            // Auto-refresh every 5 minutes
            setInterval(loadDashboardData, 300000);
        });

        function loadDashboardData() {
            // Simulate loading real-time data
            // In a real application, this would fetch data from the backend
            
            // Update stats with animation
            animateNumber('todayAppointments', 12);
            animateNumber('totalPatients', 247);
            animateNumber('emergencyCases', 3);
        }

        function animateNumber(elementId, targetNumber) {
            const element = document.getElementById(elementId);
            const startNumber = 0;
            const duration = 1000;
            const startTime = performance.now();

            function updateNumber(currentTime) {
                const elapsedTime = currentTime - startTime;
                const progress = Math.min(elapsedTime / duration, 1);
                const currentNumber = Math.floor(progress * targetNumber);
                
                element.textContent = currentNumber;
                
                if (progress < 1) {
                    requestAnimationFrame(updateNumber);
                }
            }
            
            requestAnimationFrame(updateNumber);
        }

        function checkEmergencyCases() {
            const emergencyCases = parseInt(document.getElementById('emergencyCases').textContent);
            const emergencyAlert = document.getElementById('emergencyAlert');
            
            if (emergencyCases > 0) {
                emergencyAlert.style.display = 'flex';
            }
        }

        // Quick Action Functions
        function viewPatientRecords() {
            alert('Patient Records feature coming soon! This will show a comprehensive list of all patient medical records.');
        }

        function emergencyProtocol() {
            alert('Emergency Protocol activated! This will open the emergency case management system.');
        }

        function viewPrescriptions() {
            alert('Prescription Management feature coming soon! This will allow you to create and manage prescriptions.');
        }

        function viewInventory() {
            alert('Inventory Management feature coming soon! This will show current stock levels and supply management.');
        }

        function generateReports() {
            alert('Reports & Analytics feature coming soon! This will generate comprehensive practice reports.');
        }

        function viewAllAppointments() {
            window.location.href = "{{ route('book.appointment') }}";
        }

        function viewAllNotifications() {
            alert('Notifications Center coming soon! This will show all notifications and alerts.');
        }

        function viewEmergencies() {
            alert('Emergency Cases Management coming soon! This will show all urgent cases requiring attention.');
        }

        // Real-time updates simulation
        function simulateRealTimeUpdates() {
            setInterval(() => {
                // Simulate new notification
                const notifications = document.getElementById('notificationsList');
                const newNotification = createNotificationElement('New patient registered', 'info');
                notifications.insertBefore(newNotification, notifications.firstChild);
                
                // Remove last notification to keep list manageable
                if (notifications.children.length > 4) {
                    notifications.removeChild(notifications.lastChild);
                }
            }, 30000); // Every 30 seconds
        }

        function createNotificationElement(message, type) {
            const notification = document.createElement('div');
            notification.className = 'notification-item';
            notification.innerHTML = `
                <div class="notification-icon ${type}">
                    <i class="fas fa-${type === 'info' ? 'info' : type === 'warning' ? 'exclamation' : 'check'}"></i>
                </div>
                <div class="notification-content">
                    <h5>System Update</h5>
                    <p>${message}</p>
                </div>
            `;
            return notification;
        }

        // Start real-time updates
        simulateRealTimeUpdates();

        // Service Worker for offline functionality (optional)
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js')
                .then(registration => console.log('SW registered'))
                .catch(error => console.log('SW registration failed'));
        }
    </script>
</body>
</html>
