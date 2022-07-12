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
                                        <div class="row mb-2 input-daterange">
                                            <div class="col-sm-4">
                                                <a href="rupiah/reject" class="btn btn-danger mb-2"><i class="mdi mdi-delete-alert"></i> Data Riject</a>
                                                <a href="rupiah/export" target="_blank" class="btn btn-success mb-2"><i class="mdi mdi-database-export"></i> Export</a>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="row mb-3">
                                                    <label for="colFormLabelSm" class="col-4 col-form-label">Min. Date:</label>
                                                    <div class="col-8">
                                                        <input class="form-control form-control-sm" type="text" id="from_date" name="from_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="row mb-3">
                                                    <label for="colFormLabelSm" class="col-4 col-form-label">Max. Date:</label>
                                                    <div class="col-8">
                                                        <input class="form-control form-control-sm" type="text" id="to_date" name="to_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                                                <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                                            </div>
                                        </div>
                
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="scroll-horizontal-preview">
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
    $(document).ready(function() {
        // Create date inputs
        $('.input-daterange').datepicker({
            todayBtn:'linked',
            format:'yyyy-mm-dd',
            autoclose:true
        });

        load_data();
        function load_data(from_date = '', to_date = ''){
            $('.data-table').DataTable({
                "scrollX": true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "",
                    data:{from_date:from_date, to_date:to_date}
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'no_pengajuan', name: 'no_pengajuan'},
                    {data: 'anggota.nomor_ba', name: 'anggota.nomor_ba'},
                    {data: 'anggota.nama_lengkap', name: 'anggota.nama_lengkap'},
                    {data: 'jenis_syirkah', name: 'jenis_syirkah'},
                    {data: 'versi_syirkah', name: 'versi_syirkah'},
                    {data: 'pilihan_program', name: 'pilihan_program'},
                    {data: 'referensi', name: 'referensi'},
                    {data: 'nominal', name: 'nominal'},
                    {data: 'status', name: 'status'},
                    {data: 'jangka_waktu', name: 'jangka_waktu'},
                    {data: 'perpanjangan', name: 'perpanjangan'},
                    {data: 'approval', name: 'approval', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }

        // Refilter the table
        $('#filter').click(function(){
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if(from_date != '' &&  to_date != '')
            {
                $('.data-table').DataTable().destroy();
                load_data(from_date, to_date);
            }
            else
            {
                alert('Both Date is required');
            }
        });
        $('#refresh').click(function(){
            $('#from_date').val('');
            $('#to_date').val('');
            $('.data-table').DataTable().destroy();
            load_data();
        });
    });
</script>
@endpush
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" type="text/css">
@endpush
@endsection