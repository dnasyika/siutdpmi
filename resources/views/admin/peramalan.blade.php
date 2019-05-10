@extends('layouts.header')
@section('title')
    Peramalan Permintaan - Admin
@endsection

@section('isiLuarAtas')
    Peramalan Permintaan
@endsection

@section('konten')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Tabel Peramalan
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-responsive table-bordered table-striped table-hover js-basic-example dataTable" style="width:100%;">
                            <thead>
                            <tr>
                                <th>ID Peramalan</th>
                                <th>Tanggal Peramalan</th>
                                <th>Bulan Peramalan</th>
                                <th>Produk Darah</th>
                                <th>Golongan Darah</th>
                                <th>Hasil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $a)
                                <tr>
                                    <td>{{ $a->id_peramalan }}</td>
                                    <td>{{ $a->tgl_peramalan }}</td>
                                    <td>{{ $a->bulan_peramalan }}</td>
                                    <td>{{ $a->komponen }}</td>
                                    <td>{{ $a->golDarah }}</td>
                                    <td>{{ $a->hasil }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="row clearfix">--}}
        {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
            {{--<div class="card">--}}
                {{--<div class="header">--}}
                    {{--<h2>--}}
                        {{--Coba Peramalan--}}
                    {{--</h2>--}}
                {{--</div>--}}
                {{--<div class="body">--}}
                    {{--<div class="table-responsive">--}}
                        {{--<?php--}}
                        {{--$permintaan = DB::table('tb_permintaan')--}}
                            {{--->select(DB::raw('sum(jumlah_permintaan) as `permintaan`'),DB::raw('MONTH(tanggal_permintaan) month'))--}}
                            {{--->where('komponen', 'WB')--}}
                            {{--->where('golongan_darah', 'O')--}}
                            {{--->groupby('month')--}}
                            {{--->get();--}}
                        {{--$n=intval($permintaan->count());--}}
                        {{--$jumlah_x = 0;--}}
                        {{--$jumlah_y = 0;--}}
                        {{--$jumlah_xx = 0;--}}
                        {{--$jumlah_xy = 0;--}}
                        {{--$x1 = $n+1;--}}
                        {{--?>--}}
                        {{--<table class="table table-responsive table-bordered table-striped table-hover js-basic-example dataTable" style="width:100%;">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>Bulan</th>--}}
                                {{--<th>Permintaan (WB A)</th>--}}
                                {{--<th>X</th>--}}
                                {{--<th>XY</th>--}}
                                {{--<th>XX</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach($permintaan as $a)--}}
                                {{--<tr>--}}
                                    {{--<td>{{ $a->month }}</td>--}}
                                    {{--<td>{{ $a->permintaan }}</td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                    {{--<td></td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

@section('isiLuar')
    <button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#largeModal">
        Peramalan Baru
    </button>
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Tambah Peramalan</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>route('peramalan.store')]) !!}

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="komponen" class="form-control">
                                        <option value="">-- Produk Darah --</option>
                                        <option value="WB">WB</option>
                                        <option value="PRC">PRC</option>
                                        <option value="TC">TC</option>
                                        <option value="LP">LP</option>
                                        <option value="FFP">FFP</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="golDarah" class="form-control">
                                        <option value="">-- Gol Darah --</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">RAMAL</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection