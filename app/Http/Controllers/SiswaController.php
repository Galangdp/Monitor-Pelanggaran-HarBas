<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    //

    // public function index(){

    //     $siswa = Siswa::all();
    //     return view('siswa.detail', compact('siswa'));
    // }

    public function detail(){
        return view('siswa.detail');
    }
}
