<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
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
        $admins = \App\Admin::all();
        return view('admin.home',compact('admins'));
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
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:6',
            'gambar' => 'required|image|max:2048'
        ]);

        $name=$request->get('name');
        $email=$request->get('email');
        $password=$request->get('password');
        $file = $request->file('gambar');
        $path = $file->store('public');

        $store = Admin::addAdmin($name, $email, $path, $password);
        if (!$store) {
            return redirect('/admin/profil')->with('gagal', 'Akun admin gagal ditambahkan, terjadi kesalahan.');
        } else {
            return redirect('/admin/profil')->with('sukses', 'Admin sukses ditambahkan.');
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
        $data = \App\Admin::find($id);

        if ($request->hasfile('gambar')) {
            $request->validate([
                'gambar' => 'image|max:2048'
            ]);
            $file = $request->file('gambar');
            Storage::delete($data->image);
            $path = $file->store('public');

            if ($request->get('password') != '') {
                $request->validate([
                    'password' => 'string|min:6'
                ]);
                $password=$request->get('password');
                $update = Admin::updateProfil($name, $path, $password, $id);
            } else {
                $update = Admin::updateProfilWithoutPassword($name,$path, $id);
            }
            if (!$update) {
                return redirect('/admin/profil')->with('gagal', 'Data admin gagal diperbaharui, terjadi kesalahan.');
            } else {
                return redirect('/admin/profil')->with('sukses', 'Data admin sukses diperbaharui.');
            }
        }
            
        if ($request->get('password') != '') {
            $request->validate([
                'password' => 'string|min:6'
            ]);
            $password=$request->get('password');
            $update = Admin::updateProfilWithoutPhoto($name, $password, $id);
        } else {
            $update = Admin::updateProfilWithoutPasswordAndPhoto($name, $id);
        }
        if (!$update) {
            return redirect('/admin/profil')->with('gagal', 'Data admin gagal diperbaharui, terjadi kesalahan.');
        } else {
            return redirect('/admin/profil')->with('sukses', 'Data admin sukses diperbaharui.');
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
        $admin = \App\Admin::find($id);
        $admin->delete();
        return redirect('/admin/profil')->with('sukses', 'Admin berhasil dihapus');
    }
}
