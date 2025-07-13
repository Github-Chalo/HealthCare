@extends('user.app')

@section('title','Find Care')


@section('content')

<section class="body">
    <p class="text-center m-3" style="font-size: 14px">If this is a medical emergency, call 911 immediately.</p>
    <div class="find-care-section">
        <div class="find-care-content">
            <h1>Find Care Options <br> Near You</h1>
            <div class="search">
                <input type="search" placeholder="Find Care Options">
                <div class="search-btn">
                    <button>Search</button>
                </div>
            </div>
        </div>
    </div>
    <div class="or">
        <div class="left-hr">
            <hr>
        </div>
        <p>OR</p>
        <div class="right-hr">
            <hr>
        </div>
    </div>
    <div class="schedulling">
        <h3>Start Scheduling</h3>
        <div class="row">
            <div class="col-lg-6">
                <div class="schedule-link">
                    <div class="icon">
                        <i class="fa-solid fa-calendar-day"></i>
                    </div>
                    <a href="">Urgent Care</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="schedule-link">
                    <div class="icon">
                        <i class="fa-solid fa-calendar-day"></i>
                    </div>
                    <a href="">Lab Testing</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="schedule-link">
                    <div class="icon">
                        <i class="fa-solid fa-calendar-day"></i>
                    </div>
                    <a href="">Virtual Urgent Care</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="schedule-link">
                    <div class="icon">
                        <i class="fa-solid fa-calendar-day"></i>
                    </div>
                    <a href="">Mammogram</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="schedule-link">
                    <div class="icon">
                        <i class="fa-solid fa-calendar-day"></i>
                    </div>
                    <a href="">At Home Urgent Care</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="schedule-link">
                    <div class="icon">
                        <i class="fa-solid fa-calendar-day"></i>
                    </div>
                    <a href="">Ers</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection