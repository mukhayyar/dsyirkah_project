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
                                            <li class="breadcrumb-item active">View Pengajuan Rupiah</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">View Pengajuan Rupiah</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="modal-header bg-success">
                                        <h4 class="title" style="color: rgb(255, 255, 255);" id="data-pengajuan-emas">Data Pengajuan D'Syirkah Emas</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="row mb-2">
                                            <div class="col-4">
                                                <input type="button" onclick="printData()" class="btn btn-success mb-2" value="Print">
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
                                                                <td>: {{ucfirst($pengajuan->pilihan_program)}}</td>
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
                                                                            {{$pengajuan->persetujuan()}}
                                                                        </li>
                                                                    </ul></p>
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
                                                                    <img src="/images/data_penting/tanda_tangan/{{$pengajuan->ttd}}" alt="image" class="img-fluid rounded" height="100" width="150"/><br>
                                                                </div> <!-- end card-body-->
                                                            </div> <!-- end card-->
                                                        </div>
                                                    </div>
                                                    <div slass="row">
                                                        <div class="col-lg-11">
                                                            <div class="card border-danger border">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Catatan Edit :</h5>
                                                                    <p class="card-text">{{$pengajuan->catatan_edit}}</p>
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
<div id="pengajuan_rp_print">
<div class="row">
        <div class="col">
            <div class="headlabel">
            <h4> KPPS SIMPUL BERKAH SINERGI</h4>
<p class="subheadlabel">013865/BH/M.KUKM.2/VII/2019</p>
            </div>

        </div>
        <div class="col">
            <img src="{{asset('images/logo-simpul.png')}}"  width="50%"  class="logo-center" alt="">
        </div>
    </div>
    <div>
        <center>
        <p class="subheadlabel">Pengajuan Simpanan Berjangka D???Syirkah</p>
        </center>
        <center>
        <p class="subheadlabel">Simpanan Berjangka D???Syirkah</p>
            </center>
        
            <hr style="border-top: 1px solid;">
    <div class="row">
        <div class="col-4">
            <p class="font-14"><strong>Nomor Buku Anggota :</strong> {{$pengajuan->anggota->nomor_ba}}</p>
        </div>
        <div class="col-4">
            <p class="font-14"><strong>Nama Lengkap :</strong> {{$pengajuan->anggota->nama_lengkap}}</p>
        </div>
    </div>
    <hr style="border-top: 1px solid;">
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-6">
                    <p class="font-14"><strong>Tanggal Pengajuan</strong></p>
                </div>
                <div class="col-6">
                    <p class="font-14">: {{date('Y-m-d h:i',strtotime($pengajuan->created_at))}} </p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p class="font-14"><strong>Nomor Pengajuan</strong></p>
                </div>
                <div class="col-6">
                    <p class="font-14">: {{$pengajuan->no_pengajuan}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p class="font-14"><strong>Referensi</strong></p>
                </div>
                <div class="col-6">
                    <p class="font-14">: {{$pengajuan->referensi}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p class="font-14"><strong>Pilihan Program</strong></p>
                </div>
                <div class="col-6">
                    <p class="font-14">: {{ucfirst($pengajuan->pilihan_program)}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p class="font-14"><strong>Jenis Syirkah</strong></p>
                </div>
                <div class="col-6">
                    <p class="font-14">: {{$pengajuan->jenis_syirkah}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p class="font-14"><strong>Versi Syirkah</strong></p>
                </div>
                <div class="col-6">
                    <p class="font-14">: {{$pengajuan->versi->versi}}</p>
                </div>
            </div>
            @if($pengajuan->kode_usaha)
            <div class="row">
                <div class="col-6">
                    <p class="font-14"><strong>Kode Usaha</strong></p>
                </div>
                <div class="col-6">
                    <p class="font-14">: {{$pengajuan->kode_usaha}}</p>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <p class="font-14"><strong>Nisbah</strong></p>
                </div>
                <div class="col-6">
                    <p class="font-14">: {{$pengajuan->nisbah}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p class="font-14"><strong>Alokasi Nisbah</strong></p>
                </div>
                <div class="col-6">
                    <p class="font-14">: {{$pengajuan->alokasi_nisbah}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p class="font-14"><strong>Perpanjangan</strong></p>
                </div>
                <div class="col-6">
                    <p class="font-14">: {{$pengajuan->perpanjangan}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p class="font-14"><strong>Nominal</strong></p>
                </div>
                <div class="col-6">
                    <p class="font-14">: {{$pengajuan->nominal}}</p>
                </div>
            </div>
        </div>
       
        <div class="col-6">
            <div class="col-4">
                <p class="font-14"><strong>Bukti Transfer</strong></p>
            </div>
            <img src="/images/data_penting/bukti_transfer/{{$pengajuan->bukti_transfer}}" alt="image"
                class="img-fluid rounded" width="150" /><br>
        <br>
            <h5 class="card-title">Persetujuan :</h5>
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
                                Simpanan Berjangka Dsyirkah minimal 100 Gram dengan jangka waktu 12 Bulan Mendapatkan
                                Hadiah 1 Gram Gold /??100 Gram dengan jangka waktu 24 Bulan Mendapatkan Hadiah 2 Gram
                                Gold
                            </li>
                            <li>
                                Saya siap mengembalikan hadiah jika tidak sesuai dengan akad.
                            </li>
                        </ul>
                        <center>Tergantung Dari pilihan Form</center>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div>
        <br>

        <hr style="border-top: 1px solid;">
        <div class="row">
            <div class="col-6">
                <div class="card border-secondary border">
                    <div class="card-body">
                        <h5 class="card-title">Catatan :</h5>
                        <p class="card-text">{{$pengajuan->catatan_pengajuan}}</p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
            <div class="col-6">
                <div class="card border-secondary border">
                    <div class="card-body">
                        <h5 class="card-title">Catatan Edit :</h5>
                        <p class="card-text">{{$pengajuan->catatan_edit}}</p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->

            </div>
        </div>
        <div slass="row">
            <div class="col">
                <div class="card border-danger border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                            <h5 class="card-title">Tandatangan :</h5>
                            </div>
                            <div class="col-6">
                            <img src="/images/data_penting/tanda_tangan/{{$pengajuan->ttd}}" alt="image" 
                            class=""  width="100" height="75"/><br>
                            </div>
                        </div>
                        
                        
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
        </div>
    </div>

</div>
</div>
                <!-- end print -->
@push('scripts')
<script>
    function printData() {
        var divContents = document.getElementById("pengajuan_rp_print").innerHTML;
        var a = window.open('', '', 'height=600, width=600');
        a.document.write('<html>');
        a.document.write('<head>');
        a.document.write('<style> table tr th{width:120px;border-bottom:1px solid gray;border-collapse: collapse;}</style>');
        a.document.write('<link href="{{ URL::asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/><style>.logo-center { display: block;margin-left: auto;margin-right: auto; width: 40%;} </style>');
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
