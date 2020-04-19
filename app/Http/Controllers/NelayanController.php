<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class NelayanController extends Controller
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
     * Display a form of fisherman data
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data = \App\User::find($id);
        return view('fisherman.home',compact('data','id'));
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
        //
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
            'nohp' => 'required|numeric|digits_between:11,13',
            'noktp' => 'required|numeric|digits:16',
            'nonelayan' => 'required|min:20|max:30',
            'alamat' => 'required|max:225',
            'kecamatan' => 'required|max:30',
            'koordinat' => 'required',
            'gambar' => 'image|max:2048'
        ]);

        $name=$request->get('name');
        $nohp=$request->get('nohp');
        $noktp=$request->get('noktp');
        $nonelayan=$request->get('nonelayan');
        $alamat=$request->get('alamat');
        $kecamatan=$request->get('kecamatan');
        $koordinat=$request->get('koordinat');

        if ($request->hasfile('gambar')) {
            $request->validate([
                'gambar' => 'image|max:2048'
            ]);
            $file = $request->file('gambar');
            $path = $file->store('public');

            if ($request->get('password') != '') {
                $request->validate([
                    'password' => 'string|min:6'
                ]);
                $password=$request->get('password');
                $update = User::updateProfil($name, $nohp, $noktp, $nonelayan, $alamat, $kecamatan, $koordinat, $path, $password, $id);
            } else {
                $update = User::updateProfilWithoutPassword($name, $nohp, $noktp, $nonelayan, $alamat, $kecamatan, $koordinat, $path, $id);
            }
            if (!$update) {
                return redirect('profil')->with('gagal', 'Data nelayan gagal diperbaharui, terjadi kesalahan.');
            } else {
                return redirect('profil')->with('sukses', 'Data nelayan sukses diperbaharui.');
            }
        }
            
        if ($request->get('password') != '') {
            $request->validate([
                'password' => 'string|min:6'
            ]);
            $password=$request->get('password');
            $update = User::updateProfilWithoutPhoto($name, $nohp, $noktp, $nonelayan, $alamat, $kecamatan, $koordinat, $password, $id);
        } else {
            $update = User::updateProfilWithoutPasswordAndPhoto($name, $nohp, $noktp, $nonelayan, $alamat, $kecamatan, $koordinat, $id);
        }
        if (!$update) {
            return redirect('profil')->with('gagal', 'Data nelayan gagal diperbaharui, terjadi kesalahan.');
        } else {
            return redirect('profil')->with('sukses', 'Data nelayan sukses diperbaharui.');
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
        //
    }
}
