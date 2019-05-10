@extends('layouts.header')
@section('title')
    Detail Stok Darah - Inventory
@endsection

@section('isiLuarAtas')
    Detail Stok Darah
@endsection

@section('konten')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Tabel Detail Stok Darah
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-responsive table-bordered table-striped table-hover js-basic-example dataTable" style="width:100%;">
                            <thead>
                            <tr>
                                <th>No. Kantong</th>
                                <th>Komponen</th>
                                <th>Golongan Darah</th>
                                <th>Tanggal Donor</th>
                                <th>Tanggal Kadaluarsa</th>
                                <th>Nama Pendonor</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $a)
                                <tr>
                                    <td>{{ $a->noKantong }}</td>
                                    <td>{{ $a->komponen }}</td>
                                    <td>{{ $a->golDarah }}</td>
                                    <td>{{ $a->tglDonor }}</td>
                                    <td>{{ $a->tglKadaluarsa }}</td>
                                    <td>{{ $a->namaPendonor }}</td>
                                    <td>{{ $a->jenis }}</td>
                                    <td class="text-center">
                                        <a href="javascript:;" class="editstok" data-idkantong="{{ $a->noKantong }}" data-iddonor="{{ $a->idDonor }}" data-komponen="{{ $a->komponen }}" data-tglkadaluarsa="{{ $a->tglKadaluarsa }}" data-jenis="{{ $a->jenis }}"><i class="material-icons">edit</i></a>
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
    <a class="btn bg-orange waves-effect" href="{{ url('/stok') }}">
        Kembali
    </a>
@endsection

@section('isiLuar')
    <div class="modal fade" id="editstok" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Edit Stok</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>route('updateStok')]) !!}
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nomor Kantong</label>
                                    <input id="id_kantong" name="noKantong" type="text" class="form-control" placeholder="ID Kantong" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>ID Donor</label>
                                    <select name="idDonor" id="iddonor" type="text" class="form-control" data-live-search="true">
                                        <option value="">-- ID Donor --</option>
                                        @foreach ($donor as $d)
                                            <option value="{{ $d->idDonor}}">{{$d->idDonor}}. {{$d->noKTP}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Komponen</label>
                                    <select id="komponen" name="komponen" class="form-control">
                                        <option value="">-- Komponen --</option>
                                        <option value="WB">WB</option>
                                        <option value="PRC">PRC</option>
                                        <option value="TC">TC</option>
                                        <option value="LP">LP</option>
                                        <option value="FFP">FFP</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tanggal Kadaluarsa</label>
                                    <input id="tgl_kadaluarsa" name="tglKadaluarsa" type="text" class="form-control datepicker" placeholder="Tanggal Kadaluarsa">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Jenis</label>
                                    <select id="jenis" name="jenis" class="form-control">
                                        <option>-- Jenis --</option>
                                        <option value="single">single</option>
                                        <option value="double">double</option>
                                        <option value="triple">triple</option>
                                    </select>
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