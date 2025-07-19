@extends('admin.app')

@section('title','Users')

@section('content')



<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

    .main-content {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .section-title {
        color: #2c3e50;
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        text-align: center;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #4a90e2;
    }

    .content-row {
        display: flex;
        gap: 1.5rem;
        height: 70vh;
    }

    .table-section {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .chart-section {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .section-header h4 {
        color: #2c3e50;
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .refresh-link {
        color: #4a90e2;
        text-decoration: none;
        font-size: 0.9rem;
        padding: 0.3rem 0.8rem;
        border-radius: 5px;
        border: 1px solid #4a90e2;
    }

    .refresh-link:hover {
        background: #4a90e2;
        color: white;
    }

    .table-container {
        background: #f8f9fa;
        border-radius: 8px;
        overflow: hidden;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .table {
        margin: 0;
        height: 100%;
    }

    .table thead th {
        background: #4a90e2;
        color: white;
        font-weight: 600;
        border: none;
        padding: 0.8rem 0.5rem;
        text-align: center;
        font-size: 0.9rem;
    }

    .table tbody {
        display: block;
        height: calc(100% - 50px);
        overflow-y: auto;
    }

    .table thead,
    .table tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    .table tbody td {
        padding: 0.6rem 0.5rem;
        text-align: center;
        border-color: #dee2e6;
        font-weight: 500;
        color: #495057;
        font-size: 0.85rem;
    }

    .table tbody tr:hover {
        background: #e9ecef;
    }

    .charts-container {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .chart-wrapper {
        background: white;
        border-radius: 8px;
        padding: 0.8rem;
        height: calc(33.33% - 0.67rem);
        display: flex;
        flex-direction: column;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .chart-title {
        color: #2c3e50;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .chart-canvas {
        flex: 1;
        min-height: 0;
        max-height: 150px;
    }

    .vital-icon {
        font-size: 1rem;
    }

    .spo2-icon { color: #007bff; }
    .heart-icon { color: #28a745; }
    .temp-icon { color: #dc3545; }

    @media (max-width: 768px) {
        .content-row {
            flex-direction: column;
            height: auto;
        }
        
        .table-section,
        .chart-section {
            flex: none;
        }
        
        .charts-container {
            flex-direction: row;
            overflow-x: auto;
        }
        
        .chart-wrapper {
            min-width: 300px;
        }
    }
</style>


<div class="main-content" style="height: 80vh; overflow: auto;">
        <h2 class="section-title text-start">{{ $user->fullName() }}'s Vital Signs</h2>

        <div class="content-row">
            <!-- Table Section -->
            <div class="table-section">
                <div class="section-header">
                    <h4>
                        <i class="fa-solid fa-list-ul"></i> Recent Readings
                    </h4>
                    <a href="#"></i> Refresh
                    </a>
                </div>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <i class="fa-solid fa-lungs vital-icon spo2-icon"></i>
                                    Blood Oxygen
                                </th>
                                <th>
                                    <i class="fa-solid fa-heartbeat vital-icon heart-icon"></i>
                                    Heart Rate
                                </th>
                                <th>
                                    <i class="fa-solid fa-thermometer-half vital-icon temp-icon"></i>
                                    Temperature
                                </th>
                                <th>
                                    <i class="fa-solid fa-clock"></i>
                                    Time
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sensordata as $data)
                                <tr>
                                    <td><strong>{{ $data->Spo2 }}%</strong></td>
                                    <td><strong>{{ $data->Heart_rate }} bpm</strong></td>
                                    <td><strong>{{ $data->body_temperature }}°C</strong></td>
                                    <td>{{ $data->created_at->format('H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="chart-section">
                <div class="section-header">
                    <h4>
                        <i class="fa-solid fa-chart-line"></i> Trend Charts
                    </h4>
                </div>
                <div class="charts-container">
                    <div class="chart-wrapper">
                        <div class="chart-title">
                            <i class="fa-solid fa-lungs spo2-icon"></i> Blood Oxygen (SpO₂)
                        </div>
                        <canvas id="spo2Chart" class="chart-canvas"></canvas>
                    </div>
                    <div class="chart-wrapper">
                        <div class="chart-title">
                            <i class="fa-solid fa-heartbeat heart-icon"></i> Heart Rate
                        </div>
                        <canvas id="heartRateChart" class="chart-canvas"></canvas>
                    </div>
                    <div class="chart-wrapper">
                        <div class="chart-title">
                            <i class="fa-solid fa-thermometer-half temp-icon"></i> Body Temperature
                        </div>
                        <canvas id="temperatureChart" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Chart Scripts -->
<script>
    const spo2Data = {!! json_encode($sensordata->pluck('Spo2')->map(fn($v) => floatval($v))) !!};
    const heartRateData = {!! json_encode($sensordata->pluck('Heart_rate')->map(fn($v) => floatval($v))) !!};
    const temperatureData = {!! json_encode($sensordata->pluck('body_temperature')->map(fn($v) => floatval($v))) !!};
    const timeLabels = {!! json_encode($sensordata->pluck('created_at')->map(fn($t) => \Carbon\Carbon::parse($t)->format('H:i'))) !!};

    const commonOptions = {
        type: 'line',
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { 
                    mode: 'index', 
                    intersect: false,
                    backgroundColor: 'rgba(0,0,0,0.8)',
                    titleFont: { size: 12 },
                    bodyFont: { size: 11 }
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            scales: {
                x: {
                    display: true,
                    ticks: { 
                        maxTicksLimit: 6,
                        font: { size: 10 }
                    },
                    grid: { display: false }
                },
                y: {
                    display: true,
                    beginAtZero: false,
                    reverse: false,
                    ticks: { font: { size: 10 } },
                    grid: { color: 'rgba(0,0,0,0.1)' }
                }
            }
        }
    };

    new Chart(document.getElementById('spo2Chart'), {
        ...commonOptions,
        data: {
            labels: timeLabels,
            datasets: [{
                data: spo2Data,
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#007bff',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 3,
                pointHoverRadius: 5,
            }]
        }
    });

    new Chart(document.getElementById('heartRateChart'), {
        ...commonOptions,
        data: {
            labels: timeLabels,
            datasets: [{
                data: heartRateData,
                borderColor: '#28a745',
                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#28a745',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 3,
                pointHoverRadius: 5,
            }]
        }
    });

    new Chart(document.getElementById('temperatureChart'), {
        ...commonOptions,
        data: {
            labels: timeLabels,
            datasets: [{
                data: temperatureData,
                borderColor: '#dc3545',
                backgroundColor: 'rgba(220, 53, 69, 0.1)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#dc3545',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 3,
                pointHoverRadius: 5,
            }]
        }
    });
</script>


@endsection