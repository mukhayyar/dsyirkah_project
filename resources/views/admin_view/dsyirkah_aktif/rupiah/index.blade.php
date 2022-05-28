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
                        <li class="breadcrumb-item active">Dsyirkah Aktif Rupiah</li>
                    </ol>
                </div>
                <h4 class="page-title">List Dsyirkah Aktif Rupiah</h4>
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
                            <a href="javascript:void(0);" class="btn btn-success mb-2"><i class="mdi mdi-database-export"></i> Export</a>
                        </div>
                    </div>
                    
                    <div class="tab-content">
                        <div class="tab-pane show active" id="scroll-horizontal-preview">
                            <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Persetujuan</th>
                                        <th>Kode DSyirkah</th>
                                        <th>Kode Sertifikat</th>
                                        <th>Nomor BA</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis D'Syirkah</th>
                                        <th>Versi</th>
                                        <th>Pilihan Program</th>
                                        <th>Referensi</th>
                                        <th>Total Rupiah</th>
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
@push('scripts')
<script>
    $(function(){
        var table = $('.data-table').DataTable({
            "scrollX": true,
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'tgl_persetujuan', name: 'tgl_persetujuan'},
                {data: 'no_pengajuan', name: 'no_pengajuan'},
                {data: 'no_pengajuan', name: 'no_pengajuan'},
                {data: 'nomor_ba', name: 'nomor_ba'},
                {data: 'nama_lengkap', name: 'nama_lengkap'},
                {data: 'jenis_syirkah', name: 'jenis_syirkah'},
                {data: 'versi_syirkah', name: 'versi_syirkah'},
                {data: 'pilihan_program', name: 'pilihan_program'},
                {data: 'referensi', name: 'referensi'},
                {data: 'nominal', name: 'nominal'},
                {data: 'jangka_waktu', name: 'jangka_waktu'},
                {data: 'jatuh_tempo', name: 'jatuh_tempo'},
                {data: 'perpanjangan', name: 'perpanjangan'},
                {data: 'tindak_lanjut', name: 'tindak_lanjut', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endpush
@endsection