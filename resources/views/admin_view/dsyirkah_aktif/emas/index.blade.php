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
                                        <th>Total Gramasi</th>
                                        <th>Jangka Waktu</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Perpanjangan</th>
                                        <th>Tindak lanjut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>12 Apr 2022 13:30</td>
                                        <td>G-123456-MQ</td>
                                        <td>Nomor Sertifikat</td>
                                        <td>0.123.1234567</td>
                                        <td>Nasorudin</td>
                                        <td>Mutlaqah</td>
                                        <td>3.0</td>
                                        <td>Reguler</td>
                                        <td>Pusat</td>
                                        <td>100 Gram</td>
                                        <td>3 Bulan</td>
                                        <td>12 Apr 2022</td>
                                        <td>Otomatis</td>
                                        <td>
                                            <a href="action" class="action-icon"> <i class="mdi mdi-calendar-start"></i></a>
                                        </td>
                                        <td>
                                            <a href="detail" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>
                                            <a href="edit-pengajuan-emas.html" class="action-icon"> <i class="mdi mdi-printer"></i></a>
                                            <a href="view-pengajuan-emas.html" class="action-icon"> <i class="mdi mdi-whatsapp"></i></a>
                                        </td>
                                    </tr>
                                    
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
        });
    });
</script>
@endpush
@endsection