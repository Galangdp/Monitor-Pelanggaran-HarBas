@extends('layouts.web')

@section('content')
<div class="card-custom shadow-lg m-1 p-5">
    <form method="post" action="{{route('kategori.store')}}">
        @csrf
        <div class="mb-3 d-flex w-50 gap-3 align-items-center">
            <input type="text" name="nama_kategori" class="form-control" placeholder="ex: Perkelahian">
            <button type="submit" class="btn btn-primary" style="background-color: #009879;">Tambah</button>
        </div>
    </form>
    <table id="kategori-table" class="table custom-table table-striped table-bordered table-hover" style="width: 100%;">
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<script>
    var listKategori = @json($kategori);

    $(document).ready(function() {
        var pelanggaranTable = $('#kategori-table').DataTable({
            pagingType: 'simple_numbers',
            responsive: true,
            data: listKategori,
            columns: [{
                    title: 'No',
                    data: 'id'
                },
                {
                    title: 'Nama Kategori',
                    data: 'nama_kategori'
                },
                {
                    title: 'Jumlah Digunakan',
                    data: 'pelanggarans_count'
                },
                {
                    title: 'Aksi',

                }
            ],
            columnDefs: [{
                target: 3,
                render: function(data, type, row) {
                    return `
                <div class="dropdown text-center">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Aksi
                    </button>
                    <ul class="dropdown-menu" style="min-width:0;" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a class="dropdown-item editButton" data-bs-toggle="modal" data-bs-target="#exampleModal${row.id}">
                                Edit
                            </a>
                        </li>
                        <li>
                            <form class="" action="/kategori/delete/${row.id}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="dropdown-item">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>

                <x-modal id="${row.id}" title="Edit Category" formAction="/kategori/update/${row.id}" submitLabel="Update Category">
                    <div class="mb-3">
                            <label for="kategori-input-edit" class="form-label">Category</label>
                            <input type="text" value="${row.nama_kategori}" name="nama_kategori" class="form-control" aria-describedby="emailHelp">
                    </div>
                </x-modal>
                `
                }
            }]
        });

    });
</script>
@endsection