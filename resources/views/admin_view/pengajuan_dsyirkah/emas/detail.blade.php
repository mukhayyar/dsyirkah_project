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
                                                    <p class="font-14"><strong>Nomor Buku Anggota :</strong> {{$pengajuan->anggota->nomor_ba}}</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="font-14"><strong>Nama Lengkap :</strong> {{$pengajuan->anggota->nama_lengkap}}</p>
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
                                                                <td>: {{date('Y-m-d h:i',strtotime($pengajuan->created_at))}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nomor Pengajuan</td>
                                                                <td>: {{$pengajuan->no_pengajuan}} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Referensi</td>
                                                                <td>: {{$pengajuan->referensi}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pilihan Program</td>
                                                                <td>: {{$pengajuan->pilihan_program}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jenis Syirkah</td>
                                                                <td>: {{$pengajuan->jenis_syirkah}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Versi Syirkah</td>
                                                                <td>: {{$pengajuan->versi->versi}}</td>
                                                            </tr>
                                                            @if($pengajuan->kode_usaha)
                                                            <tr>
                                                                <td>Kode Usaha</td>
                                                                <td>: {{$pengajuan->kode_usaha}}</td>
                                                            </tr>
                                                            @endif
                                                            <tr>
                                                                <td>Nisbah</td>
                                                                <td>: {{$pengajuan->nisbah}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alokasi Nisbah</td>
                                                                <td>: {{$pengajuan->alokasi_nisbah}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Perpanjangan</td>
                                                                <td>: {{$pengajuan->perpanjangan}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Gramasi</td>
                                                                <td>: {{$pengajuan->total_gramasi()}}</td>
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
                                                                    @foreach($pengajuan->rincian_pengajuan_emas as $rincian_emas)
                                                                    <tr>
                                                                        <td>{{$rincian_emas->item}}</td>
                                                                        <td>
                                                                            <span class="badge badge-primary-lighten">{{$rincian_emas->jenis}}</span>
                                                                        </td>
                                                                        <td>{{$rincian_emas->gramasi}}</td>
                                                                        <td>{{$rincian_emas->keping}}</td>
                                                                        <td>{{$rincian_emas->jumlah()}}</td>
                                                                    </tr>
                                                                    @endforeach
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
                                                                    <p class="card-text">{{$pengajuan->catatan_pengajuan}}</p>
                                                                </div> <!-- end card-body-->
                                                            </div> <!-- end card-->
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="card border-secondary border">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Tandatangan :</h5>
                                                                    <img src="/images/data_penting/tanda_tangan/{{$pengajuan->ttd}}" alt="image" class="img-fluid rounded" width="600"/>
                                                                </div> <!-- end card-body-->
                                                            </div> <!-- end card-->
                                                        </div>
                                                    </div>
                                                    <div slass="row">
                                                        <div class="col-lg-11">
                                                            <div class="card border-danger border">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Catatan Edit :</h5>
                                                                    <p class="card-text">{{$pengajuan->catatan_pengajuan}}</p>
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


<!-- print -->
<div style="display:none;">
    <div id="pengajuan_print">
<!-- atas -->
<div class="row">
    <div class="col-sm-4">
        <p class="font-14"><strong>Nomor Buku Anggota :</strong> {{$pengajuan->anggota->nomor_ba}}</p>
    </div>
    <div class="col-sm-4">
        <p class="font-14"><strong>Nama Lengkap :</strong> {{$pengajuan->anggota->nama_lengkap}}</p>
    </div>
</div>
<!-- /atas -->
<hr style="border-top: 1px solid;">
<!-- tengah -->
<div class="row">
    <!-- kiri tengah -->
    <div class="col-6">
        <div class="row">
            <div class="col-6">
                <p class="font-14"><strong>Tanggal Pengajuan</strong></p>
            </div>
            <div class="col-6">
                <p  class="font-14">: {{date('Y-m-d h:i',strtotime($pengajuan->created_at))}} </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="font-14"><strong>Nomor Pengajuan</strong></p>
            </div>
            <div class="col-6">
                <p  class="font-14">: {{$pengajuan->no_pengajuan}} </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="font-14"><strong>Referensi</strong></p>
            </div>
            <div class="col-6">
                <p  class="font-14">: {{$pengajuan->referensi}} </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="font-14"><strong>Pilihan Program</strong></p>
            </div>
            <div class="col-6">
                <p  class="font-14">: {{$pengajuan->pilihan_progam}} </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="font-14"><strong>Jenis Syirkah</strong></p>
            </div>
            <div class="col-6">
                <p  class="font-14">: {{$pengajuan->jenis_syirkah}} </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="font-14"><strong>Versi Syirkah</strong></p>
            </div>
            <div class="col-6">
                <p  class="font-14">: {{$pengajuan->versi_syirkah}} </p>
            </div>
        </div>
        @if($pengajuan->kode_usaha)
        <div class="row">
            <div class="col-6">
                <p class="font-14"><strong>Kode Usaha</strong></p>
            </div>
            <div class="col-6">
                <p  class="font-14">: {{$pengajuan->kode_usaha}} </p>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-6">
                <p class="font-14"><strong>Nisbah</strong></p>
            </div>
            <div class="col-6">
                <p  class="font-14">: {{$pengajuan->nisbah}} </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="font-14"><strong>Alokasi Nisbah</strong></p>
            </div>
            <div class="col-6">
                <p  class="font-14">: {{$pengajuan->alokasi_nisbah}} </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="font-14"><strong>Perpanjangan</strong></p>
            </div>
            <div class="col-6">
                <p  class="font-14">: {{$pengajuan->perpanjangan}} </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="font-14"><strong>Total Gramasi</strong></p>
            </div>
            <div class="col-6">
                <p  class="font-14">: {{$pengajuan->total_gramasi}} </p>
            </div>
        </div>
    </div>
    <!-- / -->
    <!-- kanan tengah -->
    <div class="col-6">
              <h5>Rincian</h5>
             
              <table> 
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Jenis</th>
                    <th>Gramasi</th>
                    <th>Keping</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pengajuan->rincian_pengajuan_emas as $rincian_emas)
                  <tr>
                    <td>{{$rincian_emas->item}}</td>
                    <td>
                      <span class="badge badge-primary-lighten">{{$rincian_emas->jenis}}</span>
                    </td>
                    <td>{{$rincian_emas->gramasi}}</td>
                    <td>{{$rincian_emas->keping}}</td>
                    <td>{{$rincian_emas->jumlah()}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <br>
              <br>
              <h5>Persetujuan :</h5>
              <div class="card border-info border">
                <div class="card-body">
                
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
                  
                      <center>Tergantung Dari pilihan Form</center>
                      
                  
                
                 </p>
                </div> <!-- end card-body-->
              </div>
          
    </div>
    <!--  -->
</div>
<!-- /tengah -->
<hr style="border-top: 1px solid;">
<!-- bawah -->
<div class="row">
    <div class="col-6">
    <div class="card border-secondary border">
            <div class="card-body">
              <h5 class="card-title">&nbsp;&nbsp;Catatan :</h5>
              <p class="card-text">{{$pengajuan->catatan_pengajuan}}</p>
            </div> <!-- end card-body-->
          </div> <!-- end card-->
        </div>
    <div class="col-6">
    <div class="card border-secondary border">
            <div class="card-body">
              <h5 class="card-title">&nbsp;&nbsp;Catatan Edit :</h5>
              <p class="card-text">{{$pengajuan->catatan_pengajuan}}</p>
            </div> <!-- end card-body-->
          </div>
    </div>
</div>
<div class="row">
    <div class="col">
    <div class="card border-secondary border">
            <div class="card-body">
              <h5 class="card-title">&nbsp;&nbsp;Tandatangan :</h5>
              <img src="/images/data_penting/tanda_tangan/{{$pengajuan->ttd}}" alt="image" class="img-fluid rounded" width="200" />
            </div> <!-- end card-body-->
          </div> <!-- end card-->
    </div>
</div>
<!-- /bawah -->
</div>
</div>
<!-- /print -->

@push('scripts')
<script>
    function printData() {
        var divContents = document.getElementById("pengajuan_print").innerHTML;
        var a = window.open('', '', 'height=600, width=600');
        a.document.write('<html>');
        a.document.write('<head>');
        a.document.write('<style> table tr th{width:120px;border-bottom:1px solid gray;border-collapse: collapse;}</style>');
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