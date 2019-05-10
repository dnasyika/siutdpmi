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
                                            <i class="material-icons" style="color: #0e90d2">help</i>
                                        @else
                                            <i class="material-icons" style="color : green">check_circle</i>
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
    <button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#largeModal">
        Data Baru
    </button>
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Tambah Permintaan</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>route('permintaan.store')]) !!}
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="komponen" class="form-control">
                                        <option value="">-- Komponen --</option>
                                        <option value="WB">WB</option>
                                        <option value="PRC">PRC</option>
                                        <option value="TC">TC</option>
                                        <option value="LP">LP</option>
                                        <option value="FFP">FFP</option>
                                        <option value="FP">FP</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="goldar" class="form-control">
                                        <option value="">-- goldar --</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="rhesus" class="form-control">
                                        <option value="">-- rhesus --</option>
                                        <option value="+">+</option>
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection