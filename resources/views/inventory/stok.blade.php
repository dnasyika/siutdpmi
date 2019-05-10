@extends('layouts.header')
@section('title')
    Stok Darah - Inventory
@endsection

@section('isiLuarAtas')
    Stok Darah
@endsection

@section('konten')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Tabel Stok Darah
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-responsive table-bordered table-striped table-hover js-basic-example dataTable" style="width:100%;">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Komponen</th>
                                <th>Golongan Darah</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1 ?>
                            @foreach($data as $a)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $a->komponen }}</td>
                                    <td>{{ $a->golDarah }}</td>
                                    <td>
                                        <?php $d = DB::table('tb_donor')->join('tb_kantong', 'tb_kantong.idDonor', '=', 'tb_donor.idDonor')->join('tb_pendonor', 'tb_donor.noKTP', '=', 'tb_pendonor.noKTP')->where([['komponen', '=', $a->komponen], ['golDarah', '=', $a->golDarah],])->get() ?>
                                        {{ $stok = count($d) }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route("stok.show", $a->komponen) }}" class=""><i class="material-icons">search</i></a>
                                    </td>
                                </tr>
                                <?php $no++;?>
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
        Tambah Stok
    </button>
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Tambah Stok</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>route('stok.store')]) !!}
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>ID Donor</label>
                                    <select name="idDonor" id="idDonor" type="text" class="form-control" placeholder="ID Donor">
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
                                    <select name="komponen" class="form-control">
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
                                    <input name="tglKadaluarsa" type="text" class="form-control datepicker"
                                           placeholder="Tanggal Kadaluarsa">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Jenis</label>
                                    <select name="jenis" class="form-control">
                                        <option value="">-- Jenis --</option>
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