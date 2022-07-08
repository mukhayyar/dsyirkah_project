@extends('layouts.dashboard')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">D'Syirkah</a></li>
                        <li class="breadcrumb-item active">NonAktif Rupiah</li>
                    </ol>
                </div>
                <h4 class="page-title">List NonAktif Rupiah</h4>
            </div>
        </div>
    </div>
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body col-lg-7">
                        <h6>Keterangan</h6>
                        <p>1. Tambah Filter tanggal per periode</p>
                        <p>2. </p>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="scroll-horizontal-preview">
                            <table cellspacing="5" cellpadding="5" border="0">
                                <tbody><tr>
                                    <td>Minimum date:</td>
                                    <td><input type="text" id="min" name="min"></td>
                                </tr>
                                <tr>
                                    <td>Maximum date:</td>
                                    <td><input type="text" id="max" name="max"></td>
                                </tr>
                            </tbody></table>
                            <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Slesai</th>
                                        <th>Kode Sertifikat</th>
                                        <th>Nomor BA</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis D'Syirkah</th>
                                        <th>Total Rupiah</th>
                                        <th>Kategori</th>
                                        <th>Pengiriman</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>                                          
                        </div> <!-- end preview-->
                        <div class="modal fade" id="modal-upload-pengiriman" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg loading authentication-bg">
                                <div class="modal-content bg-transparent">
                                <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-xxl-7 col-lg-5">
                                                <div class="card">
                                                    <div class="modal-header bg-success">
                                                        <div style="color: white"><h4>Upload Bukti Transfer</h4></div>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <form action="" id="form-upload-bukti-transfer" enctype="multipart/form-data" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman Barang</label>
                                                                <input class="form-control" type="date" name="tanggal_pengiriman" placeholder="" id="tanggal_pengiriman" required="">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="upload-file" class="form-label">Upload Bukti Pengiriman</label>
                                                                <input class="form-control" type="file" name="file_transfer" placeholder="" id="upload-file" required="">
                                                            </div>
                                                            
                                                            <div class="mb-3 text-center">
                                                                <button class="btn btn-primary" type="submit"> Simpan </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <!-- end container -->
                                </div>
                                </div>
                                <!-- end page -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div> <!-- container -->
@push('scripts')
<script>
    $('body').on('click', '#upload-pengiriman', function () {
        var id = $(this).data('id');
        $('#form-upload-bukti-transfer').attr("action",`rupiah/${id}/upload-bukti`)
    });
</script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script>
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date( data[1] );
            console.log(date);
    
            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date   && max === null ) ||
                ( min <= date   && date <= max )
            ) {
                return true;
            }
            return false;
        }
    );
    
    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        var table = $('.data-table').DataTable({
            "scrollX": true,
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderSequence:['asc']},
                {data: 'tanggal_non_aktif', name: 'tanggal_non_aktif', orderSequence:['asc']},
                {data: 'kode_sertifikat', name: 'kode_sertifikat', orderSequence:['asc']},
                {data: 'nomor_ba', name: 'nomor_ba', orderSequence:['asc']},
                {data: 'nama_lengkap', name: 'nama_lengkap', orderSequence:['asc']},
                {data: 'jenis', name: 'jenis', orderSequence:['asc']},
                {data: 'nominal', name: 'nominal', orderSequence:['asc']},
                {data: 'kategori', name: 'kategori', orderSequence:['asc']},
                {data: 'pengiriman', name: 'pengiriman', orderable: false, searchable: false},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        // Refilter the table
        $('#min, #max').on('change', function () {
            table.draw();
        });
    });
</script>
@endpush
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" type="text/css">
@endpush
@endsection