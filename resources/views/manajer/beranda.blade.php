@extends('layouts.header')
@section('title')
    Beranda - Manajer
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
                    <i class="material-icons">assignment_turned_in</i>
                </div>
                <div class="content">
                    <div class="text text-uppercase">Tervalidasi</div>
                    <div class="number count-to">{{$permintaantervalidasi}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">assignment_late</i>
                </div>
                <div class="content">
                    <div class="text text-uppercase">Belum Tervalidasi</div>
                    <div class="number count-to">{{$permintaanbelum}}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">opacity</i>
                </div>
                <div class="content">
                    <div class="text text-uppercase">Stok Darah Total</div>
                    <div class="number count-to">{{$stok}}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body text-center">
                    <img src="{{ asset('images/logo_pmi.png') }}" style="height: 250px;">
                    <h1>Selamat Datang {{ Auth::user()->name }}</h1>
                    <p class="m-b-30">
                        Selamat datang di Sistem Informasi UTD PMI Kab. Jombang. Silahkan pilih menu yang tersedia untuk mulai mengoperasikan sistem informasi ini.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('isiLuar')

@endsection