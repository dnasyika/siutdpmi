@extends('layouts.header')
@section('title')
    Detail Pendonor - Admin
@endsection

@section('isiLuarAtas')
    Detail Pendonor
@endsection

@section('konten')
    <div class="row clearfix">
        <div class=" col-md-5 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Detail Data Pendonor
                    </h2>
                </div>
                <div class="body table-responsive">
                    <table class="table">
                        @foreach($data as $value)
                            <tbody>
                            <tr>
                                <td>No KTP</td>
                                <td>: {{$value->noKTP}}</td>
                            </tr>
                            <tr>
                                <td>Nama Pendonor</td>
                                <td>: {{$value->namaPendonor}}</td>
                            </tr>
                            <tr>
                                <td>Alamat Pendonor</td>
                                <td>: {{$value->alamatPendonor}}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: {{$value->jenisKelamin}}</td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>: {{$value->tempatLahir}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: {{$value->tglLahir}}</td>
                            </tr>
                            <tr>
                                <td>Status Perkawinan</td>
                                <td>: {{$value->status}}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Pendonor</td>
                                <td>: {{$value->pekerjaanPendonor}}</td>
                            </tr>
                            <tr>
                                <td>Golongan Darah</td>
                                <td>: {{$value->golDarah}}</td>
                            </tr>
                            <tr>
                                <td>Rhesus</td>
                                <td>: {{$value->rhesus}}</td>
                            </tr>
                            <tr>
                                <td>Ibu Kandung</td>
                                <td>: {{$value->ibuKandung}}</td>
                            </tr>
                            <tr>
                                <td>NO HP</td>
                                <td>: {{$value->noHP}}</td>
                            </tr>

                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
            <div class="card">
                <div class="header">
                    <h2>
                        Detail Donor
                    </h2>
                </div>
                <div class="body table-responsive">
                    <div class="col s12 m8 19">
                        <table class="table table-responsive table-bordered table-striped table-hover js-basic-example dataTable" style="width:100%;">
                            <thead>
                            <tr>
                                <th>Tanggal Donor</th>
                                <th>Donor Ke</th>
                                <th>Donor Terakhir</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($donor as $a)
                                <tr>
                                    <td>{{ $a->tglDonor }}</td>
                                    <td>{{ $a->donorKe }}</td>
                                    <td>{{ $a->donorTerakhir }}</td>
                                    <td class="text-center">
                                        <a href="javascript:;" data-id="{{ $a->idDonor }}" data-tgldonor="{{ $a->tglDonor }}" data-noktp="{{ $a->noKTP }}" data-donorke="{{ $a->donorKe }}" data-donorterakhir="{{ $a->donorTerakhir }}" data-tempatdonor="{{ $a->tempatDonor }}" data-penyelenggara="{{ $a->instansiPenyelenggara }}" data-aphereris="{{ $a->donorAphereris }}" data-hb="{{ $a->HB }}" data-hct="{{ $a->HCT }}" data-beratbadan="{{ $a->beratBadan }}" data-tensi="{{ $a->tensiDarah }}" data-suhu="{{ $a->suhuBadan }}" data-nadi="{{ $a->nadi }}" data-petugas="{{ $a->namaPetugas }}" class="showdonor"><i class="material-icons">search</i></a>
                                        <a href="javascript:;" data-iddonor="{{ $a->idDonor }}" data-tgldonor="{{ $a->tglDonor }}" data-noktp="{{ $a->noKTP }}" data-donorke="{{ $a->donorKe }}" data-donorterakhir="{{ $a->donorTerakhir }}" data-tempatdonor="{{ $a->tempatDonor }}" data-penyelenggara="{{ $a->instansiPenyelenggara }}" data-aphereris="{{ $a->donorAphereris }}" data-hb="{{ $a->HB }}" data-hct="{{ $a->HCT }}" data-beratbadan="{{ $a->beratBadan }}" data-tensi="{{ $a->tensiDarah }}" data-suhu="{{ $a->suhuBadan }}" data-nadi="{{ $a->nadi }}" data-petugas="{{ $a->namaPetugas }}" class="editdonor"><i class="material-icons">edit</i></a>
                                        <a href="{{ route("hapusDonor", $a->idDonor, $a->noKTP) }}" class="hapus" data-confirm="Apakah anda yakin menghapus data pendonor ini?"><i class="material-icons">delete</i></a>';
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#largeModal">
                Data Baru
            </button>
            <a class="btn bg-orange waves-effect" href="{{ url('/pendonor') }}">
                Kembali
            </a>
        </div>
    </div>

@endsection

@section('isiLuar')
    <!-- Modal -->

    <!-- Modal Tambah -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Tambah Donor</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>route('donor.store')]) !!}
                    <div class="row clearfix">
                        <input name="noKTP" type="text" hidden value="{{$id}}"/>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tanggal Donor</label>
                                    <input name="tglDonor" type="text" class="form-control datepicker" placeholder="Tanggal Donor">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Donor Ke</label>
                                    <input name="donorKe" type="text" class="form-control" placeholder="Donor ke">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Donor Terakhir</label>
                                    <input name="donorTerakhir" type="text" class="form-control datepicker" placeholder="Donor Terakhir">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tempat Donor</label>
                                    <select name="tempatDonor" class="form-control">
                                        <option value="">-- Tempat Donor --</option>
                                        <option value="Donor Dalam Gedung">Donor Dalam Gedung</option>
                                        <option value="Mobile Unit">Mobile Unit</option>
                                        <option value="Mobile Unit Dalam Gedung">Mobile Unit Dalam Gedung</option>
                                        <option value="Bus Donor">Bus Donor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Instansi Penyelenggara</label>
                                    <input name="instansi" type="text" class="form-control" placeholder="Instansi Penyelenggara">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Donor Aphereris</label>
                                    <select name="donorAphereris" class="form-control">
                                        <option value="">-- Donor Aphereris--</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>HB</label>
                                    <input name="HB" type="text" class="form-control" placeholder="HB">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>HCT</label>
                                    <input name="HCT" type="text" class="form-control" placeholder="HCT">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Berat Badan</label>
                                    <input name="beratBadan" type="text" class="form-control" placeholder="Berat Badan">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tensi Darah</label>
                                    <input name="tensiDarah" type="text" class="form-control" placeholder="Tensi Darah">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Suhu Badan</label>
                                    <input name="suhuBadan" type="text" class="form-control" placeholder="Suhu Badan">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nadi</label>
                                    <input name="nadi" type="text" class="form-control" placeholder="Nadi">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nama Petugas</label>
                                    <input name="namaPetugas" type="text" class="form-control" placeholder="Nama Petugas">
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
    </div>


    <!-- Modal Detail -->
    <div class="modal fade" id="showdonor" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Detail Data Donor</h4>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>ID Donor</label>
                                    <input type="text" class="form-control" placeholder="ID Donor" id="id_donor" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Donor Ke-</label>
                                    <input type="text" class="form-control" placeholder="Donor Ke-" id="donor_ke" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tanggal Donor</label>
                                    <input type="text" class="form-control" placeholder="Tanggal Donor" id="tgl_donor" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tanggal Terakhir Donor</label>
                                    <input type="text" class="form-control" placeholder="Tanggal Terakhir Donor" id="donor_terakhir" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tempat Donor</label>
                                    <input type="text" class="form-control" placeholder="Tempat Donor" id="tempat_donor" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Instansi Penyelenggara</label>
                                    <input type="text" class="form-control" placeholder="Instansi Penyelenggara" id="instansi_penyelenggara">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Donor Aphereris</label>
                                    <input type="text" class="form-control" placeholder="Donor Aphereris" id="donor_aphereris" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>HB</label>
                                    <input type="text" class="form-control" placeholder="HB" id="hb_donor" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>HCT</label>
                                    <input type="text" class="form-control" placeholder="HB" id="hct_donor" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Berat Badan</label>
                                    <input type="text" class="form-control" placeholder="HB" id="berat_badan" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tensi Darah</label>
                                    <input type="text" class="form-control" placeholder="HB" id="tensi_darah" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Suhu Badan</label>
                                    <input type="text" class="form-control" placeholder="HB" id="suhu_badan" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nadi</label>
                                    <input type="text" class="form-control" placeholder="HB" id="nadi_donor" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nama Petugas</label>
                                    <input type="text" class="form-control" placeholder="HB" id="nama_petugas" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editdonor" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Detail Data Donor</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>route('updateDonor')]) !!}
                    <input type="hidden" name="noKTP" id="no-ktp">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>ID Donor</label>
                                    <input name="idDonor" type="text" class="form-control" placeholder="ID Donor" id="id-donor" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Donor Ke-</label>
                                    <input name="donorKe" type="text" class="form-control" placeholder="Donor Ke-" id="donor-ke">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tanggal Donor</label>
                                    <input name="tglDonor" type="text" class="form-control datepicker" placeholder="Tanggal Donor" id="tgl-donor">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tanggal Terakhir Donor</label>
                                    <input name="donorTerakhir" type="text" class="form-control datepicker" placeholder="Tanggal Terakhir Donor" id="donor-terakhir">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tempat Donor</label>
                                    <select name="tempatDonor" id="tempat-donor" class="form-control">
                                        <option value="">-- Tempat Donor --</option>
                                        <option value="Donor Dalam Gedung">Donor Dalam Gedung</option>
                                        <option value="Mobile Unit">Mobile Unit</option>
                                        <option value="Mobile Unit Dalam Gedung">Mobile Unit Dalam Gedung</option>
                                        <option value="Bus Donor">Bus Donor</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Instansi Penyelenggara</label>
                                    <input name="instansiPenyelenggara" type="text" class="form-control" placeholder="Instansi Penyelenggara" id="instansi-penyelenggara">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Donor Aphereris</label>
                                    <select name="donorAphereris" id="donor-aphereris" class="form-control">
                                        <option value="">-- Donor Aphereris--</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>HB</label>
                                    <input name="HB" type="text" class="form-control" placeholder="HB" id="hb-donor">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>HCT</label>
                                    <input name="HCT" type="text" class="form-control" placeholder="HB" id="hct-donor">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Berat Badan</label>
                                    <input name="beratBadan" type="text" class="form-control" placeholder="HB" id="berat-badan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tensi Darah</label>
                                    <input name="tensiDarah" type="text" class="form-control" placeholder="HB" id="tensi-darah">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Suhu Badan</label>
                                    <input name="suhuBadan" type="text" class="form-control" placeholder="HB" id="suhu-badan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nadi</label>
                                    <input name="nadi" type="text" class="form-control" placeholder="HB" id="nadi-donor">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nama Petugas</label>
                                    <input name="namaPetugas" type="text" class="form-control" placeholder="HB" id="nama-petugas">
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
    <!-- End Modal -->
@endsection