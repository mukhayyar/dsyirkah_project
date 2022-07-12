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
                                            <li class="breadcrumb-item active">CIF Anggota</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Data Detail Anggota</h4>
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
                                            <p>1.Data View & form Cukup Banyak</p>
                                            <p>2.akses hanya Admin IT & Administrator</p>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-sm-5">
                                                <a href="" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#modal-tambah-datacif"><i class="mdi mdi-plus-circle me-2"></i> Data CIF Anggota</a>
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#importExcel" class="btn btn-success mb-2"><i class="mdi mdi-database-import me-2"></i> Import</a>
                                            </div>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="scroll-horizontal-preview">
                                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap data-table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nomor BA</th>
                                                            <th>Nama Lengkap</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Tgl Lahir</th>
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
<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="cif_anggota/import" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Tambah Data-->
<div class="modal fade" id="modal-tambah-datacif" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document"">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #afb4be">
                <h4 class="modal-title" style="color: rgb(255, 255, 255);" id="myLargeModalLabel">Tambah Data CIF Anggota</h4>
                <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form id="CustomerForm" name="CustomerForm" method="POST" action="/admin/master/cif_anggota" enctype="multipart/form-data">
                    @csrf
                    <h5>Data Akun</h5><hr>
                    <div class="row g-2">
                        <div class="col-md">
                            <label class="form-label">Nomor BA</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari Nomor BA" data-toggle="input-mask" data-mask-format="0.000.0000000" id="no_ba" name="no_ba">
                                <button class="btn btn-primary" id="cari" type="button">Cari</button>
                            </div>
                        </div>
                        <div class="col-md">
                            <label for="fullname" class="form-label">Nama Lengkap</label>
                            <input class="form-control" type="text" id="fullNameAdd" placeholder="Enter your name" name="nama" readonly="">
                        </div>
                    </div><br>
                    <div class="row g-2">
                        <div class="col-md">
                            <label for="fullname" class="form-label">Nomor HP</label>
                            <input class="form-control" type="text" name="no_hp" id="noHpAdd" placeholder="No Hp" readonly="">
                        </div>
                        <div class="col-md">
                            <label for="emailaddress" class="form-label">Email address</label>
                            <input class="form-control" type="email" name="email" id="emailAdd" placeholder="Email" readonly="">
                        </div>
                    </div><hr><br>

                    <div class="row g-2">
                        <div class="col-md">
                            <label for="fullname" class="form-label">Nomor KTP</label>
                            <input class="form-control" type="text" name="no_ktp" id="noKtp" placeholder="Masukkan Nomor KTP" required>
                        </div>
                        <div class="col-md">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div><br>

                    <div class="row g-2">
                        <div class="col-md">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input class="form-control date" type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="dd/mm/yyyy" required>
                        </div>
                    </div><br>

                    <div class="row g-2">
                        <div class="col-md">
                            <label for="status_nikah" class="form-label">Status Pernikahan</label>
                            <select class="form-select" id="status_nikah" name="status_nikah" required>
                                <option value="Belum Nikah">Belum Nikah</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>
                        <div class="col-md">
                            <label for="fullname" class="form-label">Nomor NPWP (Jika Punya)</label>
                            <input class="form-control date" type="text" id="npwp" name="npwp" placeholder="000000000">
                        </div>
                    </div><hr><br>

                    <div class="col-md">
                        <label for="fullname" class="form-label">Alamat Sesuai KTP</label>
                        <input class="form-control date" type="text" id="alamat_ktp" name="alamat_ktp" placeholder="Jl. Raya Nommor:00 RT/RW" required>
                    </div>

                    <div class="row g-2">
                        <div class="col-md">
                            <label for="fullname" class="form-label">Provinsi</label>
                            <select class="form-control" name="provinsi_ktp" id="form_prov">
                                <option>--Provinsi--</option>
                                <option>--Data Masih Diproses--</option>
                            </select>
                        </div>
                        <div class="col-md">
                            <label for="fullname" class="form-label">Kota / Kabupaten</label>
                            <select class="form-control" name="kota_ktp" id="form_kab">
                                <option>--Kabupaten/Kota--</option>
                                <option>--Pilih Provinsi Terlebih Dahulu--</option>
                            </select>
                        </div>
                    </div><br>

                    <div class="row g-2">
                        <div class="col-md">
                            <label for="fullname" class="form-label">Kecamatan</label>
                            <select class="form-control" name="kecamatan_ktp" id="form_kec">
                                <option>--Kecamatan--</option>
                                <option>--Pilih Kabupaten Terlebih Dahulu--</option>
                            </select>
                        </div>
                        <div class="col-md">
                            <label for="fullname" class="form-label">Kelurahan</label>
                            <select class="form-control" name="kelurahan_ktp" id="form_kel">
                                <option>--Kelurahan--</option>
                                <option>--Pilih Kecamatan Terlebih Dahulu--</option>
                            </select>
                        </div>
                    </div><br>

                    <div class="col-md">
                        <label for="example-select" class="form-label">Alamat Tinggal</label>
                        <select class="form-select" id="checkAlamatTinggal" name="checkAlamatTinggal" required>
                            <option value="sesuai">Sesuai KTP</option>
                            <option value="tidakSesuai">Tidak Sesuai KTP</option>
                        </select>
                    </div><br>

                    <div id="tidakSesuai" class="domisili" style="display:none">
                        <div class="col-md">
                            <label for="fullname" class="form-label">Alamat Saat ini(domisili)</label>
                            <input class="form-control date" type="text" id="alamat_dom" name="alamat_dom" placeholder="Jl. Raya Nommor:00 RT/RW">
                        </div>
                        
                        <div class="row g-2">
                            <div class="col-md">
                                <label for="fullname" class="form-label">Provinsi</label>
                                <select class="form-control" name="provinsi_dom" id="form_prov_dom">
                                    <option value="">--Provinsi--</option>
                                    <option>--Data Masih Diproses--</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="fullname" class="form-label">Kota / Kabupaten</label>
                                <select class="form-control" name="kota_dom" id="form_kab_dom">
                                    <option value="">--Kabupaten/Kota--</option>
                                    <option>--Pilih Provinsi Terlebih Dahulu--</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="row g-2">
                            <div class="col-md">
                                <label for="fullname" class="form-label">Kecamatan</label>
                                <select class="form-control" name="kecamatan_dom" id="form_kec_dom">
                                    <option value="">--Kecamatan--</option>
                                    <option>--Pilih Kabupaten Terlebih Dahulu--</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="fullname" class="form-label">Kelurahan</label>
                                <select class="form-control" name="kelurahan_dom" id="form_kel_dom">
                                    <option value="">--Kelurahan--</option>
                                    <option>--Pilih Kecamatan Terlebih Dahulu--</option>
                                </select>
                            </div>
                        </div>
                    </div><hr><br>

                    <div class="mb-3" id="div-upload-ktp">
                        <label for="formFile" class="form-label">Upload Foto KTP</label>
                        <input class="form-control" type="file" id="file_ktp" name="file_ktp">
                    </div><hr><br>
                    <div id="div-foto-ktp" style="display: none">
                        <img id="show_foto_ktp" src="" alt="" width="200" height="150">
                    </div>

                    <br>
                    <div class="mb-3 text-center" id="div-simpan">
                        <button class="btn btn-primary" type="submit"> Simpan </button>
                    </div>
                </form>
            </div>

            <!-- print -->

            <div style="display:none;">
                <div id="cif_print">

                <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Nomor Buku Anggota</strong></p>
                    </div>
                    <div class="col-4">
                        
                        <p id="no_ba_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Nama Lengkap</strong></p>
                    </div>
                 
                    <div class="col-4">
                        <p id="nama_lengkap_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Nomor Hp</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="no_hp_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Email</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="email_print" class="font-14"></p>
                    </div><hr style="border-top: 1px solid;">
                </div>
                
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Nomor KTP</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="no_ktp_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Jenis Kelamin</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="jenis_kelamin_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Tempat Lahir</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="tempat_lahir_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Tanggal Lahir</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="tanggal_lahir_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Status Pernikahan</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="status_nikah_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Nomor NPWP</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="no_npwp_print" class="font-14"></p>
                    </div><hr style="border-top: 1px solid;">
                </div>
                
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Alamat Sesuai KTP</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="alamat_ktp_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Kelurahan</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="kelurahan_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Kecamatan</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="kecamatan_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Kota / Kabupaten</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="kota_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Provinsi</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="provinsi_print" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Alamat Tinggal</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="alamat_tinggal_print" class="font-14"></p>
                    </div>
                </div>
                <div id="checkAlamatTinggalprint">
                    <div class="row">
                        <div class="col-4">
                            <p class="font-14"><strong>Alamat Tinggal Saat ini</strong></p>
                        </div>
                        <div class="col-4">
                            <p id="alamat_domisili_print" class="font-14"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="font-14"><strong>Kelurahan</strong></p>
                        </div>
                        <div class="col-4">
                            <p id="kelurahan_domisili_print" class="font-14"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="font-14"><strong>Kecamatan</strong></p>
                        </div>
                        <div class="col-4">
                            <p id="kecamatan_domisili_print" class="font-14"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="font-14"><strong>Kota / Kabupaten</strong></p>
                        </div>
                        <div class="col-4">
                            <p id="kota_domisli_print" class="font-14"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="font-14"><strong>Provinsi</strong></p>
                        </div>
                        <div class="col-4">
                            <p id="provinsi_domisili_print" class="font-14"></p>
                        </div><hr style="border-top: 1px solid;">
                    </div>
                </div>
                <div class="row">
                <div class="col-4">
                    <p class="font-14"><strong>Photo KTP :</strong></p>
                </div>
                    <div class="col-4">
                    <img src="" alt="image" class="img-fluid rounded" id="print_foto_ktp_print" width="150"/>
                    </div>
                </div>
               
               
            </div>

                </div>
            </div>



            <!-- / print -->

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</div> <!-- container -->

