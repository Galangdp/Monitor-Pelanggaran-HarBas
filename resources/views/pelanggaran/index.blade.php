@extends('layouts.web')

@section('content')
<div class="card-custom shadow-lg m-1 p-5">
    <div class="table-responsive">
        <table id="pelanggaran-table" class="table custom-table table-striped table-bordered table-hover" style="width: 100%;">
        </table>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-6 mt-4">
                <a href="{{route ('pelanggaranexport')}}" class="btn btn-danger">Export</a>
            </div>
            <div class="col-md-6 mt-4">
                <a href="" class="btn btn-primary">Import</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var listPelanggaran = @json($pelanggaran);

    $(document).ready(function() {
        var pelanggaranTable = $('#pelanggaran-table').DataTable({
            pagingType: 'simple_numbers',
            order: [],
            data: listPelanggaran,
            columns: [{
                    title: 'Nisn',
                    data: 'siswa.nisn'
                },
                {
                    title: 'Nama',
                    data: 'siswa.user.name',
                    orderable: false
                },
                {
                    title: 'Kelas',
                    data: 'siswa.kelas.nama',
                    orderable: false
                },
                {
                    title: 'Kategori',
                    data: 'kategori.nama_kategori',
                    orderable: false
                },
                {
                    title: 'Catatan',
                    data: 'catatan',
                    orderable: false,
                    render: function(data, type, row) {
                        var maxLength = 40;
                        var truncatedString = data.length > maxLength ? data.substr(0, maxLength - 3) + '...' : data;
                        return truncatedString;
                    }
                },
                {
                    title: 'Tanggal',
                    data: 'created_at',
                    orderable: false,
                    render: function(data, type, row) {
                        moment.locale('id');
                        return moment(data).format("ddd, DD MMM YYYY | HH:mm");
                    },
                }
            ],
        });

        $('#pelanggaran-table tbody').on('click', 'tr', function() {
            var tr = $(this).closest('tr');
            var row = pelanggaranTable.row($(this));

            if (row.child.isShown()) {
                // This row is already open - close it
                $('div.slider', row.child()).slideUp(function() {
                    row.child.hide();
                });
            } else {
                // Open this row
                row.child(format(row.data()), 'no-padding ').show();
                $('div.slider', row.child()).slideDown();
            }
        });
    });
</script>

@endsection