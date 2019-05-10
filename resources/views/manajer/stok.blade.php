@extends('layouts.header')
@section('title')
    Stok Darah - Manajer
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

@endsection