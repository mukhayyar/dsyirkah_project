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
                        <li class="breadcrumb-item active">Tindaklanjut Rupiah</li>
                    </ol>
                </div>
                <h4 class="page-title">Tindaklanjut Rupiah</h4>
            </div>
        </div>
    </div>
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="modal-header bg bg-success">
                    <h4 class="title" style="color: rgb(255, 255, 255);" id="data-pengajuan-emas">Tindaklanjut Rupiah</h4>
                </div>
                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col-4">
                            <a class="btn btn-success mb-2"><i class="mdi mdi-printer"></i>Print</a>
                        </div>
                        <div class="col-4">
                            <a href="aktif-rupiah.html" class="btn btn-info mb-2"><i class="mdi mdi-arrow-left-bold-circle-outline"></i> Kembali</a>
                        </div>
                        <div class="col-4">
                            <a href="" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modal-view-pemohon"><i class="mdi mdi-card-search-outline"></i> Detail Pemohon</a>
                        </div><hr> 
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="font-14"><strong>Nomor Buku Anggota :</strong> 0.123.1234567</p>
                        </div>
                        <div class="col-sm-4">
                            <p class="font-14"><strong>Nama Lengkap :</strong> Mukhammad Nasorudin Maulana</p>
                        </div><hr>
                    </div>

                    <div class="" data-simplebar style="max-height: 500px;">
                        
                        <div class="row">
                            <div class="col-lg-6 card">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th style="width: 35%;"></th>
                                        <th style="width: 65%;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Tanggal Persetujuan</td>
                                        <td>: 12 April 2022 13:00</td>
                                    </tr>
                                    <tr>
                                        <td>Kode DSyirkah</td>
                                        <td>: G-123456-MQ </td>
                                    </tr>
                                    <tr>
                                        <td>Kode Sertifikat</td>
                                        <td>: Kode Sertifikat</td>
                                    </tr>
                                    <tr>
                                        <td>Referensi</td>
                                        <td>: KP Jakarta</td>
                                    </tr>
                                    <tr>
                                        <td>Pilihan Program</td>
                                        <td>: Reguler</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Syirkah</td>
                                        <td>: Mutlaqah</td>
                                    </tr>
                                    <tr>
                                        <td>Versi Syirkah</td>
                                        <td>: 3.0</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Usaha</td>
                                        <td>: MQ-123-12345 (jika Muqoyyadah)</td>
                                    </tr>
                                    <tr>
                                        <td>Jangka Waktu</td>
                                        <td>: 3 Bulan</td>
                                    </tr>
                                    <tr>
                                        <td>Jatuh Tempo</td>
                                        <td>: 13 Juli 2022</td>
                                    </tr>
                                    <tr>
                                        <td>Nisbah</td>
                                        <td>: Anggota 50%:50%Club</td>
                                    </tr>
                                    <tr>
                                        <td>Alokasi Nisbah</td>
                                        <td>: Nisbah semua dimasukkan ke Simpanan Berkah</td>
                                    </tr>
                                    <tr>
                                        <td>Perpanjangan</td>
                                        <td>: Otomatis</td>
                                    </tr>
                                    <tr>
                                        <td>Nominal/td>
                                        <td>: Rp 500.00,-</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <div class="col-lg-6">
                                <div class="col-4">
                                    <p class="font-14"><strong>Bukti Transfer</strong></p>
                                </div>
                                <img src="assets/images/small/small-2.jpg" alt="image" class="img-fluid rounded" width="600"/><br>
                                <br><div class="card border-info border">
                                    <div class="card-body">
                                        <h5 class="card-title">Persetujuan :</h5>
                                        <p class="card-text">
                                            <ul class="ul-number">
                                                <li>
                                                    Simpanan berjangka dengan akad Mudharabah Muthlaqah
                                                </li>
                                                <li>
                                                    Simpanan berjangka ini tidak dapat dicairkan sebelum tanggal jatuh tempo</li>
                                                <li>
                                                    Simpanan Berjangka Dsyirkah minimal 100 Gram dengan jangka waktu 12 Bulan Mendapatkan Hadiah 1 Gram Gold / 100 Gram dengan jangka waktu 24 Bulan Mendapatkan Hadiah 2 Gram Gold
                                                </li>
                                                <li>
                                                    Saya siap mengembalikan hadiah jika tidak sesuai dengan akad.
                                                </li>
                                            </ul>
                                        Tergantung Dari pilihan Form</p>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                                
                            </div><br>
                            <div slass="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <h5>Rincian Perpanjangan</h5>
                                            <table class="table mb-0">
                                                <thead class="table-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jatuhtempo Sebelumnya</th>
                                                    <th>Tgl Akad Baru</th>
                                                    <th>Jangka Waktu</th>
                                                    <th>Jatuhtempo Akandatang</th>
                                                    <th>Nisbah</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>-</td>
                                                    <td>12 April 2021</td>
                                                    <td>3 Bulan</td>
                                                    <td>12 Juli 2021</td>
                                                    <td>Anggota 50%:50%Club</td>
                                                    <td>Pengajuan / Aproved </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>12 Juli 2021</td>
                                                    <td>12 Juli 2022</td>
                                                    <td>12 Bulan</td>
                                                    <td>12 Juli 2022</td>
                                                    <td>Anggota 50%:50%Club</td>
                                                    <td>Pengajuan / Aproved </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>

                   
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
<!-- Modal -->
<div class="modal fade" id="modal-tambah-dataperpanjangan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg loading authentication-bg">
        <div class="modal-content bg-transparent">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-7 col-lg-5">
                        <div class="card">
                            <!-- Logo-->
                            <div class="modal-header" style="background-color: #afb4be">
                                <div style="color: rgb(255, 255, 255);"><h4>Tambah Data Perpanjangan</h4></div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="card-body p-4">
                                <form action="#">
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Jatuh Tempo Sebelumnya</label>
                                        <input class="form-control" type="date" placeholder="dd/mm/yyyy" id="fullname" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Tanggal Akad Baru</label>
                                        <input class="form-control" type="date" placeholder="dd/mm/yyyy" id="fullname" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Jangka Waktu (dalam Bulan)</label>
                                        <input class="form-control" type="number" id="fullname"  required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Jatuh Tempo Akan Datang</label>
                                        <input class="form-control" type="date" placeholder="dd/mm/yyyy" id="fullname" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Nisbah</label>
                                        <input class="form-control" type="text" id="fullname"  required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Status</label>
                                        <select class="form-select" id="example-select">
                                            <option>Pengajuan</option>
                                            <option>Aproved</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3 text-center" >
                                        <button class="btn btn-primary" type="submit"> Simpan </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        </div>
        <!-- end page -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Warning Alert Modal -->
