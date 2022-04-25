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
                        <!-- Modal Tambah Data-->
                        <div class="modal fade" id="modal-tambah-datacif" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document"">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #afb4be">
                                        <h4 class="modal-title" style="color: rgb(255, 255, 255);" id="myLargeModalLabel">Tambah Data CIF Anggota</h4>
                                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="CustomerForm" name="CustomerForm" method="POST" action="/admin/master/cif_anggota">
                                            @csrf
                                            <h5>Data Akun</h5><hr>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label class="form-label">Nomor BA</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Cari Nomor BA" aria-label="Recipient's username" id="no_ba" name="no_ba">
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
                                                <select class="form-select" id="checkAlamatTinggal" required>
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
                                                </div><hr><br>
                                            </div><hr><br>

                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Upload Foto KTP</label>
                                                <input class="form-control" type="file" id="file_ktp" name="file_ktp">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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
            url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
            success: function(hasil){
                hasil = hasil.provinsi
                hasilAkhir = []
                hasilAkhir.push("<option value=''>--Provinsi--</option>");
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
                    hasilAkhir.push("<option value=''>--Kabupaten/Kota--</option>");
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
                    hasilAkhir.push("<option value=''>--Kecamatan--</option>");
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
                    hasilAkhir.push("<option value=''>--Kelurahan--</option>");
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
            url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
            success: function(hasil){
                hasil = hasil.provinsi
                hasilAkhir = []
                hasilAkhir.push("<option value=''>--Provinsi--</option>");
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
                    hasilAkhir.push("<option value=''>--Kabupaten/Kota--</option>");
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
                    hasilAkhir.push("<option value=''>--Kecamatan--</option>");
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
                    hasilAkhir.push("<option value=''>--Kelurahan--</option>");
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
<script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nomor_ba', name: 'nomor_ba'},
                {data: 'nama_lengkap', name: 'nama_lengkap'},
                {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('body').on('click', '.editCustomer', function () {
        var Customer_id = $(this).data('id');
        $.get("" +'/' + Customer_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Customer");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#Customer_id').val(data.id);
            $('#name').val(data.name);
            $('#detail').val(data.detail);
        })
        });
        $('#cari').click(function(e){
            e.preventDefault();
            $(this).html('Mencari...');
            var no_ba = $('#no_ba').val();
            console.log($('#no_ba').val());
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
            console.log(data);
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
                    $('#modal-tambahdata').modal('hide');
                    table.draw();
                    $(this).html('Cari');
                    $('#modal-tambah-datacif').modal('hide');
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });
        $('body').on('click', '.deleteCustomer', function () {
            var Customer_id = $(this).data("id");
            confirm("Are You sure want to delete !");
            $.ajax({
                type: "DELETE",
                url: ""+'/'+Customer_id,
                headers: {
                'X-CSRF-TOKEN': $('input[type="hidden"]').val()
                },
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });
    </script>
@endpush
@endsection
