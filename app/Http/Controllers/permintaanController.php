<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\permintaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class permintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!empty(Auth::user()->role)){
            if(Auth::user()->role == 1) {
                $data = permintaan::join('users', 'tb_permintaan.id_user', '=', 'users.id')->get();
                return view('admin.permintaan', compact('data'));
            }
            elseif(Auth::user()->role == 2){
                $data = permintaan::join('users', 'tb_permintaan.id_user', '=', 'users.id')->where('id_user', '=', Auth::user()->id)->get();
                return view('manajer.permintaan', compact('data'));
            }
            elseif(Auth::user()->role == 3){
                return view('inventory.permintaan');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function validasi($id)
    {
        //validasi permintaan
        DB::table('tb_permintaan')
            ->where('id_permintaan', $id)
            ->update(['status' => '1']);

        return redirect('/permintaan')->with('success', 'Status Permintaan Berhasil Diubah');
    }

    public function batalvalidasi($id)
    {
        //validasi permintaan
        DB::table('tb_permintaan')
            ->where('id_permintaan', $id)
            ->update(['status' => '0']);

        return redirect('/permintaan')->with('success', 'Status Permintaan Berhasil Diubah');
    }

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
        $permintaan = new permintaan();

        $permintaan->id_user = Auth::user()->id;
        $permintaan->tanggal_permintaan = date('y/m/d');
        $permintaan->komponen = $request->get('komponen');
        $permintaan->golongan_darah = $request->get('goldar');
        $permintaan->rhesus = $request->get('rhesus');
        $permintaan->jumlah_permintaan = $request->get('jumlah');
        $permintaan->status = '0';

        $permintaan->save();
        return redirect('/permintaan')->with(['success' => 'Data Berhasil Ditambah']);
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
