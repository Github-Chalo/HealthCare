@extends('user.advent-app')

@section('title','Find Care')


@section('content')


<section class="tests">
    <div class="row">
        <div class="col-lg-8">
            <h3 style="font-weight: 400">Test Results</h3>
            <div class="search">
                <input type="search" placeholder="Search test results">
            </div>
            <div class="results">
                <h3 style="font-weight: 400">Individual Results</h3>
                <div class="results-card">
                    <div class="row">
                        @foreach($users as $user)
                        <a href="{{ route('user.testInfo') }}">
                            <div class="col-lg-12 results-body">
                                <div class="name">
                                    <i class="fa-solid fa-flask"></i>
                                    <h3>{{ $user->fullName() }}</h3>
                                </div>
                                <div class="date">
                                    <p>Nov 26 2024</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="rs-setting">
                <h5>Settings and Filters</h5>
            </div>
            <div class="result-setting">
                <h5>Show hospital results?</h5>
                <div class="links">
                    <button class="yes">Yes</button>
                    <button class="no">No</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 