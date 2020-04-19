<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        // DATA FOR GRAFIK
        $bulanSekarang = date('n');
        $tahunSekarang = date('Y');

        $januari = DB::table('fish_catches')
                    ->whereMonth('CREATED_AT', '1')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->sum('total_catch');

        if (empty($januari)) {
            $januari = 0;
        }

        $februari = DB::table('fish_catches')
                    ->whereMonth('CREATED_AT', '2')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->sum('total_catch');

        if (empty($februari)) {
            $februari = 0;
        }

        $maret = DB::table('fish_catches')
                    ->whereMonth('CREATED_AT', '3')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->sum('total_catch');

        if (empty($maret)) {
            $maret = 0;
        }

        $april = DB::table('fish_catches')
                    ->whereMonth('CREATED_AT', '4')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->sum('total_catch');

        if (empty($april)) {
            $april = 0;
        }

        $mei = DB::table('fish_catches')
                    ->whereMonth('CREATED_AT', '5')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->sum('total_catch');

        if (empty($mei)) {
            $mei = 0;
        }

        $juni = DB::table('fish_catches')
                    ->whereMonth('CREATED_AT', '6')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->sum('total_catch');

        if (empty($juni)) {
            $juni = 0;
        }

        $juli = DB::table('fish_catches')
                    ->whereMonth('CREATED_AT', '7')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->sum('total_catch');

        if (empty($juli)) {
            $juli = 0;
        }

        $agustus = DB::table('fish_catches')
                    ->whereMonth('CREATED_AT', '8')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->sum('total_catch');

        if (empty($agustus)) {
            $agustus = 0;
        }

        $september = DB::table('fish_catches')
                    ->whereMonth('CREATED_AT', '9')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->sum('total_catch');

        if (empty($september)) {
            $september = 0;
        }

        $oktober = DB::table('fish_catches')
                    ->whereMonth('CREATED_AT', '10')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->sum('total_catch');

        if (empty($oktober)) {
            $oktober = 0;
        }

        $november = DB::table('fish_catches')
                    ->whereMonth('CREATED_AT', '11')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->sum('total_catch');

        if (empty($november)) {
            $november = 0;
        }

        $desember = DB::table('fish_catches')
                    ->whereMonth('CREATED_AT', '12')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->sum('total_catch');

        if (empty($desember)) {
            $desember = 0;
        }

        return view('admin.home', compact('januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'));
    }

}
