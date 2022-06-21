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
                        <li class="breadcrumb-item active">DSyirkah Aktif Emas</li>
                    </ol>
                </div>
                <h4 class="page-title">List Dsyirkah Aktif Emas</h4>
            </div>
        </div>
    </div>
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Hanya Sementara -->
                    <div class="card-body col-lg-7">
                        <h6>Keterangan</h6>
                        <p>1. Tambah Filter tanggal per periode</p>
                        <p>2. </p>
                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="emas/export" class="btn btn-success mb-2"><i class="mdi mdi-database-export"></i> Export</a>
                        </div>
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
                                        <th>Tanggal Persetujuan</th>
                                        <th>No Pengajuan</th>
                                        <th>Kode Sertifikat</th>
                                        <th>Nomor BA</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis D'Syirkah</th>
                                        <th>Versi</th>
                                        <th>Pilihan Program</th>
                                        <th>Referensi</th>
                                        <th>Total Gramasi</th>
                                        <th>Jangka Waktu</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Perpanjangan</th>
                                        <th>Tindak lanjut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>                                          
                        </div> <!-- end preview-->
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
<div class="modal fade" id="modal-upload-sertifikat" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg loading authentication-bg">
        <div class="modal-content bg-transparent">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-7 col-lg-5">
                        <div class="card">
                            <div class="modal-header" style="background-color: goldenrod">
                                <div style="color: white"><h4>Upload Bukti Sertifikat</h4></div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="card-body p-4">
                                <form action="" id="form-upload-bukti-transfer" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="upload-file" class="form-label">Upload Bukti Sertifikat</label>
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
<div class="modal fade" id="modal-lihat-sertifikat" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg loading authentication-bg">
        <div class="modal-content bg-transparent">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-7 col-lg-5">
                        <div class="card">
                            <div class="modal-header" style="background-color: goldenrod">
                                <div style="color: white"><h4>Upload Bukti Sertifikat</h4></div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="card-body p-4">
                                <form action="" id="form-upload-bukti-transfer" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="upload-file" class="form-label">Upload Bukti Sertifikat</label>
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
@push('scripts')
<script>
    $('body').on('click', '#upload-sertifikat', function () {
        var id = $(this).data('id');
        $('#form-upload-bukti-transfer').attr("action",`emas/${id}/upload-sertifikat`)
    });
    $('body').on('click', '#lihat-sertifikat', function () {
        var id = $(this).data('id');
        $('#form-upload-bukti-transfer').attr("action",`emas/${id}/lihat-sertifikat`)
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
                {data: 'tgl_persetujuan', name: 'tgl_persetujuan', orderSequence:['asc']},
                {data: 'no_pengajuan', name: 'no_pengajuan', orderSequence:['asc']},
                {data: 'no_pengajuan', name: 'no_pengajuan', orderSequence:['asc']},
                {data: 'nomor_ba', name: 'nomor_ba', orderSequence:['asc']},
                {data: 'nama_lengkap', name: 'nama_lengkap', orderSequence:['asc']},
                {data: 'jenis_syirkah', name: 'jenis_syirkah', orderSequence:['asc']},
                {data: 'versi_syirkah', name: 'versi_syirkah', orderSequence:['asc']},
                {data: 'pilihan_program', name: 'pilihan_program', orderSequence:['asc']},
                {data: 'referensi', name: 'referensi', orderSequence:['asc']},
                {data: 'total_gramasi', name: 'total_gramasi', orderSequence:['asc']},
                {data: 'jangka_waktu', name: 'jangka_waktu', orderSequence:['asc']},
                {data: 'jatuh_tempo', name: 'jatuh_tempo', orderSequence:['asc']},
                {data: 'perpanjangan', name: 'perpanjangan', orderSequence:['asc']},
                {data: 'tindak_lanjut', name: 'tindak_lanjut', orderable: false, searchable: false},
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