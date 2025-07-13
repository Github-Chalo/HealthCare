@extends('user.advent-app')

@section('title','Find Care')


@section('content')


<section class="test-info">
    <div class="row">
        <div class="col-lg-12">
            <div class="info">
                <a href="{{ route('user.tests') }}" class="list"><i class="fa-solid fa-arrow-left"></i>Tests Results List</a>
                <h3>POC GLUCOSE METER</h3>
                <div class="collected">
                    <h4>Collected on November 24, 2024 12:54 PM</h4>
                    <a href=""><i class="fa-solid fa-print"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row visualization">
        <h3>Lab tests - Blood (Blood, Capillary)</h3>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h5>Results</h5>
            <h5><a href="{{ route('user.testInfo') }}" style="text-decoration: none">Refresh</a></h5>
        </div>
        <div class="row">
            <div class="col-lg-12" >
                <div class="table-responsive cards" style="min-height: 60vh;width: 100%;">
                    <table class="table table-bordered">
                        <tr>
                            <th>Spo2</th>
                            <th>Heart Rate</th>
                            <th>Body Temperature</th>
                            <th>Time</th>
                        </tr>
                        @foreach($sensordata as $data)
                        <tr>
                            <td>{{ $data->Spo2 }}</td>
                            <td>{{ $data->Heart_rate }}</td>
                            <td>{{ $data->body_temperature }}</td>
                            <td>{{ $data->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection