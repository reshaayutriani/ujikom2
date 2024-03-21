@extends('template/layout')

@push('style')
@endpush

@section('content')
<section class="content">
    <div class="right_col" role="main">
        <!-- /top tiles -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="dashboard_graph">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>
                                PROJECT UJIKOM
                                <h3>CHASIER COFFE</h3>
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="pull-right" style="
                                    background: #fff;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    border: 1px solid #ccc;
                                ">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span>
                                <b class="caret"></b>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-3 bg-white">
                        <div class="x_title">
                            <h2>jenis</h2>
                            <div class="float-right ml-auto">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormJenis">
                                    Tambah jenis
                                </button>
                                <a href="{{ route('export-jenis') }}" class= "btn btn-succes"> 
                                <i class="fa fa-file-excel"></i> Export
                                </a>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
                                <i class="fas fa-file-excel"></i> Import
                            </button>
                            </div>
                            <div class="clearfix"></div>
                        </div>


                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="mt-3">
                                @include('jenis.table')
                                @include('jenis.import')
                            </div>
                            <!-- Button trigger modal -->
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <br />
    </div>
    @include('jenis.modal')
</section>
@endsection

@push('script')

<!-- SweetAlert2
<script src="AdminLTE-3.2.0/plugins/sweetalert/sweetalert.min.js"></script>
Toastr
<script src="AdminLTE-3.2.0/plugins/toastr/toastr.min.js"></script> -->

<script>
    console.log('jenis')
    //$('#tbl-jenis').DataTable()//

    $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-success').slideUp(500)
    })
    $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-danger').slideUp(500)
    })

    console.log($('.delete-data'))

    $('.delete-data').on('click', function(e) {
        e.preventDefault()
        let jenis = $(e.currentTarget).data('jenis')
        const member = $(this).closest('tr').find('td:eq(1)').text()
        Swal.fire({
            title: `Apakah data <span style="color:red">${jenis}</span> akan dihapus?`,
            text: "Data tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data ini!'
        }).then((result) => {
            if (result.isConfirmed)
                $(e.target).closest('form').submit()
            else swal.close()
        })
    })

    $('#modalFormJenis').on('show.bs.modal', function(e) {
        console.log('edit')
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const nama_jenis = btn.data('nama_jenis')
        const kategori_id = btn.data('kategori_id')
        const id = btn.data('id')
        const modal = $(this)
        if (mode == 'edit') {
            modal.find('.modal-title').text('Edit Data jenis')
            modal.find('#nama_jenis').val(nama_jenis)
            modal.find('.modal-body form').attr('action', '{{ url("jenis")}}/' + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input Data jenis')
            modal.find('#nama_jenis').val('')
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("jenis") }}')
        }
    })
</script>
@endpush