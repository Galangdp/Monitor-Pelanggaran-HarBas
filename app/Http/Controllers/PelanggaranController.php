<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Pelanggaran;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelanggaranExport;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index()
    {
        $pelanggaran = Pelanggaran::with('kategori', 'pelapor', 'siswa.user', 'siswa.kelas')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('pelanggaran.index', compact('pelanggaran'));
    }

    public function store(Request $request)
    {

        $pelanggaran = new Pelanggaran();
        $pelanggaran->id_kategori = $request->id_kategori;
        $pelanggaran->id_siswa = $request->id_siswa;
        $pelanggaran->id_user_pelapor = $request->id_user_pelapor;
        $pelanggaran->catatan = $request->catatan;
        $pelanggaran->save();

        return redirect('/input-pelanggaran');
    }

    public function view_input()
    {
        $kategori = Kategori::all();
        $kelas = Kelas::all();
        $guru = User::where('level', 'guru')->get();
        $nama = Siswa::with('user')->get()->map(function ($item) {
            return $item->user->name;
        });

        return view('pelanggaran.insert', compact('kategori', 'guru', 'kelas', 'nama'));
    }

    public function get_nisn(Request $request)
    {
        $id = $request->input('id');
        $user = Siswa::where('id', $id)->first();
        $nisn = $user->nisn;

        return response()->json(['nisn' => $nisn]);
    }

    public function get_nama_by_kelas(Request $request)
    {
        $kelas = $request->input('kelas');
        $siswa = Siswa::with('user')->where('id_kelas', Kelas::where('id', $kelas)->first()->id)->get();

        return response()->json(['siswa' => $siswa]);
    }

    public function pelanggaranexport(){
        return Excel::download(new PelanggaranExport, 'pelanggaran.xlsx');
    }

}
