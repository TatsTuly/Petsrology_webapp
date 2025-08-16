@extends('layouts.vet_app')

@section('title', 'Vet Homepage - PETSROLOGY')

@section('styles')
<style>
    body {
        font-family: 'Nunito', sans-serif;
        background: linear-gradient(135deg, #ff9472 0%, #ff6f61 100%);
        min-height: 100vh;
    }
    .vet-homepage-container {
        max-width: 900px;
        margin: 60px auto;
        padding: 40px 30px;
        background: linear-gradient(135deg, #fff 80%, #ffe3e0 100%);
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(255,111,97,0.13), 0 2px 8px rgba(0,0,0,0.04);
        border: 2px solid #ff9472;
        display: flex;
        gap: 40px;
        justify-content: center;
        align-items: flex-start;
        flex-wrap: wrap;
    }
    .vet-card {
        background: #fff8f6;
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(255,111,97,0.10);
        padding: 40px 30px;
        text-align: center;
        width: 340px;
        border: 1px solid #ff9472;
        transition: box-shadow 0.3s, transform 0.3s;
    }
    .vet-card:hover {
        box-shadow: 0 15px 40px rgba(255,111,97,0.18);
        transform: translateY(-8px);
        border-color: #ff6f61;
    }
    .vet-card-title {
        font-size: 1.6rem;
        color: #ff6f61;
        font-weight: 800;
        margin-bottom: 18px;
        letter-spacing: 1px;
    }
    .vet-card-desc {
        font-size: 1.08rem;
        color: #666;
        margin-bottom: 28px;
        line-height: 1.6;
    }
    .vet-card-btn {
        background: linear-gradient(135deg, #ff6f61, #ff9472);
        color: white;
        border: none;
        padding: 14px 32px;
        border-radius: 50px;
        cursor: pointer;
        font-weight: 700;
        font-size: 1rem;
        transition: background 0.3s, transform 0.2s;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 4px 15px rgba(255,111,97,0.15);
    }
    .vet-card-btn:hover {
        background: #e65c50;
        transform: translateY(-2px);
        color: white;
        text-decoration: none;
    }
    @media (max-width: 900px) {
        .vet-homepage-container {
            flex-direction: column;
            align-items: center;
            gap: 30px;
            padding: 20px 10px;
        }
        .vet-card {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="vet-homepage-container">
    <div class="vet-card">
        <div class="vet-card-title">Join as Professional Vet</div>
        <div class="vet-card-desc">Become a part of our trusted veterinary network and help pets in need. Register to offer your professional services and connect with pet owners.</div>
        <a href="{{ url('/vet-join') }}" class="vet-card-btn">Join Now</a>
    </div>
    <div class="vet-card">
        <div class="vet-card-title">See Appointments</div>
        <div class="vet-card-desc">View and manage your upcoming appointments with pet owners. Stay organized and provide the best care for your furry patients.</div>
        <a href="{{ url('/vet-appointments') }}" class="vet-card-btn">View Appointments</a>
    </div>
</div>
@endsection
