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
                                                <a href="javascript:void(0);" class="btn btn-success mb-2"><i class="mdi mdi-database-import me-2"></i> Import</a>
                                            </div>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="scroll-horizontal-preview">
                                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td>0.123.1234567</td>
                                                            <td>Nasorudin</td>
                                                            <td>Laki-laki</td>
                                                            <td>11 November 1990</td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-view-datacif"> <i class="mdi mdi-card-search-outline"></i></a>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-edit-datacif"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>0.123.1234567</td>
                                                            <td>Nasorudin</td>
                                                            <td>Laki-laki</td>
                                                            <td>11 November 1990</td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-edit-datacif"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>0.123.1234567</td>
                                                            <td>Nasorudin</td>
                                                            <td>Laki-laki</td>
                                                            <td>11 November 1990</td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-edit-datacif"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            </td>
                                                        </tr>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> <!-- end preview-->

                                            <div class="tab-pane" id="scroll-horizontal-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;table id=&quot;scroll-horizontal-datatable&quot; class=&quot;table w-100 nowrap&quot;&gt;
                                                            &lt;thead&gt;
                                                                &lt;tr&gt;
                                                                    &lt;th&gt;No&lt;/th&gt;
                                                                    &lt;th&gt;Pengajuan&lt;/th&gt;
                                                                    &lt;th&gt;Perwada&lt;/th&gt;
                                                                    &lt;th&gt;Office&lt;/th&gt;
                                                                    &lt;th&gt;Age&lt;/th&gt;
                                                                    &lt;th&gt;Start date&lt;/th&gt;
                                                                    &lt;th&gt;Salary&lt;/th&gt;
                                                                    &lt;th&gt;Extn.&lt;/th&gt;
                                                                    &lt;th&gt;E-mail&lt;/th&gt;
                                                                &lt;/tr&gt;
                                                            &lt;/thead&gt;
                                                            &lt;tbody&gt;
                                                                &lt;tr&gt;
                                                                    &lt;td&gt;Tiger&lt;/td&gt;
                                                                    &lt;td&gt;Nixon&lt;/td&gt;
                                                                    &lt;td&gt;System Architect&lt;/td&gt;
                                                                    &lt;td&gt;Edinburgh&lt;/td&gt;
                                                                    &lt;td&gt;61&lt;/td&gt;
                                                                    &lt;td&gt;2011/04/25&lt;/td&gt;
                                                                    &lt;td&gt;$320,800&lt;/td&gt;
                                                                    &lt;td&gt;5421&lt;/td&gt;
                                                                    &lt;td&gt;t.nixon@datatables.net&lt;/td&gt;
                                                                &lt;/tr&gt;
                                                                &lt;tr&gt;
                                                                    &lt;td&gt;Garrett&lt;/td&gt;
                                                                    &lt;td&gt;Winters&lt;/td&gt;
                                                                    &lt;td&gt;Accountant&lt;/td&gt;
                                                                    &lt;td&gt;Tokyo&lt;/td&gt;
                                                                    &lt;td&gt;63&lt;/td&gt;
                                                                    &lt;td&gt;2011/07/25&lt;/td&gt;
                                                                    &lt;td&gt;$170,750&lt;/td&gt;
                                                                    &lt;td&gt;8422&lt;/td&gt;
                                                                    &lt;td&gt;g.winters@datatables.net&lt;/td&gt;
                                                                &lt;/tr&gt;
                                                            &lt;/tbody&gt;
                                                        &lt;/table&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        <!-- Modal Tambah Data-->
                        <div class="modal fade" id="modal-tambah-datacif" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document"">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #afb4be">
                                        <h4 class="modal-title" style="color: rgb(255, 255, 255);" id="myLargeModalLabel">Tambah Data CIF Anggota</h4>
                                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#">
                                            <h5>Data Akun</h5><hr>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label class="form-label">Nomor BA</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Cari Nomor BA" aria-label="Recipient's username" readonly>
                                                        <button class="btn btn-primary" type="button">Cari</button>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nama Lengkap</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="Enter your name" readonly="">
                                                </div>
                                            </div><br>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nomor HP</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="0994538574985" readonly="">
                                                </div>
                                                <div class="col-md">
                                                    <label for="emailaddress" class="form-label">Email address</label>
                                                    <input class="form-control" type="email" id="emailaddress" placeholder="Email" readonly="">
                                                </div>
                                            </div><hr><br>

                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nomor KTP</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required>
                                                </div>
                                                <div class="col-md">
                                                    <label for="example-select" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select" id="example-select" required>
                                                        <option selected>Pilih</option>
                                                        <option>Laki - Laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div><br>

                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Tempat Lahir</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required>
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Tanggal Lahir</label>
                                                    <input class="form-control date" type="date" id="fullname" placeholder="dd/mm/yyyy" required>
                                                </div>
                                            </div><br>

                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="example-select" class="form-label">Status Pernikahan</label>
                                                    <select class="form-select" id="example-select" required>
                                                        <option selected>Pilih</option>
                                                        <option>Laki - Laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nomor NPWP (Jika Punya)</label>
                                                    <input class="form-control date" type="date" id="fullname" placeholder="000000000" required>
                                                </div>
                                            </div><hr><br>

                                            <div class="col-md">
                                                <label for="fullname" class="form-label">Alamat Sesuai KTP</label>
                                                <input class="form-control date" type="text" id="fullname" placeholder="Jl. Raya Nommor:00 RT/RW" required>
                                            </div>

                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Provinsi</label>
                                                    <select class="form-control" name="provinsi" id="form_prov">
                                                        <option>--Provinsi--</option>
                                                        <option>--Data Masih Diproses--</option>
                                                    </select>
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Kota / Kabupaten</label>
                                                    <select class="form-control" name="provinsi" id="form_kab">
                                                        <option>--Kabupaten/Kota--</option>
                                                        <option>--Pilih Provinsi Terlebih Dahulu--</option>
                                                    </select>
                                                </div>
                                            </div><br>
                    
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Kecamatan</label>
                                                    <select class="form-control" name="provinsi" id="form_kec">
                                                        <option>--Kecamatan--</option>
                                                        <option>--Pilih Kabupaten Terlebih Dahulu--</option>
                                                    </select>
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Kelurahan</label>
                                                    <select class="form-control" name="provinsi" id="form_kel">
                                                        <option>--Kelurahan--</option>
                                                        <option>--Pilih Kecamatan Terlebih Dahulu--</option>
                                                    </select>
                                                </div>
                                            </div><br>
                    
                                            <div class="col-md">
                                                <label for="example-select" class="form-label">Alamat Tinggal</label>
                                                <select class="form-select" id="alamatTinggal" required>
                                                    <option value="sesuai">Sesuai KTP</option>
                                                    <option value="tidakSesuai">Tidak Sesuai KTP</option>
                                                </select>
                                            </div><br>
                    
                                            <div id="tidakSesuai" class="domisili" style="display:none">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Alamat Saat ini(domisili)</label>
                                                    <input class="form-control date" type="text" id="fullname" placeholder="Jl. Raya Nommor:00 RT/RW" required>
                                                </div>
                                                
                                                <div class="row g-2">
                                                    <div class="col-md">
                                                        <label for="fullname" class="form-label">Provinsi</label>
                                                        <select class="form-control" name="provinsi" id="form_prov_dom">
                                                            <option>--Provinsi--</option>
                                                            <option>--Data Masih Diproses--</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="fullname" class="form-label">Kota / Kabupaten</label>
                                                        <select class="form-control" name="provinsi" id="form_kab_dom">
                                                            <option>--Kabupaten/Kota--</option>
                                                            <option>--Pilih Provinsi Terlebih Dahulu--</option>
                                                        </select>
                                                    </div>
                                                </div><br>
                        
                                                <div class="row g-2">
                                                    <div class="col-md">
                                                        <label for="fullname" class="form-label">Kecamatan</label>
                                                        <select class="form-control" name="provinsi" id="form_kec_dom">
                                                            <option>--Kecamatan--</option>
                                                            <option>--Pilih Kabupaten Terlebih Dahulu--</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="fullname" class="form-label">Kelurahan</label>
                                                        <select class="form-control" name="provinsi" id="form_kel_dom">
                                                            <option>--Kelurahan--</option>
                                                            <option>--Pilih Kecamatan Terlebih Dahulu--</option>
                                                        </select>
                                                    </div>
                                                </div><hr><br>
                                            </div><hr><br>

                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Upload Foto KTP</label>
                                                <input class="form-control" type="file" id="formFile">
                                            </div><hr><br>

                                            <br><div class="mb-3 text-center" >
                                                <button class="btn btn-primary" type="submit"> Simpan </button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <!-- Modal Edit-->
                        <div class="modal fade" id="modal-edit-datacif" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document"">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #afb4be">
                                        <h4 class="modal-title" style="color: rgb(255, 255, 255);" id="myLargeModalLabel">Edit Data CIF Anggota</h4>
                                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#">
                                            <h5>Data Akun</h5><hr>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label class="form-label">Nomor BA</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Cari Nomor BA" aria-label="Recipient's username" readonly>

                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nama Lengkap</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="Enter your name" readonly="">
                                                </div>
                                            </div><br>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nomor HP</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="0994538574985" readonly="">
                                                </div>
                                                <div class="col-md">
                                                    <label for="emailaddress" class="form-label">Email address</label>
                                                    <input class="form-control" type="email" id="emailaddress" placeholder="Email" readonly="">
                                                </div>
                                            </div><hr><br>

                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nomor KTP</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required>
                                                </div>
                                                <div class="col-md">
                                                    <label for="example-select" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select" id="example-select" required>
                                                        <option selected>Pilih</option>
                                                        <option>Laki - Laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div><br>

                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Tempat Lahir</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required>
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Tanggal Lahir</label>
                                                    <input class="form-control date" type="date" id="fullname" placeholder="dd/mm/yyyy" required>
                                                </div>
                                            </div><br>

                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="example-select" class="form-label">Status Pernikahan</label>
                                                    <select class="form-select" id="example-select" required>
                                                        <option selected>Pilih</option>
                                                        <option>Laki - Laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nomor NPWP (Jika Punya)</label>
                                                    <input class="form-control date" type="date" id="fullname" placeholder="000000000" required>
                                                </div>
                                            </div><hr><br>

                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Provinsi</label>
                                                    <select class="form-control" name="provinsi" id="form_prov">
                                                        <option>--Provinsi--</option>
                                                        <option>--Data Masih Diproses--</option>
                                                    </select>
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Kota / Kabupaten</label>
                                                    <select class="form-control" name="provinsi" id="form_kab">
                                                        <option>--Kabupaten/Kota--</option>
                                                        <option>--Pilih Provinsi Terlebih Dahulu--</option>
                                                    </select>
                                                </div>
                                            </div><br>
                    
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Kecamatan</label>
                                                    <select class="form-control" name="provinsi" id="form_kec">
                                                        <option>--Kecamatan--</option>
                                                        <option>--Pilih Kabupaten Terlebih Dahulu--</option>
                                                    </select>
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Kelurahan</label>
                                                    <select class="form-control" name="provinsi" id="form_kel">
                                                        <option>--Kelurahan--</option>
                                                        <option>--Pilih Kecamatan Terlebih Dahulu--</option>
                                                    </select>
                                                </div>
                                            </div><br>
                    
                                            <div class="col-md">
                                                <label for="example-select" class="form-label">Alamat Tinggal</label>
                                                <select class="form-select" id="alamatTinggal" required>
                                                    <option value="sesuai">Sesuai KTP</option>
                                                    <option value="tidakSesuai">Tidak Sesuai KTP</option>
                                                </select>
                                            </div><br>
                    
                                            <div id="tidakSesuai" class="domisili" style="display:none">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Alamat Saat ini(domisili)</label>
                                                    <input class="form-control date" type="text" id="fullname" placeholder="Jl. Raya Nommor:00 RT/RW" required>
                                                </div>
                                                
                                                <div class="row g-2">
                                                    <div class="col-md">
                                                        <label for="fullname" class="form-label">Provinsi</label>
                                                        <select class="form-control" name="provinsi" id="form_prov_dom">
                                                            <option>--Provinsi--</option>
                                                            <option>--Data Masih Diproses--</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="fullname" class="form-label">Kota / Kabupaten</label>
                                                        <select class="form-control" name="provinsi" id="form_kab_dom">
                                                            <option>--Kabupaten/Kota--</option>
                                                            <option>--Pilih Provinsi Terlebih Dahulu--</option>
                                                        </select>
                                                    </div>
                                                </div><br>
                        
                                                <div class="row g-2">
                                                    <div class="col-md">
                                                        <label for="fullname" class="form-label">Kecamatan</label>
                                                        <select class="form-control" name="provinsi" id="form_kec_dom">
                                                            <option>--Kecamatan--</option>
                                                            <option>--Pilih Kabupaten Terlebih Dahulu--</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="fullname" class="form-label">Kelurahan</label>
                                                        <select class="form-control" name="provinsi" id="form_kel_dom">
                                                            <option>--Kelurahan--</option>
                                                            <option>--Pilih Kecamatan Terlebih Dahulu--</option>
                                                        </select>
                                                    </div>
                                                </div><hr><br>
                                            </div><hr><br>

                                            <br><div class="mb-3 text-center" >
                                                <button class="btn btn-primary" type="submit"> Simpan </button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <!-- Modal view-->
                        <div class="modal fade" id="modal-view-datacif" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document"">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #afb4be">
                                        <h4 class="modal-title" style="color: rgb(255, 255, 255);" id="myLargeModalLabel">View Data CIF Anggota</h4>
                                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Nomor Buku Anggota</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: 0.123.1234567</strong> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Nama Lengkap</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <h class="font-14"><strong>: </strong>Mukhammad Nasorudin Maulana</h>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Nomor Hp</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <h class="font-14"><strong>: </strong>081228383733894</h>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Email</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <h class="font-14"><strong>: </strong>nasorudin@gmail.com</h>
                                            </div><hr>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Nomor KTP</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <h class="font-14"><strong>: </strong>72468376825439868435</h>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Jenis Kelamin</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <h class="font-14"><strong>: </strong>Laki-Laki</h>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Tempat Lahir</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <h class="font-14"><strong>: </strong>Jakarta</h>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Tanggal Lahir</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: </strong>22 Maret 2022</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Status Pernikahan</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: </strong>Menikah</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Nomor NPWP</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: </strong>893222479238483247</p>
                                            </div><hr>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Alamat Sesuai KTP</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: </strong>Jl. Rya Raya Terusan raya nomor 3 Rt.05/01</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Kecamatan</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: </strong>Nama Kecamatan</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Kota / Kabupaten</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: </strong>Nama Kabupaten</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Provinsi</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: </strong>Nama Provinsi</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Alamat Tinggal</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: </strong>Tidak Sesuai KTP</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Alamat Tinggal Saat ini</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: </strong>Jl. Rya Raya Terusan raya nomor 3 Rt.05/01</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Kecamatan</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: </strong>Nama Kecamatan</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Kota / Kabupaten</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: </strong>Nama Kabupaten</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="font-14"><strong>Provinsi</strong></p>
                                            </div>
                                            <div class="col-8">
                                                <p class="font-14"><strong>: </strong>Nama Provinsi</p>
                                            </div><hr>
                                        </div>
                                        <div class="col-4">
                                            <p class="font-14"><strong>Photo KTP</strong></p>
                                        </div>
                                        <img src="assets/images/small/small-2.jpg" alt="image" class="img-fluid rounded" width="600"/>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    </div> <!-- container -->

                </div> <!-- content -->
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('#alamatTinggal').change(function(){
            $('.domisili').hide();
            $('#' + $(this).val()).show();
        })
    })
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi",
            success: function(hasil){
                hasil = hasil.provinsi
                hasilAkhir = []
                hasilAkhir.push("<option>--Provinsi--</option>");
                hasil.forEach(element => {
                    value = `${element.id},${element.nama}`
                    hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                });
                $("#form_prov").html(hasilAkhir);
            }
        })
        $("body").on("change","#form_prov",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            console.log(id)
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+id,
                success: function(hasil){
                    hasil = hasil.kota_kabupaten
                    hasilAkhir = []
                    hasilAkhir.push("<option>--Kabupaten/Kota--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                    hasil.forEach(element => {
                        value = `${element.id},${element.nama}`
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
            console.log(id)
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota="+id,
                success: function(hasil){
                    hasil = hasil.kecamatan
                    hasilAkhir = []
                    hasilAkhir.push("<option>--Kecamatan--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                    hasil.forEach(element => {
                        value = `${element.id},${element.nama}`
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
            console.log(id)
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan="+id,
                success: function(hasil){
                    hasil = hasil.kelurahan
                    hasilAkhir = []
                    hasilAkhir.push("<option>--Kelurahan--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                    hasil.forEach(element => {
                        value = `${element.id},${element.nama}`
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
            url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi",
            success: function(hasil){
                hasil = hasil.provinsi
                hasilAkhir = []
                hasilAkhir.push("<option>--Provinsi--</option>");
                hasil.forEach(element => {
                    value = `${element.id},${element.nama}`
                    hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                });
                $("#form_prov_dom").html(hasilAkhir);
            }
        })
        $("body").on("change","#form_prov_dom",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            console.log(id)
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+id,
                success: function(hasil){
                    hasil = hasil.kota_kabupaten
                    hasilAkhir = []
                    hasilAkhir.push("<option>--Kabupaten/Kota--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                    hasil.forEach(element => {
                        value = `${element.id},${element.nama}`
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
            console.log(id)
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota="+id,
                success: function(hasil){
                    hasil = hasil.kecamatan
                    hasilAkhir = []
                    hasilAkhir.push("<option>--Kecamatan--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                    hasil.forEach(element => {
                        value = `${element.id},${element.nama}`
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
            console.log(id)
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan="+id,
                success: function(hasil){
                    hasil = hasil.kelurahan
                    hasilAkhir = []
                    hasilAkhir.push("<option>--Kelurahan--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                    hasil.forEach(element => {
                        value = `${element.id},${element.nama}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kel_dom").html(hasilAkhir);
                }
            })
            
        })
    })
</script>
@endpush
@endsection
