@extends('user.advent-app')

@section('title','Find Care')

@section('content')

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .test-info {
        background: #f8f9fa;
        padding: 1rem;
        width: 95%;
        margin: 0 auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        overflow-x: hidden;
    }

    .info-header {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 1.5rem;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #4a90e2;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .back-link:hover {
        color: #357abd;
    }

    .test-title {
        color: #2c3e50;
        font-size: 1.8rem;
        font-weight: 600;
        margin: 0 0 0.5rem 0;
    }

    .collection-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid #e9ecef;
    }

    .collection-date {
        color: #6c757d;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .print-btn {
        background: #28a745;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        text-decoration: none;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .print-btn:hover {
        background: #218838;
    }

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
        max-height: 300px;
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
        
        /* .charts-container {
            display: flex;
            align-items: center;
            overflow-x: auto;
        }
        
        .chart-wrapper {
            fle
        } */
    }
</style>

<section class="test-info">
    <div class="info-header">
        <a href="{{ route('user.tests') }}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Back to Test Results
        </a>
        <h1 class="test-title">Your Health Monitor Results</h1>
        <div class="collection-info">
            <div class="collection-date">
                <i class="fa-solid fa-calendar-alt"></i>
                Taken on November 24, 2024 at 12:54 PM
            </div>
            <a href="" class="print-btn">
                <i class="fa-solid fa-print"></i> Print
            </a>
        </div>
    </div>

    <div class="main-content">
        <h2 class="section-title">Your Vital Signs</h2>
        
        <div class="content-row">
            <!-- Charts Section -->
            <div class="chart-section">
                <div class="section-header">
                    <h4>
                        <i class="fa-solid fa-chart-line"></i> Trend Charts
                    </h4>
                </div>
                <div class="charts-container" style="display: flex; flex-wrap: wrap; gap: 1rem;">
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
</section>

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