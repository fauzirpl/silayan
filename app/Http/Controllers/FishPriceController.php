<?php

namespace App\Http\Controllers;

use App\Fish;
use App\FishPrice;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FishPriceController extends Controller
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
     * Display a form of fisherman data
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fishes = \App\Fish::all();
        $prices =  DB::table('fish_prices')
            ->join('fish', 'fish_prices.id_fish', '=', 'fish.id')
            ->select('fish_prices.*', 'fish.name')
            ->get();
        return view('admin.home',compact('fishes','prices'));
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
        $request->validate([
            'kecamatan' => 'required|max:100',
            'spesies' => 'required|max:5',
            'harga' => 'required|integer|digits_between:1,16'
        ]);

        $area=$request->get('kecamatan');
        $id_fish=$request->get('spesies');
        $price=$request->get('harga');

        $store = FishPrice::addPrice($area, $id_fish, $price);
        if (!$store) {
            return redirect('/admin/harga')->with('gagal', 'Data harga ikan gagal ditambahkan, terjadi kesalahan.');
        } else {
            return redirect('/admin/harga')->with('sukses', 'Data harga ikan sukses ditambahkan.');
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
