<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Dashboard - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            color: white;
            padding: 0;
            box-shadow: 0 4px 20px rgba(44, 62, 80, 0.15);
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
            padding: 15px 20px;
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand-logo {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .brand-text h1 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 2px;
            background: linear-gradient(45deg, #fff, #ecf0f1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-text p {
            font-size: 1rem;
            opacity: 0.9;
            margin: 0;
            font-weight: 500;
        }

        .header-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 18px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .back-btn {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 3px 10px rgba(255, 111, 97, 0.3);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #ff9472 0%, #ffab47 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 111, 97, 0.4);
            text-decoration: none;
        }

        /* Dashboard Container */
        .dashboard-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

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
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2980b9);
            transition: left 0.5s ease;
        }

        .welcome-section:hover::before {
            left: 0;
        }

        .welcome-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .welcome-text h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #2c3e50, #3498db);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .welcome-text p {
            font-size: 1.2rem;
            color: #5a6c7d;
            margin: 0;
        }

        .welcome-stats {
            display: flex;
            gap: 30px;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            background: rgba(52, 152, 219, 0.1);
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.2);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #3498db;
            display: block;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #5a6c7d;
            font-weight: 600;
        }

        /* Quick Actions Grid */
        .quick-actions {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .section-title i {
            color: #3498db;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .action-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 30px 25px;
            border-radius: 18px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            border: 1px solid rgba(255,255,255,0.9);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #3498db, #2980b9);
            transition: left 0.5s ease;
        }

        .action-card.pets::before {
            background: linear-gradient(90deg, #ff6f61, #ff9472);
        }

        .action-card.vet::before {
            background: linear-gradient(90deg, #27ae60, #229954);
        }

        .action-card.supplies::before {
            background: linear-gradient(90deg, #f39c12, #e67e22);
        }

        .action-card.profile::before {
            background: linear-gradient(90deg, #9b59b6, #8e44ad);
        }

        .action-card.community::before {
            background: linear-gradient(90deg, #e74c3c, #c0392b);
        }

        .action-card.personalization::before {
            background: linear-gradient(90deg, #16a085, #1abc9c);
        }

        .action-card:hover::before {
            left: 0;
        }

        .action-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.12);
        }

        .action-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 2rem;
            box-shadow: 0 8px 20px rgba(52, 152, 219, 0.3);
            transition: all 0.3s ease;
        }

        .action-card.pets .action-icon {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            box-shadow: 0 8px 20px rgba(255, 111, 97, 0.3);
        }

        .action-card.vet .action-icon {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
            box-shadow: 0 8px 20px rgba(39, 174, 96, 0.3);
        }

        .action-card.supplies .action-icon {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            box-shadow: 0 8px 20px rgba(243, 156, 18, 0.3);
        }

        .action-card.profile .action-icon {
            background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);
            box-shadow: 0 8px 20px rgba(155, 89, 182, 0.3);
        }

        .action-card.community .action-icon {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.3);
        }

        .action-card.personalization .action-icon {
            background: linear-gradient(135deg, #16a085 0%, #1abc9c 100%);
            box-shadow: 0 8px 20px rgba(22, 160, 133, 0.3);
        }

        .action-card:hover .action-icon {
            transform: scale(1.1) rotate(10deg);
        }

        .action-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .action-desc {
            color: #5a6c7d;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .action-btn {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .action-card.pets .action-btn {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        }

        .action-card.vet .action-btn {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
        }

        .action-card.supplies .action-btn {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
        }

        .action-card.profile .action-btn {
            background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);
        }

        .action-card.community .action-btn {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
        }

        .action-card.personalization .action-btn {
            background: linear-gradient(135deg, #16a085 0%, #1abc9c 100%);
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: white;
            text-decoration: none;
        }

        /* Recent Activity Section */
        .recent-activity {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
            margin-bottom: 40px;
        }

        /* User Profile Section */
        .user-profile {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .user-profile::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #9b59b6, #8e44ad);
            transition: left 0.5s ease;
        }

        .user-profile:hover::before {
            left: 0;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-bottom: 30px;
            padding-bottom: 25px;
            border-bottom: 2px solid rgba(155, 89, 182, 0.1);
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: 800;
            box-shadow: 0 10px 30px rgba(155, 89, 182, 0.3);
        }

        .profile-info h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .profile-info p {
            color: #5a6c7d;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .profile-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .profile-stat {
            text-align: center;
            padding: 20px;
            background: rgba(155, 89, 182, 0.1);
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .profile-stat:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(155, 89, 182, 0.2);
        }

        .profile-stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: #9b59b6;
            display: block;
            margin-bottom: 8px;
        }

        .profile-stat-label {
            font-size: 1rem;
            color: #5a6c7d;
            font-weight: 600;
        }

        /* Adoption & Purchase History */
        .history-section {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
            margin-bottom: 40px;
        }

        .history-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }

        .tab-btn {
            padding: 12px 25px;
            background: transparent;
            border: none;
            border-bottom: 3px solid transparent;
            color: #5a6c7d;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .tab-btn.active {
            color: #3498db;
            border-bottom-color: #3498db;
        }

        .tab-btn:hover {
            color: #3498db;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .history-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 25px;
            background: rgba(52, 152, 219, 0.05);
            border-radius: 15px;
            margin-bottom: 20px;
            border-left: 4px solid #3498db;
            transition: all 0.3s ease;
        }

        .history-item:hover {
            transform: translateX(5px);
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.1);
        }

        .history-item.adoption {
            border-left-color: #27ae60;
            background: rgba(39, 174, 96, 0.05);
        }

        .history-item.purchase {
            border-left-color: #f39c12;
            background: rgba(243, 156, 18, 0.05);
        }

        .history-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .history-item .history-icon {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        }

        .history-item.adoption .history-icon {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
        }

        .history-item.purchase .history-icon {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
        }

        .history-details {
            flex: 1;
        }

        .history-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .history-desc {
            color: #5a6c7d;
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .history-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .history-date {
            color: #7f8c8d;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .history-status {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-completed {
            background: rgba(39, 174, 96, 0.1);
            color: #27ae60;
        }

        .status-pending {
            background: rgba(243, 156, 18, 0.1);
            color: #f39c12;
        }

        .status-delivered {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }

        /* User Feed Section */
        .user-feed {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
            margin-bottom: 40px;
        }

        .feed-header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(231, 76, 60, 0.1);
        }

        .create-post-btn {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
        }

        .create-post-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
        }

        .feed-filters {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        .filter-btn {
            padding: 8px 16px;
            background: transparent;
            border: 2px solid #e74c3c;
            color: #e74c3c;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .filter-btn.active, .filter-btn:hover {
            background: #e74c3c;
            color: white;
        }

        .feed-item {
            display: flex;
            gap: 20px;
            padding: 25px;
            background: rgba(52, 152, 219, 0.05);
            border-radius: 15px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            border-left: 4px solid #3498db;
        }

        .feed-item.featured {
            border-left-color: #e74c3c;
            background: rgba(231, 76, 60, 0.05);
        }

        .feed-item.trending {
            border-left-color: #f39c12;
            background: rgba(243, 156, 18, 0.05);
        }

        .feed-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.1);
        }

        .feed-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        .feed-content {
            flex: 1;
        }

        .feed-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .feed-user {
            font-weight: 700;
            color: #2c3e50;
        }

        .feed-time {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .feed-text {
            color: #5a6c7d;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .feed-actions {
            display: flex;
            gap: 20px;
        }

        .feed-action {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #7f8c8d;
            font-size: 0.9rem;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .feed-action:hover {
            color: #3498db;
        }

        .feed-action.liked {
            color: #e74c3c;
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background: rgba(52, 152, 219, 0.05);
            border-radius: 15px;
            border-left: 4px solid #3498db;
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.1);
        }

        .activity-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .activity-desc {
            color: #5a6c7d;
            font-size: 0.9rem;
        }

        .activity-time {
            color: #7f8c8d;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .header-nav {
                flex-direction: column;
                gap: 10px;
            }

            .dashboard-container {
                padding: 0 15px;
            }

            .welcome-content {
                flex-direction: column;
                text-align: center;
            }

            .welcome-stats {
                flex-direction: column;
                gap: 15px;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }

            .welcome-text h2 {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .welcome-section {
                padding: 25px 20px;
            }

            .recent-activity {
                padding: 25px 20px;
            }

            .activity-item {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="header-brand">
                <div class="brand-logo">
                    <svg width="35" height="35" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="22" cy="30" rx="11" ry="8" fill="#fff"/>
                        <ellipse cx="12" cy="18" rx="4" ry="5" fill="#fff"/>
                        <ellipse cx="32" cy="18" rx="4" ry="5" fill="#fff"/>
                        <ellipse cx="17" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                        <ellipse cx="27" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                    </svg>
                </div>
                <div class="brand-text">
                    <h1>PETSROLOGY</h1>
                    <p>User Dashboard</p>
                </div>
            </div>
            
            <div class="header-nav">
                <div class="user-info">
                    <div class="user-avatar">
                        {{ isset($user) ? substr($user->name, 0, 1) : 'U' }}
                    </div>
                    <span>{{ Auth::user()->name ?? 'Username:' }}</span>
                <span>{{ isset($user) ? $user->name : 'Username:' }}</span>
                </div>
                <a href="{{ url('/welcome') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Back to Main Site
                </a>
            </div>
        </div>
    </header>

    <main class="dashboard-container">
        <!-- Welcome Section -->
        <section class="welcome-section">
            <div class="welcome-content">
                <div class="welcome-text">
                    <h2>Welcome Back!</h2>
                    <p>Manage your pets, appointments, and explore new opportunities</p>
                </div>
                <div class="welcome-stats">
                    <div class="stat-item">
                        <span class="stat-number">3</span>
                        <span class="stat-label">My Pets</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">2</span>
                        <span class="stat-label">Appointments</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">5</span>
                        <span class="stat-label">Orders</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- User Profile Section -->
        <section class="user-profile">
            <h3 class="section-title">
                <i class="fas fa-user-circle"></i>
                User Profile
            </h3>
            <div class="profile-header">
                <div class="profile-avatar">
                    {{ isset($user) ? substr($user->name, 0, 1) : 'U' }}
                </div>
                <div class="profile-info">
                    <h3>{{ isset($user) ? $user->name : '' }}</h3>
                    <p><i class="fas fa-envelope"></i> {{ isset($user) ? $user->email : '' }}</p>
                    <p><i class="fas fa-calendar"></i> Member since {{ isset($user) && $user->created_at ? $user->created_at->format('F Y') : '' }}</p>
                </div>
            </div>
            <div class="profile-stats">
                <div class="profile-stat">
                    <span class="profile-stat-number">3</span>
                    <span class="profile-stat-label">Pets Adopted</span>
                </div>
                <div class="profile-stat">
                    <span class="profile-stat-number">12</span>
                    <span class="profile-stat-label">Orders Completed</span>
                </div>
                <div class="profile-stat">
                    <span class="profile-stat-number">8</span>
                    <span class="profile-stat-label">Vet Visits</span>
                </div>
                <div class="profile-stat">
                    <span class="profile-stat-number">4.9</span>
                    <span class="profile-stat-label">Average Rating</span>
                </div>
            </div>
        </section>

        <!-- Quick Actions -->
        <section class="quick-actions">
            <h3 class="section-title">
                <i class="fas fa-bolt"></i>
                Quick Actions
            </h3>
            <div class="actions-grid">
                <div class="action-card pets">
                    <div class="action-icon">
                        <i class="fas fa-paw"></i>
                    </div>
                    <h4 class="action-title">Adopt a Pet</h4>
                    <p class="action-desc">Find your perfect companion from our verified shelters and rescues</p>
                    <a href="{{ url('/adopt-home') }}" class="action-btn">Browse Pets</a>
                </div>
                
                <div class="action-card vet">
                    <div class="action-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h4 class="action-title">Book Vet Appointment</h4>
                    <p class="action-desc">Schedule appointments with certified veterinarians for your pets</p>
                    <a href="{{ url('/vet-home') }}" class="action-btn">Book Now</a>
                </div>
                
                <div class="action-card supplies">
                    <div class="action-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h4 class="action-title">Shop Pet Supplies</h4>
                    <p class="action-desc">Browse premium food, toys, and accessories for your pets</p>
                    <a href="{{ route('pet.supplies') }}" class="action-btn">Shop Now</a>
                </div>
                
                <div class="action-card profile">
                    <div class="action-icon">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <h4 class="action-title">Manage Profile</h4>
                    <p class="action-desc">Update your personal information and pet details</p>
                    <a href="#" class="action-btn">Edit Profile</a>
                </div>
                
                
                <div class="action-card personalization">
                    <div class="action-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h4 class="action-title">Pet Personalization</h4>
                    <p class="action-desc">Customize your pet's profile, preferences, and create personalized care plans</p>
                    <a href="#" class="action-btn" onclick="showPersonalizationModal()">Customize Pet</a>
                </div>
            </div>
        </section>

        <!-- Adoption & Purchase History -->
        <section class="history-section">
            <h3 class="section-title">
                <i class="fas fa-history"></i>
                History & Details
            </h3>
            <div class="history-tabs">
                <button class="tab-btn active" onclick="showTab('appointments')">My Appointments</button>
                <button class="tab-btn" onclick="showTab('adoptions')">Adoption Requests</button>
                <button class="tab-btn" onclick="showTab('purchases')">Purchase History</button>
            </div>
            <div id="appointments" class="tab-content active">
                @forelse($appointments as $appointment)
                <div class="history-item appointment">
                    <div class="history-icon">
                        <i class="fas fa-calendar-medical"></i>
                    </div>
                    <div class="history-details">
                        <div class="history-title">{{ $appointment->service_type_display ?? ucfirst(str_replace('-', ' ', $appointment->service_type)) }} - {{ $appointment->pet_name }}</div>
                        <div class="history-desc">
                            <strong>Pet:</strong> {{ $appointment->pet_name }} ({{ ucfirst($appointment->pet_type) }})
                            @if($appointment->vet)
                                <br><strong>Vet:</strong> Dr. {{ $appointment->vet->name }}
                            @endif
                            <br><strong>Date & Time:</strong> {{ $appointment->preferred_date->format('M d, Y') }} at {{ \Carbon\Carbon::parse($appointment->preferred_time)->format('g:i A') }}
                            @if($appointment->symptoms)
                                <br><strong>Symptoms:</strong> {{ $appointment->symptoms }}
                            @endif
                            @if($appointment->additional_notes)
                                <br><strong>Notes:</strong> {{ $appointment->additional_notes }}
                            @endif
                        </div>
                        <div class="history-meta">
                            <span class="history-date">Appointment #{{ $appointment->appointment_number }}</span>
                            @if($appointment->status == 'pending')
                                <span class="history-status status-pending">Pending Confirmation</span>
                            @elseif($appointment->status == 'confirmed')
                                <span class="history-status status-completed">Confirmed</span>
                            @elseif($appointment->status == 'cancelled')
                                <span class="history-status status-cancelled">Cancelled</span>
                            @elseif($appointment->status == 'completed')
                                <span class="history-status status-completed">Completed</span>
                            @elseif($appointment->status == 'no_show')
                                <span class="history-status status-cancelled">No Show</span>
                            @else
                                <span class="history-status">{{ ucfirst($appointment->status) }}</span>
                            @endif
                            @if($appointment->estimated_cost)
                                <span class="appointment-cost" style="background: linear-gradient(45deg, #ff6b6b, #ffa500); color: white; padding: 4px 8px; border-radius: 12px; font-weight: 600; margin-left: 8px;">৳{{ number_format($appointment->estimated_cost, 0) }}</span>
                            @endif
                        </div>
                        @if(in_array($appointment->status, ['pending', 'confirmed']) && $appointment->preferred_date > now()->startOfDay())
                            <div class="appointment-actions" style="margin-top: 12px;">
                                <button class="btn-cancel" onclick="cancelAppointment('{{ $appointment->id }}')" style="background: linear-gradient(45deg, #ff4757, #ff3742); color: white; border: none; padding: 8px 16px; border-radius: 20px; font-size: 0.85em; cursor: pointer; transition: all 0.3s ease;">
                                    <i class="fas fa-times"></i> Cancel Appointment
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="history-item appointment">
                    <div class="history-icon">
                        <i class="fas fa-calendar-medical"></i>
                    </div>
                    <div class="history-details">
                        <div class="history-title">No appointments yet</div>
                        <div class="history-desc">You haven't booked any appointments yet. Book your first appointment to get started!</div>
                        <div class="history-meta">
                            <a href="{{ route('book.appointment') }}" class="btn-book-appointment" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 10px 20px; border-radius: 25px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease;">
                                <i class="fas fa-calendar-plus"></i> Book Your First Appointment
                            </a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <div id="adoptions" class="tab-content">
                @if(session('success'))
                <div style="background:linear-gradient(135deg,#d4fc79 0%,#96e6a1 100%);color:#155724;padding:18px 24px;border-radius:12px;margin-bottom:22px;font-weight:700;box-shadow:0 2px 10px rgba(76,175,80,0.08);display:flex;align-items:center;gap:12px;">
                    <i class="fas fa-check-circle" style="font-size:1.5rem;"></i>
                    <span>{{ session('success') }} Thank you for your interest in adopting! You can track your request status below.</span>
                </div>
                @endif
                @forelse($adoptionRequests as $req)
                <div class="history-item adoption">
                    <div class="history-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="history-details">
                        <div class="history-title">{{ $req->adoptionPost->pet_name ?? 'Unknown Pet' }} - {{ $req->adoptionPost->breed ?? '' }}</div>
                        <div class="history-desc">Application for adoption. Reason: {{ $req->reasonForAdoption }}</div>
                        <div class="history-meta">
                            <span class="history-date">Applied on {{ $req->created_at->format('F d, Y') }}</span>
                            @if($req->status == 1)
                                <span class="history-status status-completed">Confirmed by Admin</span>
                            @elseif($req->status == 0)
                                <span class="history-status status-pending">Pending</span>
                            @elseif($req->status == 2)
                                <span class="history-status status-cancelled">Cancelled by Admin</span>
                            @else
                                <span class="history-status">{{ ucfirst($req->status) }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="history-item adoption">
                    <div class="history-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="history-details">
                        <div class="history-title">No adoption requests yet</div>
                        <div class="history-desc">You haven't submitted any adoption requests. Start your journey by adopting a pet!</div>
                    </div>
                </div>
                @endforelse
            </div>
            
            <div id="purchases" class="tab-content">
                <div class="history-item purchase">
                    <div class="history-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="history-details">
                        <div class="history-title">Premium Dog Food Bundle</div>
                        <div class="history-desc">Royal Canin Adult Dog Food (30lb) + Treats + Supplements. Order #ORD-2025-001</div>
                        <div class="history-meta">
                            <span class="history-date">Ordered on January 18, 2025 - $89.99</span>
                            <span class="history-status status-delivered">Delivered</span>
                        </div>
                    </div>
                </div>
                
                <div class="history-item purchase">
                    <div class="history-icon">
                        <i class="fas fa-bone"></i>
                    </div>
                    <div class="history-details">
                        <div class="history-title">Toy & Accessory Set</div>
                        <div class="history-desc">Interactive puzzle toys, rope toys, and premium collar set. Order #ORD-2024-045</div>
                        <div class="history-meta">
                            <span class="history-date">Ordered on December 22, 2024 - $45.50</span>
                            <span class="history-status status-delivered">Delivered</span>
                        </div>
                    </div>
                </div>
                
                <div class="history-item purchase">
                    <div class="history-icon">
                        <i class="fas fa-pills"></i>
                    </div>
                    <div class="history-details">
                        <div class="history-title">Monthly Medication Package</div>
                        <div class="history-desc">Heartworm prevention and flea treatment for Max and Bella. Order #ORD-2024-038</div>
                        <div class="history-meta">
                            <span class="history-date">Ordered on November 30, 2024 - $67.25</span>
                            <span class="history-status status-delivered">Delivered</span>
                        </div>
                    </div>
                </div>
                
                <div class="history-item purchase">
                    <div class="history-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="history-details">
                        <div class="history-title">Cat Litter & Supplies</div>
                        <div class="history-desc">Premium clumping litter, litter box, and cleaning supplies. Order #ORD-2025-002</div>
                        <div class="history-meta">
                            <span class="history-date">Ordered on January 20, 2025 - $34.99</span>
                            <span class="history-status status-pending">Processing</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- User Feed -->
    </main>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => {
                content.classList.remove('active');
            });
            
            // Remove active class from all tab buttons
            const tabBtns = document.querySelectorAll('.tab-btn');
            tabBtns.forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Show selected tab content
            document.getElementById(tabName).classList.add('active');
            
            // Add active class to clicked button
            event.target.classList.add('active');
        }
        
        function filterFeed(category) {
            // Update filter button states
            const filterBtns = document.querySelectorAll('.filter-btn');
            filterBtns.forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            // Filter feed items
            const feedItems = document.querySelectorAll('.feed-item');
            feedItems.forEach(item => {
                if (category === 'all') {
                    item.style.display = 'flex';
                } else if (category === 'featured' && item.classList.contains('featured')) {
                    item.style.display = 'flex';
                } else if (category === 'trending' && item.classList.contains('trending')) {
                    item.style.display = 'flex';
                } else if (category === 'questions' && item.innerHTML.includes('fa-question-circle')) {
                    item.style.display = 'flex';
                } else if (category === 'success' && item.innerHTML.includes('fa-trophy')) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        }
        
        function showCreatePost() {
            alert('Create Post feature coming soon! This will open a modal to create a new community post.');
        }
        
        function showPersonalizationModal() {
            alert('Pet Personalization Hub coming soon! This will provide access to:\n\n• Custom pet profiles with photos and details\n• Personalized care schedules and reminders\n• Custom dietary plans and feeding schedules\n• Behavioral preferences and special needs tracking\n• Pet milestone and achievement tracking\n• Customizable health and wellness dashboards\n• Personalized product recommendations\n\nCreate a unique experience tailored just for your pet!');
        }
        
        // Add interactive feed actions
        document.addEventListener('DOMContentLoaded', function() {
            const feedActions = document.querySelectorAll('.feed-action');
            feedActions.forEach(action => {
                if (action.innerHTML.includes('heart')) {
                    action.addEventListener('click', function() {
                        this.classList.toggle('liked');
                        const heartIcon = this.querySelector('i');
                        if (this.classList.contains('liked')) {
                            heartIcon.className = 'fas fa-heart';
                            const count = parseInt(this.textContent.match(/\d+/)[0]) + 1;
                            this.innerHTML = `<i class="fas fa-heart"></i> ${count} likes`;
                        } else {
                            heartIcon.className = 'far fa-heart';
                            const count = parseInt(this.textContent.match(/\d+/)[0]) - 1;
                            this.innerHTML = `<i class="far fa-heart"></i> ${count} likes`;
                        }
                    });
                }
                
                if (action.innerHTML.includes('bookmark')) {
                    action.addEventListener('click', function() {
                        const bookmarkIcon = this.querySelector('i');
                        if (bookmarkIcon.className === 'fas fa-bookmark') {
                            bookmarkIcon.className = 'far fa-bookmark';
                            this.innerHTML = `<i class="far fa-bookmark"></i> Save`;
                        } else {
                            bookmarkIcon.className = 'fas fa-bookmark';
                            this.innerHTML = `<i class="fas fa-bookmark"></i> Saved`;
                        }
                    });
                }
                
                if (action.innerHTML.includes('comment')) {
                    action.addEventListener('click', function() {
                        alert('Comments feature coming soon! This will show/hide comments for this post.');
                    });
                }
                
                if (action.innerHTML.includes('share')) {
                    action.addEventListener('click', function() {
                        alert('Share feature coming soon! This will open sharing options.');
                    });
                }
            });
            
            // Smooth scrolling for community link
            const communityLink = document.querySelector('a[href="#community-feed"]');
            if (communityLink) {
                communityLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('community-feed').scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            }
        });
        
        function cancelAppointment(appointmentId) {
            if (confirm('Are you sure you want to cancel this appointment? This action cannot be undone.')) {
                fetch(`/appointments/${appointmentId}/cancel`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Appointment cancelled successfully!');
                        location.reload();
                    } else {
                        alert('Failed to cancel appointment. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
            }
        }
    </script>
</body>
</html>
