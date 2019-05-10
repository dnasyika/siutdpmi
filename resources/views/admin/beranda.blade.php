@extends('layouts.header')
@section('title')
    Beranda - Admin
@endsection

@section('isiLuarAtas')
    Beranda
@endsection

@section('konten')
    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="content">
                    <div class="text text-uppercase">Total Permintaan</div>
                    <div class="number count-to">{{$totalpermintaan}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">people</i>
                </div>
                <div class="content">
                    <div class="text text-uppercase">Pendonor</div>
                    <div class="number count-to">{{$pendonor}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">opacity</i>
                </div>
                <div class="content">
                    <div class="text text-uppercase">Stok Darah</div>
                    <div class="number count-to">{{$stok}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">local_hospital</i>
                </div>
                <div class="content">
                    <div class="text text-uppercase">Manajer Rumah Sakit</div>
                    <div class="number count-to">{{$manajer}}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->

    <!-- Grafik Permintaan -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Grafik Permintaan Tahun {{date('Y')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <canvas id="myChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Grafik Permintaan -->
@endsection

@section('isiLuar')
    <!-- ChartJs -->
    <script src="{{asset('plugins/chartjs/Chart.bundle.js')}}"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: [{
                    label: 'Permintaan',
                    data: [{{$permintaan[1]}}, {{$permintaan[2]}}, {{$permintaan[3]}}, {{$permintaan[4]}}, {{$permintaan[5]}}, {{$permintaan[6]}}, {{$permintaan[7]}}, {{$permintaan[8]}}, {{$permintaan[9]}}, {{$permintaan[10]}}, {{$permintaan[11]}}, {{$permintaan[12]}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                },
                    {
                        label: 'Permintaan Terpenuhi',
                        data: [{{$permintaanterpenuhi[1]}}, {{$permintaanterpenuhi[2]}}, {{$permintaanterpenuhi[3]}}, {{$permintaanterpenuhi[4]}}, {{$permintaanterpenuhi[5]}}, {{$permintaanterpenuhi[6]}}, {{$permintaanterpenuhi[7]}}, {{$permintaanterpenuhi[8]}}, {{$permintaanterpenuhi[9]}}, {{$permintaanterpenuhi[10]}}, {{$permintaanterpenuhi[11]}}, {{$permintaanterpenuhi[12]}}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endsection