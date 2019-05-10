<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\stok;
use App\donor;

class stokController extends Controller
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
                $data = DB::table('tb_donor')
                    ->join('tb_kantong', 'tb_kantong.idDonor', '=', 'tb_donor.idDonor')
                    ->join('tb_pendonor', 'tb_donor.noKTP', '=', 'tb_pendonor.noKTP')
                    ->select('komponen', 'golDarah')
                    ->groupBy('komponen', 'golDarah')
                    ->get();
                return view('admin.stok', compact('data'));
            }
            elseif(Auth::user()->role == 2){
                $data = DB::table('tb_donor')
                    ->join('tb_kantong', 'tb_kantong.idDonor', '=', 'tb_donor.idDonor')
                    ->join('tb_pendonor', 'tb_donor.noKTP', '=', 'tb_pendonor.noKTP')
                    ->select('komponen', 'golDarah')
                    ->groupBy('komponen', 'golDarah')
                    ->get();
                return view('manajer.stok', compact('data'));
            }
            elseif(Auth::user()->role == 3){
                $data = DB::table('tb_donor')
                    ->join('tb_kantong', 'tb_kantong.idDonor', '=', 'tb_donor.idDonor')
                    ->join('tb_pendonor', 'tb_donor.noKTP', '=', 'tb_pendonor.noKTP')
                    ->select('komponen', 'golDarah')
                    ->groupBy('komponen', 'golDarah')
                    ->get();
                $donor = donor::select('idDonor', 'noKTP')->orderBy('idDonor', 'desc')->get();
                return view('inventory.stok', compact('data','donor'));
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
        $stok = new stok();
        $stok->idDonor = $request->get('idDonor');
        $stok->komponen = $request->get('komponen');
        $stok->tglKadaluarsa = $request->get('tglKadaluarsa');
        $stok->jenis = $request->get('jenis');

        $stok->save();
        return redirect('/stok')->with(['success' => 'Data Berhasil Ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = donor::join('tb_kantong', 'tb_kantong.idDonor', '=', 'tb_donor.idDonor')
            ->join('tb_pendonor', 'tb_donor.noKTP', '=', 'tb_pendonor.noKTP')
            ->where('komponen', '=', $id)
            ->get();
        $donor = donor::select('idDonor', 'noKTP')->orderBy('idDonor', 'desc')->get();
        return view('inventory.detailStok', compact('data', 'donor'));
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
        $data['noKantong'] = $_POST['noKantong'];
        $data['idDonor'] = $_POST['idDonor'];
        $data['komponen'] = $_POST['komponen'];
        $data['tglKadaluarsa'] = $_POST['tglKadaluarsa'];
        $data['jenis'] = $_POST['jenis'];

        DB::table('tb_kantong')
            ->where('noKantong', $data['noKantong'])
            ->update([
                'idDonor' => $data['idDonor'],
                'komponen' => $data['komponen'],
                'tglKadaluarsa' => $data['tglKadaluarsa'],
                'jenis' => $data['jenis'],
            ]);

        return redirect(route("stok.show", $data['komponen']))->with(['success' => 'Data Berhasil Diubah']);
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
