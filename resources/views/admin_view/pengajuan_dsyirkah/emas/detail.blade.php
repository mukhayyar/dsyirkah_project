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
                                            <li class="breadcrumb-item active">Aproval Pengajuan Emas</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Aproval Pengajuan Emas</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="modal-header" style="background-color: goldenrod">
                                        <h4 class="title" style="color: rgb(255, 255, 255);" id="data-pengajuan-emas">Data Pengajuan D'Syirkah Emas</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="row mb-2">
                                            <div class="col-4">
                                                <input type="button" onclick="printData()" class="btn btn-success mb-2" value="Print" />
                                            </div>
                                            <div class="col-4">
                                                <a href="javascript:history.back()" class="btn btn-info mb-2"><i class="mdi mdi-arrow-left-bold-circle-outline"></i> Kembali</a>
                                            </div>
                                            <div class="col-4">
                                                <a href="" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modal-view-pemohon"><i class="mdi mdi-card-search-outline"></i> Detail Pemohon</a>
                                            </div><hr> 
                                        </div>
                                        <div id="areaPrint">
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
                                                                <td>Tanggal Pengajuan</td>
                                                                <td>: 12 April 2022 13:00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nomor Pengajuan</td>
                                                                <td>: G-123456-MQ </td>
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
                                                                <td>Total Gramasi</td>
                                                                <td>: 20 Gram</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div><br>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="table-responsive">
                                                                <h5>Rincian</h5>
                                                                <table class="table mb-0">
                                                                    <thead class="table-light">
                                                                    <tr>
                                                                        <th>Item</th>
                                                                        <th>Jenis</th>
                                                                        <th>Gramasi</th>
                                                                        <th>Keping</th>
                                                                        <th>Jumlah</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>Gold 0.1 Gram</td>
                                                                        <td>
                                                                            <span class="badge badge-primary-lighten">Reguler</span>
                                                                        </td>
                                                                        <td>0.1</td>
                                                                        <td>50</td>
                                                                        <td>5 Gram</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Gold 1 Gram</td>
                                                                        <td>
                                                                            <span class="badge badge-primary-lighten">Reguler</span>
                                                                        </td>
                                                                        <td>1</td>
                                                                        <td>6</td>
                                                                        <td>6 Gram</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Gold 5 Gram</td>
                                                                        <td>
                                                                            <span class="badge badge-info-lighten">Series IS</span>
                                                                        </td>
                                                                        <td>5</td>
                                                                        <td>1</td>
                                                                        <td>5 Gram</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Gold 2 Gram</td>
                                                                        <td>
                                                                            <span class="badge badge-success-lighten">SeriesIF</span>
                                                                        </td>
                                                                        <td>2</td>
                                                                        <td>2</td>
                                                                        <td>4 Gram</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
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
                                                        <div class="col-lg-11">
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="card border-secondary border">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Catatan :</h5>
                                                                    <p class="card-text">Catatan Dari form pengajuan</p>
                                                                </div> <!-- end card-body-->
                                                            </div> <!-- end card-->
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="card border-secondary border">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Tandatangan :</h5>
                                                                    <p class="card-text">Tandtangan Dari Form</p>
                                                                </div> <!-- end card-body-->
                                                            </div> <!-- end card-->
                                                        </div>
                                                    </div>
                                                    <div slass="row">
                                                        <div class="col-lg-11">
                                                            <div class="card border-danger border">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Catatan Edit :</h5>
                                                                    <p class="card-text">di tabel aktif  munculkan keterangan singkat</p>
                                                                </div> <!-- end card-body-->
                                                            </div> <!-- end card-->
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

                    <!-- Warning Alert Modal -->
                    <div id="warning-aprove-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1 text-warning"></i>
                                        <h4 class="mt-2">Perhatian</h4>
                                        <p class="mt-3">Data pengajuan An. XXXXXXX tanggal PengajuanXXXXX Akan di <strong>Setujui</strong></p>
                                        <p> Silakan klik <strong>Aprov</strong> jika sudah yakin</p>
                                        <button type="button" class="btn btn-success my-2" data-bs-dismiss="modal">Aprov</button>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>

                    <div id="warning-riject-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content modal-filled bg-danger">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1 text-warning"></i>
                                        <h4 class="mt-2">Perhatian</h4>
                                        <p class="mt-3">Data pengajuan An. XXXXXXX tanggal PengajuanXXXXX Akan di <strong>Riject</strong></p>
                                        <p> Silakan klik <strong>Riject</strong> jika sudah yakin</p>
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Riject</button>
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
                                            <h4 class="font-14"><strong>: </strong>Mukhammad Nasorudin Maulana</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Nomor Hp</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <h4 class="font-14"><strong>: </strong>081228383733894</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Email</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <h4 class="font-14"><strong>: </strong>nasorudin@gmail.com</h4>
                                        </div><hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Nomor KTP</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <h4 class="font-14"><strong>: </strong>72468376825439868435</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Jenis Kelamin</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <h4 class="font-14"><strong>: </strong>Laki-Laki</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Tempat Lahir</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <h4 class="font-14"><strong>: </strong>Jakarta</h4>
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

                </div> <!-- content -->
@push('scripts')
<script>
    function printData() {
        var divContents = document.getElementById("areaPrint").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write('<body>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>
@endpush
@endsection