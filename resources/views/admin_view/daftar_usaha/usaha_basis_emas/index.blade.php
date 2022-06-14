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
                                            <li class="breadcrumb-item active">Usaha Basis Emas</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List Usaha Basis Emas</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Hanya Sementara -->
                                        <!-- <div class="card-body col-lg-7">
                                            <h6>Keterangan</h6>
                                            <p>1.Data View & form Cukup Banyak</p>
                                            <p>2.akses hanya Admin IT & Administrator</p>
                                        </div> -->

                                        <div class="row mb-2">
                                            <div class="col-sm-5">
                                                <a href="usaha_basis_emas/create" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Usaha</a>
                                            </div>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="scroll-horizontal-preview">
                                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap data-table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tanggal</th>
                                                            <th>Status Input</th>
                                                            <th>Pemilik Usaha</th>
                                                            <th>Nama Usaha</th>
                                                            <th>Kategori</th>
                                                            <th>Jenis Akad</th>
                                                            <th>Kebutuhan</th>
                                                            <th>Jangka Waktu</th>
                                                            <th>Capaian</th>
                                                            <th>Status Dana</th>
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
<script>
    $(function(){
        var table = $('.data-table').DataTable({
            "scrollX": true,
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderSequence:['asc']},
                {data: 'tanggal_post', name: 'tanggal_post', orderSequence:['asc']},
                {data: 'status_post', name: 'status_post', orderSequence:['asc']},
                {data: 'pemilik', name: 'pemilik', orderSequence:['asc']},
                {data: 'judul', name: 'judul', orderSequence:['asc']},
                {data: 'jenis_usaha', name: 'jenis_usaha', orderSequence:['asc']},
                {data: 'jenis_akad', name: 'jenis_akad', orderSequence:['asc']},
                {data: 'kebutuhan_emas', name: 'kebutuhan_emas', orderSequence:['asc']},
                {data: 'jangka_waktu', name: 'jangka_waktu', orderSequence:['asc']},
                {data: 'capaian_muqayyadah', name: 'capaian_muqayyadah', orderSequence:['asc']},
                {data: 'status_dana', name: 'status_dana', orderSequence:['asc']},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endpush
@endsection
