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
                            <a onclick="history.back()" class="btn btn-info mb-2"><i class="mdi mdi-arrow-left-bold-circle-outline"></i> Kembali</a>
                        </div>
                        <div class="col-4">
                            <a href="" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modal-view-pemohon"><i class="mdi mdi-card-search-outline"></i> Detail Pemohon</a>
                        </div><hr> 
                    </div>
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
                                            <td>Tanggal Persetujuan</td>
                                            <td>: {{$pengajuan->perpanjangan_rupiah->get(0)->tgl_akad_baru}}</td>
                                        </tr>
                                        <tr>
                                            <td>Kode DSyirkah</td>
                                            <td>: {{$pengajuan->no_pengajuan}} </td>
                                        </tr>
                                        <tr>
                                            <td>Kode Sertifikat</td>
                                            <td>: {{$pengajuan->no_pengajuan}}</td>
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
                                            <td>Jangka Waktu</td>
                                            <td>: {{$pengajuan->jangka_waktu()}}</td>
                                        </tr>
                                        <tr>
                                            <td>Jatuh Tempo</td>
                                            <td>: {{$pengajuan->perpanjangan_rupiah()->orderBy("jatuh_tempo_akan_datang","desc")->first()->jatuh_tempo_akan_datang}}</td>
                                        </tr>
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
                                            <td>Nominal</td>
                                            <td>: {{$pengajuan->nominal()}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <div class="col-lg-6">
                                <div class="col-4">
                                    <p class="font-14"><strong>Bukti Transfer</strong></p>
                                </div>
                                <img src="/images/data_penting/bukti_transfer/{{$pengajuan->bukti_transfer}}" alt="image" class="img-fluid rounded" width="600"/><br>
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
                                                    @foreach($pengajuan->perpanjangan_rupiah as $perpanjangan)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$perpanjangan->jatuh_tempo_sebelumnya}}</td>
                                                        <td>{{$perpanjangan->tgl_akad_baru}}</td>
                                                        <td>{{$perpanjangan->jangka_waktu}}</td>
                                                        <td>{{$perpanjangan->jatuh_tempo_akan_datang}}</td>
                                                        <td>{{$perpanjangan->nisbah}}</td>
                                                        <td>{{$perpanjangan->status}}</td>
                                                    </tr>
                                                    @endforeach
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
@endsection