<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Pelanggaran;

class SiswaController extends Controller
{
    //

    // public function index(){

    //     $siswa = Siswa::all();
    //     return view('siswa.detail', compact('siswa'));
    // }

    public function detail($id){
        $kelas = Kelas::all();
        $siswa = Siswa::where('id_user', $id)->get();
        $pelanggaran = Pelanggaran::with('kategori')->where('id_siswa', $siswa-> first() ->id)->get();
        return view('siswa.detail', compact('siswa', 'kelas', 'pelanggaran'));
    }
}
