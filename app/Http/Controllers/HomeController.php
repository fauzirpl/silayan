<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id = Auth::user()->id;
        $this_month = $date_now = date('m');
        $cek_form = DB::table('fish_catches')
            ->where('id_user', $id)
            ->whereMonth('created_at', $this_month)
            ->first();
        $fishes = \App\Fish::all();
        $prices =  DB::table('fish_prices')
            ->join('fish', 'fish_prices.id_fish', '=', 'fish.id')
            ->select('fish_prices.*', 'fish.name')
            ->latest()
            ->paginate(5);

        // DATA FOR GRAFIK
        $bulanSekarang = date('n');
        $tahunSekarang = date('Y');

        $januari = DB::table('fish_catches')
                    ->where('id_user', $id)
                    ->whereMonth('CREATED_AT', '1')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->select('total_catch')
                    ->first();

        if (empty($januari)) {
            $januari = 0;
        } else {
            $januari = $januari->total_catch;
        }

        $februari = DB::table('fish_catches')
                    ->where('id_user', $id)
                    ->whereMonth('CREATED_AT', '2')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->select('total_catch')
                    ->first();

        if (empty($februari)) {
            $februari = 0;
        } else {
            $februari = $februari->total_catch;
        }

        $maret = DB::table('fish_catches')
                    ->where('id_user', $id)
                    ->whereMonth('CREATED_AT', '3')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->select('total_catch')
                    ->first();

        if (empty($maret)) {
            $maret = 0;
        } else {
            $maret = $maret->total_catch;
        }

        $april = DB::table('fish_catches')
                    ->where('id_user', $id)
                    ->whereMonth('CREATED_AT', '4')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->select('total_catch')
                    ->first();

        if (empty($april)) {
            $april = 0;
        } else {
            $april = $april->total_catch;
        }

        $mei = DB::table('fish_catches')
                    ->where('id_user', $id)
                    ->whereMonth('CREATED_AT', '5')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->select('total_catch')
                    ->first();

        if (empty($mei)) {
            $mei = 0;
        } else {
            $mei = $mei->total_catch;
        }

        $juni = DB::table('fish_catches')
                    ->where('id_user', $id)
                    ->whereMonth('CREATED_AT', '6')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->select('total_catch')
                    ->first();

        if (empty($juni)) {
            $juni = 0;
        } else {
            $juni = $juni->total_catch;
        }

        $juli = DB::table('fish_catches')
                    ->where('id_user', $id)
                    ->whereMonth('CREATED_AT', '7')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->select('total_catch')
                    ->first();

        if (empty($juli)) {
            $juli = 0;
        } else {
            $juli = $juli->total_catch;
        }

        $agustus = DB::table('fish_catches')
                    ->where('id_user', $id)
                    ->whereMonth('CREATED_AT', '8')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->select('total_catch')
                    ->first();

        if (empty($agustus)) {
            $agustus = 0;
        } else {
            $agustus = $agustus->total_catch;
        }

        $september = DB::table('fish_catches')
                    ->where('id_user', $id)
                    ->whereMonth('CREATED_AT', '9')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->select('total_catch')
                    ->first();

        if (empty($september)) {
            $september = 0;
        } else {
            $september = $september->total_catch;
        }

        $oktober = DB::table('fish_catches')
                    ->where('id_user', $id)
                    ->whereMonth('CREATED_AT', '10')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->select('total_catch')
                    ->first();

        if (empty($oktober)) {
            $oktober = 0;
        } else {
            $oktober = $oktober->total_catch;
        }

        $november = DB::table('fish_catches')
                    ->where('id_user', $id)
                    ->whereMonth('CREATED_AT', '11')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->select('total_catch')
                    ->first();

        if (empty($november)) {
            $november = 0;
        } else {
            $november = $november->total_catch;
        }

        $desember = DB::table('fish_catches')
                    ->where('id_user', $id)
                    ->whereMonth('CREATED_AT', '12')
                    ->whereYear('CREATED_AT', $tahunSekarang)
                    ->select('total_catch')
                    ->first();

        if (empty($desember)) {
            $desember = 0;
        } else {
            $desember = $desember->total_catch;
        }

        return view('fisherman.home', compact('fishes', 'prices', 'cek_form','januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'));
    }

    /**
     * Show the application peta nelayan.
     *
     * @return \Illuminate\Http\Response
     */
    public function peta()
    {
        $date_now = date('Y-m-d H:i:s');
        $date = date_create($date_now);
        $date_limit = date_modify($date, "-3 days");
        $last_fish_location =  DB::table('fish_locations')
            ->join('fish', 'fish_locations.id_fish', '=', 'fish.id')
            ->join('users', 'fish_locations.id_user', '=', 'users.id')
            ->select('fish_locations.koordinat', 'fish.name as ikan', 'users.name as nelayan')
            ->whereDate('fish_locations.created_at', '>', $date_limit)
            ->get();
        $data = \App\User::where('koordinat', '!=', 'NULL')->get(); //tambahkan kondisi where koordinat != NULL
        return view('fisherman.home',compact('data', 'last_fish_location'));
    }

     /**
     * Show the application peta nelayan.
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        return view('fisherman.home');
    }
}
