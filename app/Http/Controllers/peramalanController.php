<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\peramalan;
use App\permintaan;

class peramalanController extends Controller
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
                $data = peramalan::all();
                return view('admin.peramalan', compact('data'));
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
        function tanggal($format,$nilai="now"){ //fungsi buat ambil bulan besok
            $en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat","Jan","Feb",
                "Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
            $id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
                "Jan","Feb","Maret","April","Mei","Juni","Juli","Agustus","September",
                "Oktober","November","Desember");
            return str_replace($en,$id,date($format,strtotime("+1 month", strtotime($nilai))));
        }

        $permintaan = DB::table('tb_permintaan')
            ->select(DB::raw('sum(jumlah_permintaan) as `permintaan`'),DB::raw('MONTH(tanggal_permintaan) month'))
            ->where('komponen', $request->get('komponen'))
            ->where('golongan_darah', $request->get('golDarah'))
            ->groupby('month')
            ->get();
        $n=intval($permintaan->count());
        $jumlah_x = 0;
        $jumlah_y = 0;
        $jumlah_xx = 0;
        $jumlah_xy = 0;
        $x1 = $n+1;

        if ($n > 0) { //Cek Data Permintaan Kosong Atau Tidak
            if ($n % 2 == 0){ //Cek Jika data genap
                $e = -$n; //untuk menentukan nilai X berawal dari angka berapa

                foreach($permintaan as $val) {
                    if ($e++ % 2 == 0) { //looping nilai X
                        $x = $e++;
                    }
                    $jumlah_x += $x;
                    $jumlah_y += $val->permintaan;
                    $jumlah_xx += ($x * $x);
                    $jumlah_xy += ($x * $val->permintaan);
                }
                $jum_x = $jumlah_x;
                $jum_y = $jumlah_y;
                $jum_xx =  $jumlah_xx;
                $jum_xy = $jumlah_xy;

                //Rumus Least Square
                $b = $jum_xy / $jum_xx;
                $a = $jum_y / $n;
                $Y = $a + ($b * $x1);

            }elseif ($n % 2 == 1){ //Jika data ganjil
                $e = -$n/2+0.5; //untuk menentukan nilai X berawal dari angka berapa

                foreach($permintaan as $val) {
                    $x = $e++; //looping nilai X
                    $jumlah_x += $x;
                    $jumlah_y += $val->permintaan;
                    $jumlah_xx += ($x * $x);
                    $jumlah_xy += ($x * $val->permintaan);
                }
                $jum_x = $jumlah_x;
                $jum_y = $jumlah_y;
                $jum_xx =  $jumlah_xx;
                $jum_xy = $jumlah_xy;

                //Rumus Least Square
                $b = $jum_xy / $jum_xx;
                $a = $jum_y / $n;
                $Y = $a + ($b * $x1);
            }

            //proses simpan database
            $peramalan = new peramalan();
            $peramalan->tgl_peramalan = date("Y-m-d");
            $peramalan->bulan_peramalan = tanggal("M");
            $peramalan->komponen = $request->get('komponen');
            $peramalan->golDarah = $request->get('golDarah');
            $peramalan->hasil = $Y;
            $peramalan->save();
            return redirect(url("peramalan"))->with(['success' => 'Peramalan Berhasil Dilakukan']);
        }else{
            return redirect(url("peramalan"))->with(['error' => 'Data Permintaan Kosong, Tidak Dapat Memproses Peramalan']);
        }
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
