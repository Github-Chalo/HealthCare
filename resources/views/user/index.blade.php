@extends('user.app')

@section('title','Dashboard')

@section('content')

<div class="care-section">
    <div class="care-content">
        <h1>How Can We Care For You?</h1>
        <p class="care-subtitle">Common Searches</p>
        <div class="care-links">
            <a href="#" class="care-link">Primary Care</a>
            <a href="#" class="care-link">Children's Care</a>
            <a href="#" class="care-link">Orthopedics</a>
            <a href="#" class="care-link">Women's Care</a>
            <a href="#" class="care-link">Heart & Vascular Care</a>
        </div>
    </div>
</div>
<div class="main-section">
    <div class="care-team">
        <div class="care-team-header">
            <h2>Care Team</h2>
            <div class="settings d-flex align-items-center gap-1">
                <i class="fa-solid fa-gear settings-icon"></i>
                Settings
            </div>
        </div>
        <div class="cards-container d-flex">
            <!-- Card 1 -->
            <div class="card">
                <div class="card-header" style="background-color: #d7f5f0;">
                    <img src="{{ asset('images/hosi.jpeg') }}" alt="Hope" class="avatar" />
                </div>
                <div class="card-body">
                    <h3>Hope</h3>
                    <p>Care Advocate</p>
                    <button class="btn">
                        <i class="fa-solid fa-comment-dots"></i> Ask Me Anything
                    </button>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card">
                <div class="card-header" style="background-color: #eedaf5;">
                    <div class="group-avatar">
                        <img src="{{ asset('images/hosi.jpeg') }}" alt="Team Member 1" />
                        <img src="{{ asset('images/hosi.jpeg') }}" alt="Team Member 2" />
                        <img src="{{ asset('images/hosi.jpeg') }}" alt="Team Member 3" />
                    </div>
                </div>
                <div class="card-body">
                    <h3>24/7 Virtual Urgent Care</h3>
                    <p class="status">
                        <i class="fa-solid fa-circle-check"></i> Available Now
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card">
                <div class="card-header" style="background-color: #d7ebf5;">
                    <img src="{{ asset('images/hosi.jpeg') }}" alt="Catherine Mann" class="avatar" />
                </div>
                <div class="card-body">
                    <h3>Catherine Mann, MD</h3>
                    <p>Family Medicine</p>
                </div>
            </div>
        </div>
    </div>
    <div class="quick-links">
        <h3>Quick Links</h3>
        <div class="row quicks">
            <!-- Card 1 -->
            <div class="link-card">
                <div class="icon-container">
                    <i class="fa-solid fa-comment-dots"></i>
                </div>
                <span>Messages</span>
            </div>
    
            <!-- Card 2 -->
            <div class="link-card">
                <div class="icon-container">
                    <i class="fa-solid fa-file-medical"></i>
                </div>
                <span><a href="{{ route('user.tests') }}">Test Results</a></span>
            </div>
    
            <!-- Card 3 -->
            <div class="link-card">
                <div class="icon-container">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
                <span><a href="{{ route('user.visits') }}">Visits</a></span>
            </div>
    
            <!-- Card 4 -->
            <div class="link-card">
                <div class="icon-container">
                    <i class="fa-solid fa-pills"></i>
                </div>
                <span>Medications</span>
            </div>
        </div>
    </div>
    <div class="health-records-note">
        <div class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </div>
        <div class="content">
            <h4>Note About Your Health Records</h4>
            <p>
                Some of your historical health records may not be available within the new AdventHealth Account experience.
                If you need access to your historical medical records, please request it via the 
                <a href="#">Medical Record page</a>.
            </p>
        </div>
    </div>
    <div class="health-updates">
        <div class="health-header">
            <h2>Health Updates</h2>
            <i class="fa-solid fa-circle-info"></i>
        </div>
        <div class="health-body">
            <h4>Current Preventive Care Reminders</h4>
            <p>Preventive medicine plays an important part in your health and overall well-being. The following procedures are recommended for people of your age, sex, and medical history.</p>
        </div>
        <h4 style="font-weight: 300">Overdue</h4>
        <div class="health-card">
            <div class="health-card-header">
                <h3>Hemoglobin A1C</h3>
                <a href="">Request Appointment</a>
            </div>
        </div>
    </div>
    
    
</div>


@endsection