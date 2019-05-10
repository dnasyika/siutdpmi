<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\pendonor;
use App\donor;


class pendonorController extends Controller
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
                $data = pendonor::all();
                return view('admin.pendonor', compact('data'));
            }
            elseif(Auth::user()->role == 2){
                return view('manajer.pendonor');
            }
            elseif(Auth::user()->role == 3){
                return view('inventory.pendonor');
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
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //aksi untuk update
    {
        $pendonor = new pendonor();
        $pendonor->noKTP = $request->get('ktp');
        $pendonor->namaPendonor = $request->get('namaPendonor');
        $pendonor->alamatPendonor = $request->get('alamatPendonor');
        $pendonor->jenisKelamin = $request->get('kelamin');
        $pendonor->tempatLahir = $request->get('tempatLahir');
        $pendonor->tglLahir = $request->get('tglLahir');
        $pendonor->status = $request->get('status');
        $pendonor->pekerjaanPendonor = $request->get('pekerjaan');
        $pendonor->golDarah = $request->get('goldar');
        $pendonor->rhesus = $request->get('rhesus');
        $pendonor->ibuKandung = $request->get('ibuKandung');
        $pendonor->noHP = $request->get('hp');

        $pendonor->save();
        return redirect('/pendonor')->with(['success' => 'Data Berhasil Ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!empty(Auth::user()->role)){
            if(Auth::user()->role == 1) {
                $data=pendonor::all()->where('noKTP','=',$id);
                $donor = donor::all()->where('noKTP','=',$id);
//        $ktp = pendonor::select('ktp')->get();
                return view('admin.detailPendonor',compact('data','donor', 'id'));
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
    public function update(Request $request)
    {
        $data['id'] = $_POST['id'];
        $data['noKTP'] = $_POST['noKTP'];
        $data['namaPendonor'] = $_POST['namaPendonor'];
        $data['alamatPendonor'] = $_POST['alamatPendonor'];
        $data['jenisKelamin'] = $_POST['jenisKelamin'];
        $data['tempatLahir'] = $_POST['tempatLahir'];
        $data['tglLahir'] = $_POST['tglLahir'];
        $data['status'] = $_POST['status'];
        $data['pekerjaanPendonor'] = $_POST['pekerjaanPendonor'];
        $data['golDarah'] = $_POST['golDarah'];
        $data['rhesus'] = $_POST['rhesus'];
        $data['ibuKandung'] = $_POST['ibuKandung'];
        $data['noHP'] = $_POST['noHP'];

        DB::table('tb_pendonor')
            ->where('noKTP', $data['id'])
            ->update(['noKTP' => $data['noKTP'],
                'namaPendonor' => $data['namaPendonor'],
                'alamatPendonor' => $data['alamatPendonor'],
                'jenisKelamin' => $data['jenisKelamin'],
                'tempatLahir' => $data['tempatLahir'],
                'tglLahir' => $data['tglLahir'],
                'status' => $data['status'],
                'pekerjaanPendonor' => $data['pekerjaanPendonor'],
                'golDarah' => $data['golDarah'],
                'rhesus' => $data['rhesus'],
                'ibuKandung' => $data['ibuKandung'],
                'noHP' => $data['noHP']
            ]);
        return redirect('/pendonor')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pendonor::where('noKTP', $id)->delete();
        return redirect('/pendonor')->with('success', 'Data Berhasil Dihapus');
    }
}
