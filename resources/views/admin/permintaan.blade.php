@extends('layouts.header')
@section('title')
    Permintaan - Admin
@endsection

@section('isiLuarAtas')
    Permintaan
@endsection

@section('konten')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Tabel Permintaan
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-responsive table-bordered table-striped table-hover js-basic-example dataTable" style="width:100%;">
                            <thead>
                            <tr>
                                <th>ID Permintaan</th>
                                <th>Tanggal Permintaan</th>
                                <th>Komponen</th>
                                <th>Golongan Darah</th>
                                <th>Rhesus</th>
                                <th>Jumlah Permintaan</th>
                                <th>Nama RS</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $a)
                                <tr>
                                    <td>{{ $a->id_permintaan }}</td>
                                    <td>{{ $a->tanggal_permintaan }}</td>
                                    <td>{{ $a->komponen }}</td>
                                    <td>{{ $a->golongan_darah }}</td>
                                    <td>{{ $a->rhesus }}</td>
                                    <td>{{ $a->jumlah_permintaan }}</td>
                                    <td>{{ $a->name }}</td>
                                    <td class="text-center">
                                        @if ($a->status == 0)
                                            <a href="{{route("validasiPermintaan", $a->id_permintaan)}}" class="validasi" data-confirm="Apakah anda yakin ingin memvalidasi ID Permintaan : {{ $a->id_permintaan }}, Jumlah Permintaan : {{ $a->jumlah_permintaan }} ?"><i class="material-icons" style="color : #0e90d2">help</i></a>
                                        @else
                                            <a href="{{route("batalkanPermintaan", $a->id_permintaan)}}" class="validasi" data-confirm="Apakah anda yakin ingin membatalkan validasi ID Permintaan : {{ $a->id_permintaan }}, Jumlah Permintaan : {{ $a->jumlah_permintaan }} ?"><i class="material-icons" style="color : green">check_circle</i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('isiLuar')

@endsection