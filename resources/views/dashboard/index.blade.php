@extends('dashboard.layouts.master')

@section('title', 'CMS - Home Page')

{{-- import file css (private) --}}
@push('css')

@endpush

@section('content')
        <div class="card-body">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">TỔNG THU 7 NGÀY QUA</h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>

            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">TỔNG CHI 7 NGÀY QUA</h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart2" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div> 
@endsection




@section('javascript')
<script>
    // Doanh thu
    let Revenue = '<?php echo $listRevenue; ?>';
    let json = JSON.parse(Revenue);
    let data = [];
    for (var i in json) data.push(json[i]);

    var areaChartData = {
        labels: <?php echo $listDay; ?>,
        datasets: [{
            label: 'Doanh thu (VND)',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: data
        }, ]
    };

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    barChartData.datasets[0] = temp0

    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    callback: function(value, index, values) {
                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }
                }
            }]
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    return data.datasets[0].label + ': ' + tooltipItem.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            }
        }

    };

    var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions,
    });
    // Khach hang
    let Expenditure = '<?php echo $listExpenditure; ?>';
        let json2 = JSON.parse(Expenditure);
        let data2 = [];
        for (var i2 in json2) data2.push(json2[i2]);

        var areaChartData2 = {
            labels: <?php echo $listDay; ?>,
            datasets: [
                {
                    label               : 'Chi tiêu (VNĐ)',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : data2
                },
            ]
        };

        var barChartCanvas2 = $('#barChart2').get(0).getContext('2d');
        var barChartData2 = jQuery.extend(true, {}, areaChartData2);
        var temp02 = areaChartData2.datasets[0];
        barChartData2.datasets[0] = temp02;

        var barChartOptions2 = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false,
            scales                  : {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            },
        };

        var barChart2 = new Chart(barChartCanvas2, {
            type: 'bar',
            data: barChartData2,
            options: barChartOptions2
        })
</script>
@endsection