</div> <!-- content -->
<!-- Modal view-->
<div class="modal fade" id="modal-view-anggota" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document"">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #afb4be">
                <h4 class="modal-title" style="color: rgb(255, 255, 255);" id="myLargeModalLabel">Data CIF Anggota</h4>
                <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Nomor Buku Anggota</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="no_ba_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Nama Lengkap</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="nama_lengkap_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Nomor Hp</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="no_hp_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Email</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="email_view" class="font-14"></p>
                    </div><hr>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Nomor KTP</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="no_ktp_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Jenis Kelamin</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="jenis_kelamin_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Tempat Lahir</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="tempat_lahir_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Tanggal Lahir</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="tanggal_lahir_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Status Pernikahan</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="status_nikah_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Nomor NPWP</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="no_npwp_view" class="font-14"></p>
                    </div><hr>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Alamat Sesuai KTP</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="alamat_ktp_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Kelurahan</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="kelurahan_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Kecamatan</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="kecamatan_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Kota / Kabupaten</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="kota_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Provinsi</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="provinsi_view" class="font-14"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="font-14"><strong>Alamat Tinggal</strong></p>
                    </div>
                    <div class="col-4">
                        <p id="alamat_tinggal_view" class="font-14"></p>
                    </div>
                </div>
                <div id="checkAlamatTinggalView">
                    <div class="row">
                        <div class="col-4">
                            <p class="font-14"><strong>Alamat Tinggal Saat ini</strong></p>
                        </div>
                        <div class="col-4">
                            <p id="alamat_domisili_view" class="font-14"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="font-14"><strong>Kelurahan</strong></p>
                        </div>
                        <div class="col-4">
                            <p id="kelurahan_domisili_view" class="font-14"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="font-14"><strong>Kecamatan</strong></p>
                        </div>
                        <div class="col-4">
                            <p id="kecamatan_domisili_view" class="font-14"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="font-14"><strong>Kota / Kabupaten</strong></p>
                        </div>
                        <div class="col-4">
                            <p id="kota_domisli_view" class="font-14"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="font-14"><strong>Provinsi</strong></p>
                        </div>
                        <div class="col-4">
                            <p id="provinsi_domisili_view" class="font-14"></p>
                        </div><hr>
                    </div>
                </div>
                <div class="col-4">
                    <p class="font-14"><strong>Photo KTP :</strong></p>
                </div>
                <img src="/images/data_penting/ktp/" alt="image" class="img-fluid rounded" id="show_foto_ktp_view" width="600"/>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function() {
        $('#checkAlamatTinggal').change(function(){
            $('.domisili').hide();
            $('#' + $(this).val()).show();
        })
    })
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
            success: function(hasil){
                hasil = hasil.provinsi
                hasilAkhir = []
                hasilAkhir.push("<option value=''>--Provinsi--</option>");
                hasil.forEach(element => {
                    var name = element.nama
                    value = `${element.id},${name}`
                    hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                });
                $("#form_prov").html(hasilAkhir);
            }
        })
        $("body").on("change","#form_prov",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+id,
                ajaxSend: function(){
                    hasilAkhir.push("<option value=''>--Kabupaten/Kota--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                },
                success: function(hasil){
                    hasil = hasil.kota_kabupaten
                    hasilAkhir = []
                    hasil.forEach(element => {
                        var name = element.nama
                        value = `${element.id},${name}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kab").html(hasilAkhir);
                }
            })
            
        })
        $("body").on("change","#form_kab",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota="+id,
                ajaxSend: function(){
                    hasilAkhir.push("<option value=''>--Kecamatan--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                },
                success: function(hasil){
                    hasil = hasil.kecamatan
                    hasilAkhir = []
                    hasil.forEach(element => {
                        var name = element.nama
                        value = `${element.id},${name}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kec").html(hasilAkhir);
                }
            })
            
        })
        $("body").on("change","#form_kec",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan="+id,
                ajaxSend: function(){
                    hasilAkhir.push("<option value=''>--Kelurahan--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                },
                success: function(hasil){
                    hasil = hasil.kelurahan
                    hasilAkhir = []
                    hasil.forEach(element => {
                        var name = element.nama
                        value = `${element.id},${name}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kel").html(hasilAkhir);
                }
            })
            
        })
    })
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
            success: function(hasil){
                hasil = hasil.provinsi
                hasilAkhir = []
                hasilAkhir.push("<option value=''>--Provinsi--</option>");
                hasil.forEach(element => {
                    var name = element.nama
                        value = `${element.id},${name}`
                    hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                });
                $("#form_prov_dom").html(hasilAkhir);
            }
        })
        $("body").on("change","#form_prov_dom",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+id,
                ajaxSend: function(){
                    hasilAkhir.push("<option value=''>--Kabupaten/Kota--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                },
                success: function(hasil){
                    hasil = hasil.kota_kabupaten
                    hasilAkhir = []
                    hasil.forEach(element => {
                        var name = element.nama
                        value = `${element.id},${name}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kab_dom").html(hasilAkhir);
                }
            })
            
        })
        $("body").on("change","#form_kab_dom",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota="+id,
                ajaxSend: function(){
                    hasilAkhir.push("<option value=''>--Kecamatan--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                },
                success: function(hasil){
                    hasil = hasil.kecamatan
                    hasilAkhir = []
                    hasil.forEach(element => {
                        var name = element.nama
                        value = `${element.id},${name}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kec_dom").html(hasilAkhir);
                }
            })
            
        })
        $("body").on("change","#form_kec_dom",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan="+id,
                ajaxSend: function() {
                    hasilAkhir.push("<option value=''>--Kelurahan--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                },
                success: function(hasil){
                    hasil = hasil.kelurahan
                    hasilAkhir = []
                    hasil.forEach(element => {
                        var name = element.nama
                        value = `${element.id},${name}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kel_dom").html(hasilAkhir);
                }
            })
            
        })
    })
</script>
<script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderSequence:['asc']},
                {data: 'nomor_ba', name: 'nomor_ba', orderSequence:['asc']},
                {data: 'nama_lengkap', name: 'nama_lengkap', orderSequence:['asc']},
                {data: 'jenis_kelamin', name: 'jenis_kelamin', orderSequence:['asc']},
                {data: 'tanggal_lahir', name: 'tanggal_lahir', orderSequence:['asc']},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('body').on('click', '.editAkun', function () {
        var id_akun = $(this).data('id');
        $.get("cif_anggota" +'/' + id_akun +'/edit', function (data) {
            $('form').attr("action","cif_anggota/"+id_akun+"/edit");
            $('form').append("<input class='methodPut' id='methodPut' type='hidden' name='_method' value='PUT'>")
            $('#myLargeModalLabel').html("Edit Data CIF Anggota");
            $('#modal-tambah-datacif').modal('show');
            $('#cari').css('display','none');
            $('#no_ba').val(data.nomor_ba);
            $('#no_ba').attr("readonly","readonly");
            $('#fullNameAdd').val(data.nama_lengkap);
            $('#noHpAdd').val(data.no_hp);
            $('#emailAdd').val(data.email);
            $('#noKtp').val(data.no_ktp);
            $(`#jenis_kelamin option[value=${data.jenis_kelamin}]`).attr('selected','selected');
            $('#tempat_lahir').val(data.tempat_lahir);
            $('#tanggal_lahir').val(data.tanggal_lahir);
            $(`#status_nikah option[value=${data.nikah}]`).attr('selected','selected');
            $('#npwp').val(data.no_npwp);
            $('#alamat_ktp').val(data.alamat_ktp);
            $(`#form_prov option[value='${data.provinsi_ktp}']`).prop('selected',true);
            $(`#form_kab option[value='${data.kota_ktp}]'`).prop('selected',true);
            $(`#checkAlamatTinggal option[value='${data.alamat_tinggal}']`).prop('selected',true);
            if(data.alamat_tinggal == "tidakSesuai"){
                $('.domisili').show();
            }
            var image = data.foto_ktp;
            if(image != null){
                var result = "/images/data_penting/ktp/"+image;
                $(`#show_foto_ktp`).attr('src',result);
                $('#div-foto-ktp').css("display","block");
            }
            $('body').on('click','.btn-close',function() {
                $('form').attr("action","cif_anggota");
                $('input').remove('.methodPut');
                $('#myLargeModalLabel').html("Tambah Data CIF Anggota");
                $('#cari').css('display','block');
                $('#no_ba').val('');
                $('#fullNameAdd').val('');
                $('#noHpAdd').val('');
                $('#emailAdd').val('');
                $('#noKtp').val('');
                $(`#jenis_kelamin option[value=${data.jenis_kelamin}]`).attr('selected','');
                $('#tempat_lahir').val('');
                $('#tanggal_lahir').val('');
                 $('#no_ba').removeAttr("readonly");
                $(`#status_nikah option[value=${data.nikah}]`).attr('selected','');
                $('#npwp').val('');
                $('#alamat_ktp').val('');
                $(`#form_prov option[value='${data.provinsi_ktp}']`).prop('selected',false);
                $(`#form_kab option[value='${data.kota_ktp}]'`).prop('selected',false);
                $(`#checkAlamatTinggal option[value='${data.alamat_tinggal}']`).prop('selected',false);
                $('.domisili').hide();
            });
        })
        });
        $('body').on('click', '.viewAkun', function () {
        var id_akun = $(this).data('id');
        $.get("cif_anggota" +'/' + id_akun +'/edit', function (data) {
            $('#modal-view-anggota').modal("show");
            $('#no_ba_view').text(data.nomor_ba);
            $('#nama_lengkap_view').text(data.nama_lengkap);
            $('#no_hp_view').text(data.no_hp);
            $('#email_view').text(data.email);
            $('#no_ktp_view').text(data.no_ktp);
            $(`#jenis_kelamin_view`).text(data.jenis_kelamin);
            $('#tempat_lahir_view').text(data.tempat_lahir);
            $('#tanggal_lahir_view').text(data.tanggal_lahir);
            $(`#status_nikah_view`).text(data.status_nikah);
            $('#npwp').text(data.no_npwp);
            $('#alamat_ktp_view').text(data.alamat_ktp);
            $('#kelurahan_view').text(data.kelurahan_ktp);
            $('#kecamatan_view').text(data.kecamatan_ktp);
            $('#kota_view').text(data.kotat_ktp);
            $('#provinsi_view').text(data.provinsi_ktp);
            $('#alamat_tinggal_view').text(data.alamat_tinggal);
            $('#alamat_domisili_view').text(data.alamat_domisili);
            $('#kelurahan_domisili_view').text(data.kelurahan_domisili);
            $('#kecamatan_domisili_view').text(data.kecamatan_domisili);
            $('#kota_domisili_view').text(data.kota_domisili);
            $('#provinsi_domisili_view').text(data.provinsi_domisili);
            var image = data.foto_ktp;
            if(image != null){
                var result = "/images/data_penting/ktp/"+image;
                $(`#show_foto_ktp_view`).attr('src',result);
            }
        })
        });
        $('#cari').click(function(e){
            e.preventDefault();
            $(this).html('Mencari...');
            var no_ba = $('#no_ba').val();
            $.get("cif_anggota/" +'cari/' + no_ba, function (data,e) {
                $(this).html('Ditemukan');
                $('#fullNameAdd').val(data.nama_lengkap);
                $('#noHpAdd').val(data.no_hp);
                $('#emailAdd').val(data.email);
                $('#cari').html('Cari');
            });
        });
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
            var form = document.getElementById('CustomerForm');
            var data = new FormData();
            data.append('username', 'Chris');
            // var files = $('#file_ktp')[0].files;
            // data.append('file_ktp',files[0]);
            $.ajax({
                data: $('#CustomerForm').serialize(),
                url: "",
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('input[type="hidden"]').val()
                },
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#CustomerForm').trigger("reset");
                    $(this).html('Cari');
                    $('#modal-tambah-datacif').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    $('#saveBtn').html('Save Changes');
                }
            });
        });
    });
    </script>
    <script>
        $('body').on('click', '.printAkun', function () {
        var id_akun = $(this).data('id');
        $.get("cif_anggota" +'/' + id_akun +'/edit', function (data) {
            $('#no_ba_print').text(':  ' + data.nomor_ba);
            $('#nama_lengkap_print').text(':  ' + data.nama_lengkap);
            $('#no_hp_print').text(':  ' + data.no_hp);
            $('#email_print').text(':  '+ data.email);
            $('#no_ktp_print').text(':  '+ data.no_ktp);
            $(`#jenis_kelamin_print`).text(':  '+ data.jenis_kelamin);
            $('#tempat_lahir_print').text(':  '+ data.tempat_lahir);
            $('#tanggal_lahir_print').text(':  '+ data.tanggal_lahir);
            $(`#status_nikah_print`).text(':  '+ data.status_nikah);
            $('#no_npwp_print').text(':  '+ data.no_npwp);
            $('#alamat_ktp_print').text(':  '+ data.alamat_ktp);
            $('#kelurahan_print').text(':  '+ data.kelurahan_ktp);
            $('#kecamatan_print').text(':  '+ data.kecamatan_ktp);
            $('#kota_print').text(':  '+ data.kotat_ktp);
            $('#provinsi_print').text(':  '+ data.provinsi_ktp);
            $('#alamat_tinggal_print').text(':  '+ data.alamat_tinggal);
            $('#alamat_domisili_print').text(':  '+ data.alamat_domisili);
            $('#kelurahan_domisili_print').text(':  '+ data.kelurahan_domisili);
            $('#kecamatan_domisili_print').text(':  '+ data.kecamatan_domisili);
            $('#kota_domisili_print').text(':  '+ data.kota_domisili);
            $('#provinsi_domisili_print').text(':  '+ data.provinsi_domisili);
            var image = data.foto_ktp;
            if(image != null){
                var result = "/images/data_penting/ktp/"+image;
                $(`#print_foto_ktp_print`).attr('src',result);
            }
            cif_print();
        })
        });

        function cif_print(){
	var divContents = document.getElementById("cif_print").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>'); 
        a.document.write('<head>');
        a.document.write('<link href="{{ URL::asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>');
        a.document.write('</head>');   
        a.document.write('<body>');
    
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
      

        a.onload=function(){ // necessary if the div contain images

a.focus(); // necessary for IE >= 10
a.print();
a.close();
};
 }
    </script>
@endpush
@endsection
