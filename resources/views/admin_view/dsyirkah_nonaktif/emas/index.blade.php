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
                        <li class="breadcrumb-item active">NonAktif Emas</li>
                    </ol>
                </div>
                <h4 class="page-title">List NonAktif Emas</h4>
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
                            <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Slesai</th>
                                        <th>Kode Sertifikat</th>
                                        <th>Nomor BA</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis D'Syirkah</th>
                                        <th>Total Emas</th>
                                        <th>Kategori</th>
                                        <th>Pengiriman</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>12 Apr 2022 13:30</td>
                                        <td>5467658768678</td>
                                        <td>0.123.1234567</td>
                                        <td>Nasorudin</td>
                                        <td>Muqoyyadah</td>
                                        <td>10 Gram</td>
                                        <td>
                                            <span class="badge badge-primary-lighten">Selesai Akad</span>
                                            <span class="badge badge-danger-lighten">Batal Akad</span>
                                        </td>
                                        <td>
                                            <a href="" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-upload-pengiriman"><i class="mdi mdi-file-upload"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-update"></i></a>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary-lighten">Proses</span>
                                            <span class="badge badge-info-lighten">Close</span>
                                        </td>
                                        <td>
                                            <a href="view-nonaktif-emas.html" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-file-restore-outline"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>12 Apr 2022 13:30</td>
                                        <td>5467658768678</td>
                                        <td>0.123.1234567</td>
                                        <td>Nasorudin</td>
                                        <td>Muqoyyadah</td>
                                        <td>5 Gram</td>
                                        <td>
                                            <span class="badge badge-primary-lighten">Selesai Akad</span>
                                            <span class="badge badge-danger-lighten">Batal Akad</span>
                                        </td>
                                        <td>
                                            <a href="" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-upload-pengiriman"><i class="mdi mdi-file-upload"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-update"></i></a>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary-lighten">Proses</span>
                                            <span class="badge badge-info-lighten">Close</span>
                                        </td>
                                        <td>
                                            <a href="view-nonaktif-emas.html" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-file-restore-outline"></i></a>
                                        </td>
                                    <tr>
                                        <td>3</td>
                                        <td>12 Apr 2022 13:30</td>
                                        <td>5467658768678</td>
                                        <td>0.123.1234567</td>
                                        <td>Nasorudin</td>
                                        <td>Muqoyyadah</td>
                                        <td>30 gram</td>
                                        <td>
                                            <span class="badge badge-primary-lighten">Selesai Akad</span>
                                            <span class="badge badge-danger-lighten">Batal Akad</span>
                                        </td>
                                        <td>
                                            <a href="" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-upload-pengiriman"><i class="mdi mdi-file-upload"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-update"></i></a>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary-lighten">Proses</span>
                                            <span class="badge badge-info-lighten">Close</span>
                                        </td>
                                        <td>
                                            <a href="view-nonaktif-emas.html" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-file-restore-outline"></i></a>
                                        </td>
                                    </tr>
                                    </tr>
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
                                                    <div class="modal-header" style="background-color: goldenrod">
                                                        <div style="color: white"><h4>Upload Bukti Pengiriman</h4></div>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <form action="#">
                                                            <div class="mb-3">
                                                                <label for="fullname" class="form-label">Tanggal Pengiriman Barang</label>
                                                                <input class="form-control" type="date" placeholder="" id="fullname" required="">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="fullname" class="form-label">Upload Bukti Pengiriman</label>
                                                                <input class="form-control" type="upload" placeholder="" id="fullname" required="">
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
@endsection