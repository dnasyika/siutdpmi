<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\stok;
use App\pendonor;
use App\permintaan;
use App\User;

class landingController extends Controller
{
    public function index(Request $request)
    {
        $totalpermintaan = permintaan::count();
        $stok = stok::count();
        $pendonor = pendonor::count();
        $manajer = User::where('role', '=', 2)->count();
        return view('landing', compact('totalpermintaan', 'stok', 'pendonor', 'manajer', 'permintaan', 'permintaanterpenuhi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
