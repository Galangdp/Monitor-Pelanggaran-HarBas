@extends('layouts.web')

@section('content')
<link rel="stylesheet" href="{{asset ('css/detail-siswa.css')}}">
<div class="container up-detail d-flex flex-column align-items-center">
    <img src="{{asset ('images/ava.avif')}}" alt="" class="img-fluid img-ava">

    <p class="nama-lengkap fs-1 fw-bold">{{Auth::user()->name}}</p>

    <p class="kelas fs-3">{{Auth::user()->siswa->kelas->nama}}</p>
</div>

<div class="container d-flex justify-content-center align-items-center w-100 mt-4">
    <div class="row w-100">

        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column mb-3">
            <p class="email fw-bold mb-1">Email</p>
            <div class="email-content w-100">
                <p class="py-2 px-5 d-flex justify-content-center align-items-center">{{Auth::user()->email}}</p>
            </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column mb-3">
            <p class="nisn fw-bold mb-1">NISN</p>
            <div class="nisn-content w-100">
                <p class="py-2 px-5 d-flex justify-content-center align-items-center">
                    {{Auth::user()->siswa->nisn}}
                </p>
            </div>
        </div>

    </div>
</div>

<div class="container pelanggaran w-75 border border-primary mb-5">
    <p class="title fw-bold p-3">Pelanggaran</p>
    <p class="title fw-bold px-4">Macam-Macam:</p>

    <div class="table-responsive px-5 mb-5">
        <table class="table table-borderless">
            <tr class="fw-bold">
                <td>No</td>
                <td>Masalah</td>
                <td>Catatan</td>
            </tr>
            @foreach($pelanggaran as $row)
            <tr>

                <td>{{$loop->iteration}}</td>
                <td>{{$row->kategori->nama_kategori}}</td>
                <td>{{$row->catatan}}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="container d-flex justify-content-center align-items-center w-100 mt-4">
        <div class="row w-100">

            <div class="col-md-12 d-flex justify-content-center align-items-center flex-column mb-3">
                <p class=" fw-bold mb-1">Total Masalah</p>
                <div class="w-100">
                    <p class="py-2 px-5 d-flex justify-content-center align-items-center">{{$pelanggaran->count()}}</p>
                </div>
            </div>



        </div>
    </div>

</div>

<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="container btn btn-primary btn-logout w-50 d-flex justify-content-center align-items-center">

    <a class="text-white" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </div>
</div>

@endsection
