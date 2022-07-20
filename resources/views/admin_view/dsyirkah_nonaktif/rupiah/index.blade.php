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
                <h4 class="page-title text-danger">List NonAktif Rupiah</h4>
            </div>
        </div>
    </div>
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2 input-daterange">
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
                        <span class="placeholder col-12 bg-danger"></span>
                        <span class="placeholder col-12 bg-success"></span>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="scroll-horizontal-preview">
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
                    {data: 'tanggal_non_aktif', name: 'tanggal_non_aktif'},
                    {data: 'kode_sertifikat', name: 'kode_sertifikat'},
                    {data: 'nomor_ba', name: 'nomor_ba'},
                    {data: 'nama_lengkap', name: 'nama_lengkap'},
                    {data: 'jenis', name: 'jenis'},
                    {data: 'nominal', name: 'nominal'},
                    {data: 'kategori', name: 'kategori'},
                    {data: 'pengiriman', name: 'pengiriman', orderable: false, searchable: false},
                    {data: 'status', name: 'status'},
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