<div id="warning-simpanpersetujuan-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-warning h1 text-warning"></i>
                    <h4 class="mt-2">Perhatian</h4>
                    <p class="mt-3">Data Perpanjangan An. XXXXXXX tanggal PengajuanXXXXX Akan di <strong>Simpan</strong></p>
                    <p> Silakan klik <strong>Simpan</strong> jika sudah yakin</p>
                    <button type="button" class="btn btn-success my-2" data-bs-dismiss="modal">Simpan</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="warning-stop-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content modal-filled bg-danger">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-warning h1 text-warning"></i>
                    <h4 class="mt-2">Perhatian</h4>
                    <p class="mt-3">Data pengajuan An. XXXXXXX tanggal PengajuanXXXXX Akan di <strong>Berhentikan</strong> dalam mengikuti program DSyirkah</p>
                    <form action="#">
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Kategori</label>
                            <select class="form-select" id="example-select">
                                <option>Normal</option>
                                <option>Tidak Sesuai Akad</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Kebutuhan</label>
                            <select class="form-select" id="example-select">
                                <option>Untuk Investasi di tempat lain</option>
                                <option>Kebutuhan Harian</option>
                                <option>Pembayaran Sekolah</option>
                                <option>Pembayaran Rumah sakit</option>
                                <option>Kebutuhan Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Sebutkan (jika lainnya)</label>
                            <input class="form-control" type="text" placeholder="Sebutkan" id="fullname" required>
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Keterangan</label>
                            <input class="form-control" type="text" placeholder="" id="fullname" required>
                        </div>
                    </form>
                    <p> Silakan klik <strong>Stop</strong> jika sudah yakin</p>
                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Stop</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal view-->
<div class="modal fade" id="modal-view-pemohon" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
@endsection