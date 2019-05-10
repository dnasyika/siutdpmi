<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\pendonor;
use App\donor;

class donorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $donor = new donor();
//        $id = $request->get('id');
        $donor->tglDonor = $request->get('tglDonor');
        $donor->noKTP = $request->get('noKTP');
        $donor->donorKe = $request->get('donorKe');
        $donor->donorTerakhir = $request->get('donorTerakhir');
        $donor->tempatDonor= $request->get('tempatDonor');
        $donor->instansiPenyelenggara= $request->get('instansi');
        $donor->donorAphereris= $request->get('donorAphereris');
        $donor->HB= $request->get('HB');
        $donor->HCT= $request->get('HCT');
        $donor->beratBadan= $request->get('beratBadan');
        $donor->tensiDarah= $request->get('tensiDarah');
        $donor->suhuBadan= $request->get('suhuBadan');
        $donor->nadi= $request->get('nadi');
        $donor->namaPetugas= $request->get('namaPetugas');
        $donor->save();
        return redirect(route("pendonor.show", $donor->noKTP))->with(['success' => 'Data Berhasil Ditambah']);
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
    public function update(Request $request)
    {
        $data['idDonor'] = $_POST['idDonor'];;
        $data['tglDonor'] = $_POST['tglDonor'];
        $data['noKTP'] = $_POST['noKTP'];
        $data['donorKe'] = $_POST['donorKe'];
        $data['donorTerakhir'] = $_POST['donorTerakhir'];
        $data['tempatDonor'] = $_POST['tempatDonor'];
        $data['instansiPenyelenggara'] = $_POST['instansiPenyelenggara'];
        $data['donorAphereris'] = $_POST['donorAphereris'];
        $data['HB'] = $_POST['HB'];
        $data['HCT'] = $_POST['HCT'];
        $data['beratBadan'] = $_POST['beratBadan'];
        $data['tensiDarah'] = $_POST['tensiDarah'];
        $data['suhuBadan'] = $_POST['suhuBadan'];
        $data['nadi'] = $_POST['nadi'];
        $data['namaPetugas'] = $_POST['namaPetugas'];

        DB::table('tb_donor')
            ->where('idDonor', $data['idDonor'])
            ->update(['tglDonor' => $data['tglDonor'],
                // 'noKTP' => $data['noKTP'],
                'donorKe' => $data['donorKe'],
                'donorTerakhir' => $data['donorTerakhir'],
                'tempatDonor' => $data['tempatDonor'],
                'instansiPenyelenggara' => $data['instansiPenyelenggara'],
                'donorAphereris' => $data['donorAphereris'],
                'HB' => $data['HB'],
                'HCT' => $data['HCT'],
                'beratBadan' => $data['beratBadan'],
                'tensiDarah' => $data['tensiDarah'],
                'suhuBadan' => $data['suhuBadan'],
                'nadi' => $data['nadi'],
                'namaPetugas' => $data['namaPetugas']
            ]);
        return redirect(route("pendonor.show", $data['noKTP']))->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $ktp)
    {
        donor::where('idDonor', $id)->delete();
        return redirect('pendonor.show',$ktp)->with('message', 'Data Berhasil Dihapus');
    }
}
