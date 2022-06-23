@extends('layouts.dashboard')
@section('content')
                
                <!-- Start Content-->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">D'Syirkah</a></li>
                                            <li class="breadcrumb-item active">Pengajuan Rupiah</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List Pengajuan Rupiah</h4>
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
                                                <a href="rupiah/reject" class="btn btn-danger mb-2"><i class="mdi mdi-delete-alert"></i> Data Riject</a>
                                                <a href="rupiah/export" target="_blank" class="btn btn-success mb-2"><i class="mdi mdi-database-export"></i> Export</a>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            
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
                                                            <th>Tanggal Pengajuan</th>
                                                            <th>Nomor Pengajuan</th>
                                                            <th>Nomor BA</th>
                                                            <th>Nama Lengkap</th>
                                                            <th>Jenis D'Syirkah</th>
                                                            <th>Versi</th>
                                                            <th>Pilihan Program</th>
                                                            <th>Referensi</th>
                                                            <th>Total Rupiah</th>
                                                            <th>Status</th>
                                                            <th>Jangka Waktu</th>
                                                            <th>Perpanjangan</th>
                                                            <th>Aproval</th>
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

                </div> <!-- content -->
@push('scripts')
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
                {data: 'created_at', name: 'created_at', orderSequence:['asc']},
                {data: 'no_pengajuan', name: 'no_pengajuan', orderSequence:['asc']},
                {data: 'anggota.nomor_ba', name: 'anggota.nomor_ba', orderSequence:['asc']},
                {data: 'anggota.nama_lengkap', name: 'anggota.nama_lengkap', orderSequence:['asc']},
                {data: 'jenis_syirkah', name: 'jenis_syirkah', orderSequence:['asc']},
                {data: 'versi_syirkah', name: 'versi_syirkah', orderSequence:['asc']},
                {data: 'pilihan_program', name: 'pilihan_program', orderSequence:['asc']},
                {data: 'referensi', name: 'referensi', orderSequence:['asc']},
                {data: 'nominal', name: 'nominal', orderSequence:['asc']},
                {data: 'status', name: 'status', orderSequence:['asc']},
                {data: 'jangka_waktu', name: 'jangka_waktu', orderSequence:['asc']},
                {data: 'perpanjangan', name: 'perpanjangan', orderSequence:['asc']},
                {data: 'approval', name: 'approval', orderable: false, searchable: false},
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