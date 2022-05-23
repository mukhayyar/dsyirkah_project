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
                                            <li class="breadcrumb-item active">Edit Pengajuan Rupiah</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Edit Pengajuan Rupiah</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-12">
                                <div class="card d-block">
                                    <div class="card-header bg-success">
                                        <div class=" align-items-center mb-2 text-white">
                                            <h3>Edit Pengajuan D'Syirkah Rupiah</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="py-0">
                                            <h5>Data Pemohon</h5>
                                        </div><hr>
                                        <form action="" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label class="form-label">Nomor BA</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="{{$user->mask_nomor_ba()}}" aria-label="Recipient's username" readonly>
                                                        <input type="hidden" value="{{$user->nomor_ba}}" name="no_ba">
                                                        <input type="hidden" value="{{$user->id}}" name="anggota_id">
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nama Lengkap</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="{{$user->nama_lengkap}}" value="{{$user->nama_lengkap}}" name="nama_lengkap" readonly="">
                                                </div>
                                            </div><br>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nomor HP</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="{{$user->mask_no_hp()}}" readonly="">
                                                    <input type="hidden" value="{{$user->no_hp}}" name="no_hp">
                                                </div>
                                                <div class="col-md">
                                                    <label for="emailaddress" class="form-label">Email address</label>
                                                    <input class="form-control" type="email" id="emailaddress" placeholder="{{$user->mask_email()}}" readonly=""> 
                                                    <input type="hidden" value="{{$user->email}}" name="email">
                                                </div>
                                            </div><hr><br>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nomor Pengajuan</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="{{$generate_no}}" value="{{$generate_no}}" name="no_referensi" readonly="">
                                                </div>
                                                <div class="col-md">
                                                    <label for="emailaddress" class="form-label">Jenis Syirkah</label>
                                                    <input class="form-control" type="text" id="emailaddress" placeholder="Mutlaqah" value="Mutlaqah" readonly="" name="jenis"> 
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Versi D'Syirkah</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="{{$versi->versi}}" value="{{$versi->versi}}" readonly="" name="versi">
                                                    <input type="hidden" id="id_versi" value="{{$versi->id}}">
                                                </div>
                                                <div class="col-md">
                                                    <label for="perwada" class="form-label">Perwada</label>
                                                    <select class="form-control" type="text" id="perwada" required name="perwada">
                                                        <option value="">Pilih</option>
                                                        @foreach($perwada as $pwd)
                                                        <option value="{{$pwd->nama}}">{{$pwd->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div><hr><br>
                    
                                            <div class="row g-2">
                                                <div class="col-lg-4">
                                                    <div class="card text-white bg-success">
                                                        <div class="card-body">
                                                            <blockquote class="card-bodyquote">
                                                                <div class="col-md">
                                                                    <label for="example-select" class="form-label">Pilihan Program</label>
                                                                    <select class="form-select" id="pilihanProgram" name="pilihanProgram" required>
                                                                        <option value="" selected>Pilih</option>
                                                                        <option value="reguler">Reguler</option>
                                                                        <option value="pokokWakaf">Pokok Diwakafkan</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-md program reguler" style="display: none">
                                                                    <label for="example-select" class="form-label">Jangka Waktu (jika reg)</label>
                                                                    <select class="form-select" id="bulanPil" name="jangka_waktu">
                                                                        <option value="">Pilih</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-md program reguler" style="display: none">
                                                                    <label for="nisbahPil" class="form-label">Nisbah (sesuai dg jangka waktu)</label>
                                                                    <input class="form-control date" type="text" id="nisbahPil" name="nisbah" readonly>
                                                                </div><br>
                                                                <div class="col-md program reguler" style="display: none">
                                                                    <label for="example-select" class="form-label">Perpanjangan (jika reg)</label>
                                                                    <select class="form-select" id="example-select" name="perpanjangan">
                                                                        <option value="">Pilih</option>
                                                                        <option value="Otomatis">Otomatis</option>
                                                                        <option value="Tidak Otomatis">Tidak Otomatis</option>
                                                                    </select>
                                                                </div>
                                                            </blockquote>
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                    
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="card-head">
                                                        <h4>Nominal Yang di Syirkahkan</h4><hr>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Rp</label>
                                                            <input type="text" name="nominal" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000.000.000" data-reverse="true">
                                                            <span class="font-13 text-muted">Contoh: 100.000.000</span>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col-md text-center py-lg-3">
                                                                <a href="javascript:void(0);" class="btn mb-2 text-white bg-success" data-bs-toggle="modal" data-bs-target="#modal-tambah-perwada"><i class="mdi mdi-order-numeric-descending me-2"></i>Lihat Nomor Rekening</a>
                                                            </div>
                                                            <div class="col-md">
                                                                <label for="formFile" class="form-label">Upload Bukti Transfer</label>
                                                                <input class="form-control" type="file" id="formFile" name="buktiTransfer">
                                                            </div><hr><br>
                                                        </div>
                    
                                                    </div>
                                                    <div class="card border-primary border program reguler" style="display: none">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Persetujuan : (jika Reguler)</h5>
                                                            <p class="card-text">
                                                                <ul class="ul-number">
                                                                    <li>
                                                                         Simpanan berjangka dengan akad Mudharabah Muthlaqah
                                                                    </li>
                                                                    <li>
                                                                        Simpanan berjangka ini tidak dapat dicairkan sebelum tanggal jatuh tempo</li>
                                                                    <li>
                                                                        Simpanan Berjangka Dsyirkah minimal 100 Gram dengan jangka waktu 12 Bulan Mendapatkan Hadiah 1 Gram Gold / 100 Gram dengan jangka waktu 24 Bulan Mendapatkan Hadiah 2 Gram Gold
                                                                    </li>
                                                                    <li>
                                                                        Saya siap mengembalikan hadiah jika tidak sesuai dengan akad.
                                                                    </li>
                                                                </ul>
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                    <div class="card border-primary border program pokokWakaf" style="display: none">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Persetujuan : (jika Pokok diwakafkan)</h5>
                                                            <p class="card-text">
                                                                <ul class="ul-number">
                                                                    <li>
                                                                         Simpanan berjangka dengan akad Mudharabah Muthlaqah
                                                                    </li>
                                                                    <li>
                                                                        Simpanan berjangka ini tidak dapat dicairkan sebelum tanggal jatuh tempo</li>
                                                                    <li>
                                                                        Simpanan Berjangka Dsyirkah minimal 100 Gram dengan jangka waktu 12 Bulan Mendapatkan Hadiah 1 Gram Gold / 100 Gram dengan jangka waktu 24 Bulan Mendapatkan Hadiah 2 Gram Gold
                                                                    </li>
                                                                    <li>
                                                                        Saya siap mengembalikan hadiah jika tidak sesuai dengan akad.
                                                                    </li>
                                                                </ul>
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                    
                                                </div>
                                            </div>
                                            <div>
                                                <div class="col-lg program reguler" style="display: none">
                                                    <div class="card border-secondary border">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Alokasi Nisbah Reguler :</h5>
                                                            <div class="mt-3">
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio1" name="alokasiNisbah" value="Nisbah semua dimasukkan ke Simpanan Berkah" class="form-check-input">
                                                                    <label class="form-check-label" for="customRadio1">Nisbah semua dimasukkan ke Simpanan Berkah</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2" name="alokasiNisbah" value="Nisbah di Wakafkan 25% melalui Wakaf Peradaban ; 75% dimasukkan ke Simpanan Berkah" class="form-check-input">
                                                                    <label class="form-check-label" for="customRadio2">Nisbah di Wakafkan 25% melalui Wakaf Peradaban ; 75% dimasukkan ke Simpanan Berkah</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2" name="alokasiNisbah" value="Nisbah di Wakafkan 50% melalui Wakaf Peradaban ; 50% dimasukkan ke Simpanan Berkah" class="form-check-input">
                                                                    <label class="form-check-label" for="customRadio3">Nisbah di Wakafkan 50% melalui Wakaf Peradaban ; 50% dimasukkan ke Simpanan Berkah</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2" name="alokasiNisbah" value="Nisbah di Wakafkan 75% melalui Wakaf Peradaban ; 25% dimasukkan ke Simpanan Berkah" class="form-check-input">
                                                                    <label class="form-check-label" for="customRadio4">Nisbah di Wakafkan 75% melalui Wakaf Peradaban ; 25% dimasukkan ke Simpanan Berkah</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2" name="alokasiNisbah" value="Nisbah semua di wakafkan melalui Wakaf Peradaban" class="form-check-input">
                                                                    <label class="form-check-label" for="customRadio5">Nisbah semua di wakafkan melalui Wakaf Peradaban</label>
                                                                </div>
                                                            </div> 
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                </div>
                                                <div class="col-lg program pokokWakaf" style="display: none">
                                                    <div class="card border-secondary border">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Alokasi Nisbah Wakaf :</h5>
                                                            <div class="mt-3">
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio1" name="alokasiNisbah" value="100% sedekah" class="form-check-input">
                                                                    <label class="form-check-label" for="customRadio6">100% sedekah</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2" name="alokasiNisbah" value="40% anggota ; 60% sedekah" class="form-check-input">
                                                                    <label class="form-check-label" for="customRadio7">40% anggota ; 60% sedekah</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2" name="alokasiNisbah" value="25% anggota ; 75% sedekah" class="form-check-input">
                                                                    <label class="form-check-label" for="customRadio8">25% anggota ; 75% sedekah</label>
                                                                </div>
                                                            </div> 
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card border-secondary border">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Catatan :</h5>
                                                            <textarea name="catatan" id="" cols="70" rows="10"></textarea>
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card border-secondary border">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Tandatangan :</h5>
                                                            <br/>
                                                            <div style="border:1px solid #000000;">
                                                                <div id="sig" ></div>
                                                            </div>
                                                            <br/>
                                                            <button id="clear" class="btn btn-danger btn-sm">Hapus Tanda Tangan</button>
                                                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                </div>
                                            </div><hr>
                    
                                            <br><div class="mb-3 text-center" >
                                                <button class="btn btn-primary" type="submit"> Simpan </button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
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
                                            <p class="font-14"><strong>: {{$pengajuan->anggota->nomor_ba}}</strong> </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Nama Lengkap</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <h class="font-14"><strong>: </strong>{{$pengajuan->anggota->nama_lengkap}}</h>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Nomor Hp</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <h class="font-14"><strong>: </strong>{{$pengajuan->anggota->no_hp}}</h>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Email</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <h class="font-14"><strong>: </strong>{{$pengajuan->anggota->email}}</h>
                                        </div><hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Nomor KTP</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <h class="font-14"><strong>: </strong>{{$pengajuan->anggota->no_ktp}}</h>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Jenis Kelamin</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <h class="font-14"><strong>: </strong>{{$pengajuan->anggota->jenis_kelamin}}</h>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Tempat Lahir</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <h class="font-14"><strong>: </strong>{{$pengajuan->anggota->tempat_lahir}}</h>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Tanggal Lahir</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-14"><strong>: </strong>{{$pengajuan->anggota->tanggal_lahir}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Status Pernikahan</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-14"><strong>: </strong>{{$pengajuan->anggota->status_nikah}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Nomor NPWP</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-14"><strong>: </strong>{{$pengajuan->anggota->no_npwp}}</p>
                                        </div><hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Alamat Sesuai KTP</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-14"><strong>: </strong>{{$pengajuan->anggota->alamat_ktp}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Kecamatan</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-14"><strong>: </strong>{{$pengajuan->anggota->kecamatan_ktp}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Kota / Kabupaten</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-14"><strong>: </strong>{{$pengajuan->anggota->kota_ktp}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Provinsi</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-14"><strong>: </strong>{{$pengajuan->anggota->provinsi_ktp}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Alamat Tinggal</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-14"><strong>: </strong>{{$pengajuan->anggota->alamat_tinggal}}</p>
                                        </div>
                                    </div>
                                    @if($pengajuan->anggota->alamat_domisili)
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Alamat Tinggal Saat ini</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-14"><strong>: </strong>{{$pengajuan->anggota->alamat_domisili}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Kecamatan</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-14"><strong>: </strong>{{$pengajuan->anggota->kecamatan_domisili}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Kota / Kabupaten</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-14"><strong>: </strong>{{$pengajuan->anggota->kota_domisili}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-14"><strong>Provinsi</strong></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-14"><strong>: </strong>{{$pengajuan->anggota->provinsi_ktp}}</p>
                                        </div><hr>
                                    </div>
                                    @endif
                                    <div class="col-4">
                                        <p class="font-14"><strong>Photo KTP</strong></p>
                                    </div>
                                    <img src="/images/data_penting/ktp/{{$pengajuan->anggota->foto_ktp}}" alt="image" class="img-fluid rounded" width="600"/>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                </div> <!-- content -->
@endsection