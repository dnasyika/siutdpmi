@extends('layouts.header')
@section('title')
    Pendonor - Admin
@endsection

@section('isiLuarAtas')
    Pendonor
@endsection

@section('konten')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Tabel Pendonor
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-responsive table-bordered table-striped table-hover js-basic-example dataTable" style="width:100%;">
                            <thead>
                            <tr>
                                <th>Nomor KTP</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Nomor HP</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $a)
                                <tr>
                                    <td>{{ $a->noKTP }}</td>
                                    <td>{{ $a->namaPendonor }}</td>
                                    <td>{{ $a->alamatPendonor }}</td>
                                    <td>{{ $a->jenisKelamin }}</td>
                                    <td>{{ $a->noHP }}</td>
                                    <td class="text-center">
                                        <a href="{{ route("pendonor.show", $a->noKTP) }}" class=""><i class="material-icons">search</i></a>
                                        <a href="javascript:;" class="editpendonor" data-toggle="modal"  data-id="{{ $a->noKTP }}" data-noktp="{{ $a->noKTP }}" data-namapendonor="{{ $a->namaPendonor }}" data-alamatpendonor="{{ $a->alamatPendonor }}" data-jeniskelamin="{{ $a->jenisKelamin }}" data-tempatlahir="{{ $a->tempatLahir }}" data-tgllahir="{{ $a->tglLahir }}" data-status="{{ $a->status }}" data-pekerjaanpendonor="{{ $a->pekerjaanPendonor }}" data-goldarah="{{ $a->golDarah }}" data-rhesus="{{ $a->rhesus }}" data-ibukandung="{{ $a->ibuKandung }}" data-nohp="{{ $a->noHP }}"><i class="material-icons">edit</i></a>
                                        <a href="{{ route("hapusPendonor", $a->noKTP) }}" class="hapus" data-confirm="Apakah anda yakin menghapus data pendonor ini?"><i class="material-icons">delete</i></a>
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
    <button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#largeModal" >
        Data Baru
    </button>

    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Tambah Data Pendonor</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>route('pendonor.store'), 'method'=>'POST']) !!}
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nomor KTP</label>
                                    <input name="ktp" type="text" class="form-control" placeholder="No KTP">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nama</label>
                                    <input name="namaPendonor" type="text" class="form-control" placeholder="Nama Pendonor">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Alamat</label>
                                    <input name="alamatPendonor" type="text" class="form-control" placeholder="Alamat">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Jenis Kelamin</label>
                                    <div class="demo-radio-button">
                                        <input name="kelamin" value="Laki-laki" type="radio" id="radio1"/>
                                        <label for="radio1">Laki-laki</label>
                                        <input name="kelamin" value="Perempuan" type="radio" id="radio2"/>
                                        <label for="radio2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tempat Lahir</label>
                                    <input name="tempatLahir" type="text" class="form-control" placeholder="Tempat Lahir">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tanggal Lahir</label>
                                    <input name="tglLahir" type="text" class="form-control datepicker" placeholder="Tanggal Lahir">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">-- status --</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Pernah Nikah">Pernah Nikah</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Pekerjaan</label>
                                    <input name="pekerjaan" type="text" class="form-control" placeholder="Pekerjaan Pendonor">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Golongan Darah</label>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Rhesus</label>
                                    <select name="rhesus" class="form-control">
                                        <option value="">-- rhesus --</option>
                                        <option value="+">+</option>
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Ibu Kandung</label>
                                    <input name="ibuKandung" type="text" class="form-control" placeholder="Ibu Kandung">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nomor HP</label>
                                    <input name="hp" type="text" class="form-control" placeholder="No HP">
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

    <div class="modal fade" id="editpendonor" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Edit Pendonor</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>route('updatePendonor')]) !!}
                    <input type="hidden" name="id" id="id">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nomor KTP</label>
                                    <input name="noKTP" type="text" class="form-control" placeholder="No KTP" id="no_ktp">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nama</label>
                                    <input name="namaPendonor" type="text" class="form-control" placeholder="Nama Pendonor" id="nama_pendonor">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Alamat</label>
                                    <input name="alamatPendonor" type="text" class="form-control" placeholder="Alamat" id="alamat_pendonor">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Jenis Kelamin</label>
                                    {{--<select name="jenisKelamin" class="form-control" id="jenis_kelamin">--}}
                                        {{--<option value="">-- Jenis Kelamin --</option>--}}
                                        {{--<option value="Laki-laki">Laki-laki</option>--}}
                                        {{--<option value="Perempuan">Perempuan</option>--}}
                                    {{--</select>--}}
                                    {{--<input id="jenis_kelamin" readonly>--}}
                                    <div class="demo-radio-button">
                                        <input name="jenisKelamin" value="Laki-laki" type="radio" id="radio_1" required>
                                        <label for="radio_1">Laki-laki</label>
                                        <input name="jenisKelamin" value="Perempuan" type="radio" id="radio_2" required>
                                        <label for="radio_2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tempat Lahir</label>
                                    <input name="tempatLahir" type="text" class="form-control" placeholder="Tempat Lahir" id="tempat_lahir">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tanggal Lahir</label>
                                    <input name="tglLahir" type="text" class="form-control datepicker" placeholder="Tanggal Lahir" id="tanggal_lahir">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="status_pendonor">
                                        <option value="">-- status --</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Pernah Nikah">Pernah Nikah</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Pekerjaan</label>
                                    <input name="pekerjaanPendonor" type="text" class="form-control" placeholder="Pekerjaan Pendonor" id="pekerjaan_pendonor">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Golongan Darah</label>
                                    <select name="golDarah" class="form-control" id="gol_dar">
                                        <option value="">-- goldar --</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Rhesus</label>
                                    <select name="rhesus" class="form-control" id="resus">
                                        <option value="">-- rhesus --</option>
                                        <option value="+">+</option>
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Ibu Kandung</label>
                                    <input name="ibuKandung" type="text" class="form-control" placeholder="Ibu Kandung" id="nama_ibu">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nomor HP</label>
                                    <input name="noHP" type="text" class="form-control" placeholder="No HP" id="no_hp">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="editForm" type="submit" class="btn btn-link waves-effect editForm">SIMPAN</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection