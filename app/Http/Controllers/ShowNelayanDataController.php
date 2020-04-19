<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowNelayanDataController extends Controller
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
     * Display a data of nelayan
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fishermen = \App\User::all()->where('nohp', '!=', NULL);
        return view('admin.home',compact('fishermen'));
    }
}
