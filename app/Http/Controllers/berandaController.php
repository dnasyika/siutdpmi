<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\donor;
use App\permintaan;
use App\stok;
use App\pendonor;

class berandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!empty(Auth::user()->role)) {
            if (Auth::user()->role == 1) {
                $totalpermintaan = permintaan::sum('jumlah_permintaan');
                $stok = stok::count();
                $pendonor = pendonor::count();
                $manajer = User::where('role', '=', 2)->count();
                for ($i = 1; $i <= 12; $i++) { //ambil data buat grafik
                    $permintaan[$i] = permintaan::whereMonth('tanggal_permintaan', '=', $i)->whereYear('tanggal_permintaan', '=', date('Y'))->sum('jumlah_permintaan');
                }
                for ($i = 1; $i <= 12; $i++) {
                    $permintaanterpenuhi[$i] = permintaan::whereMonth('tanggal_permintaan', '=', $i)->whereYear('tanggal_permintaan', '=', date('Y'))->where('status', '=', 1)->sum('jumlah_permintaan');
                }
                return view('admin.beranda', compact('totalpermintaan', 'stok', 'pendonor', 'manajer', 'permintaan', 'permintaanterpenuhi'));
            } elseif (Auth::user()->role == 2) {
                $totalpermintaan = permintaan::where('id_user', '=', Auth::user()->role)->sum('jumlah_permintaan');
                $permintaantervalidasi = permintaan::where('id_user', '=', Auth::user()->role)->where('status', '=', 1)->sum('jumlah_permintaan');
                $permintaanbelum = permintaan::where('id_user', '=', Auth::user()->role)->where('status', '=', 0)->sum('jumlah_permintaan');
                $stok = stok::count();
                return view('manajer.beranda', compact('totalpermintaan', 'permintaantervalidasi', 'permintaanbelum', 'stok'));
            } elseif (Auth::user()->role == 3) {
                $stoka = donor::join('tb_kantong', 'tb_kantong.idDonor', '=', 'tb_donor.idDonor')->join('tb_pendonor', 'tb_donor.noKTP', '=', 'tb_pendonor.noKTP')->where('golDarah','=', 'A')->count();
                $stokb = donor::join('tb_kantong', 'tb_kantong.idDonor', '=', 'tb_donor.idDonor')->join('tb_pendonor', 'tb_donor.noKTP', '=', 'tb_pendonor.noKTP')->where('golDarah','=', 'B')->count();
                $stokab = donor::join('tb_kantong', 'tb_kantong.idDonor', '=', 'tb_donor.idDonor')->join('tb_pendonor', 'tb_donor.noKTP', '=', 'tb_pendonor.noKTP')->where('golDarah','=', 'AB')->count();
                $stoko = donor::join('tb_kantong', 'tb_kantong.idDonor', '=', 'tb_donor.idDonor')->join('tb_pendonor', 'tb_donor.noKTP', '=', 'tb_pendonor.noKTP')->where('golDarah','=', 'O')->count();
                return view('inventory.beranda', compact('stoka', 'stokb', 'stokab', 'stoko'));
            } else {
                return redirect('/');
            }
        }
        else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
