<?php

namespace App\Http\Controllers;

use App\Fish;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FishController extends Controller
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
        return view('admin.home',compact('fishes'));
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
            'name' => 'required|max:100',
            'gambar' => 'required|image|max:2048'
        ]);

        $name=$request->get('name');
        $file = $request->file('gambar');
        $path = $file->store('public');

        $store = Fish::addFish($name, $path);
        if (!$store) {
            return redirect('/admin/ikan')->with('gagal', 'Data ikan gagal ditambahkan, terjadi kesalahan.');
        } else {
            return redirect('/admin/ikan')->with('sukses', 'Data Ikan sukses ditambahkan.');
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
        $request->validate([
            'name' => 'required|max:100',
            'gambar' => 'image|max:2048'
        ]);

        $name=$request->get('name');
        $data = \App\Fish::find($id);

        if ($request->hasfile('gambar')) {
            $request->validate([
                'gambar' => 'image|max:2048'
            ]);
            $file = $request->file('gambar');
            Storage::delete($data->image);
            $path = $file->store('public');

            $update = Fish::updateFish($name, $path, $id);
            
            if (!$update) {
                return redirect('/admin/ikan')->with('gagal', 'Data ikan gagal diperbaharui, terjadi kesalahan.');
            } else {
                return redirect('/admin/ikan')->with('sukses', 'Data ikan sukses diperbaharui.');
            }
        }
            
        $update = Fish::updateFishWithoutImage($name, $id);
        
        if (!$update) {
            return redirect('/admin/ikan')->with('gagal', 'Data ikan gagal diperbaharui, terjadi kesalahan.');
        } else {
            return redirect('/admin/ikan')->with('sukses', 'Data ikan sukses diperbaharui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fish = \App\Fish::find($id);
        $fish->delete();
        return redirect('/admin/ikan')->with('sukses', 'Data spesies ikan berhasil dihapus');
    }
}
