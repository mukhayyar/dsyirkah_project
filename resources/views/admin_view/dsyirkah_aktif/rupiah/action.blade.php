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
                            <a class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#warning-stop-modal"><i class="mdi mdi-close-box"></i>Stop</a>
                        </div>
                        <div class="col-4">
                            <a class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#warning-simpanpersetujuan-modal"><i class="mdi mdi-file-check"></i>Simpan Perpanjangan</a>
                        </div>
                        <div class="col-4">
                            <a onclick="history.back()" class="btn btn-info mb-2"><i class="mdi mdi-arrow-left-bold-circle-outline"></i> Kembali</a>
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
                                            <td>: {{$pengajuan->versi_syirkah}}</td>
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
                                                    <th>Action
                                                        @if($pengajuan->status == "Approved")
                                                        <a href="" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-tambah-dataperpanjangan"><i class="mdi mdi-plus-box"></i></a>
                                                        @endif
                                                    </th>
                                                </tr>
                                                </thead>
                                                <form action="{{$id}}/approve" method="POST" id="form_simpan_perpanjangan">
                                                @csrf
                                                <tbody id="form_tambah_perpanjangan">
                                                    @foreach($pengajuan->perpanjangan_rupiah as $perpanjangan)
                                                    <tr>
                                                        <input type="hidden" name="pengajuan_id" value="{{$perpanjangan->pengajuan_id}}">
                                                        <td>{{$loop->index+1}}</td>
                                                        <input type="hidden" name="old_perpanjangan_id[]" value="{{$perpanjangan->id}}">
                                                        <td>{{$perpanjangan->jatuh_tempo_sebelumnya}}</td>
                                                        <input type="hidden" name="old_jatuh_tempo_sebelumnya[]" value="{{$perpanjangan->jatuh_tempo_sebelumnya}}">
                                                        <td>{{$perpanjangan->tgl_akad_baru}}</td>
                                                        <input type="hidden" name="old_tgl_akad_baru[]" value="{{$perpanjangan->tgl_akad_baru}}">
                                                        <td>{{$perpanjangan->jangka_waktu}}</td>
                                                        <input type="hidden" name="old_jangka_waktu[]" value="{{$perpanjangan->jangka_waktu}}">
                                                        <td>{{$perpanjangan->jatuh_tempo_akan_datang}}</td>
                                                        <input type="hidden" name="old_jatuh_tempo_akan_datang[]" value="{{$perpanjangan->jatuh_tempo_akan_datang}}">
                                                        <td>{{$perpanjangan->nisbah}}</td>
                                                        <input type="hidden" name="old_nisbah[]" value="{{$perpanjangan->nisbah}}">
                                                        <td>{{$perpanjangan->status}}</td>
                                                        <input type="hidden" name="old_status[]" value="{{$perpanjangan->status}}">
                                                        <td>
                                                            @if($pengajuan->status == "Approved")
                                                            @if($loop->index+1 != 1)
                                                            <a href="" class="action-icon"> <i class="mdi mdi-check-network"></i></a>
                                                            <a href="" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                                            <a href="" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                            <a data-bs-toggle="modal" data-bs-target="#modal-edit-dataperpanjangan" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                </form>
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
                                <form>
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Jatuh Tempo Sebelumnya</label>
                                        <input class="form-control" type="date" placeholder="dd/mm/yyyy" id="fullname">
                                    </div>

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Tanggal Akad Baru</label>
                                        <input class="form-control" type="date" placeholder="dd/mm/yyyy" id="fullname">
                                    </div>

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Jangka Waktu (dalam Bulan)</label>
                                        <input class="form-control" type="number" id="fullname" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Jatuh Tempo Akan Datang</label>
                                        <input class="form-control" type="date" placeholder="dd/mm/yyyy" id="fullname">
                                    </div>

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Nisbah</label>
                                        <input class="form-control" type="text" id="fullname" >
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Status</label>
                                        <select class="form-select" id="example-select">
                                            <option>Pengajuan</option>
                                            <option>Aproved</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3 text-center" >
                                        <button class="btn btn-primary" id="tambahPengajuan" type="submit"> Simpan </button>
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
                    @if($pengajuan->status == "Non Aktif")
                    <p>Syirkah ini sudah di-stop</p>
                    @else
                    <p class="mt-3">Data Perpanjangan An. {{$pengajuan->anggota->nama_lengkap}} tanggal Pengajuan {{$pengajuan->created_at}} Akan di <strong>Simpan</strong></p>
                    <p> Silakan klik <strong>Simpan</strong> jika sudah yakin</p>
                    <button type="submit" form="form_simpan_perpanjangan" class="btn btn-success my-2" >Simpan</button>
                    @endif
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
                    @if($pengajuan->status == "Non Aktif")
                    <p>Syirkah ini sudah di-stop</p>
                    @else
                    <p class="mt-3">Data pengajuan An. {{$pengajuan->anggota->nama_lengkap}} tanggal Pengajuan {{$pengajuan->created_at}} Akan di <strong>Berhentikan</strong> dalam mengikuti program DSyirkah</p>
                    <form action="{{$id}}/stop" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="kategori">
                                <option value="Normal">Normal</option>
                                <option value="Tidak Sesuai Akad">Tidak Sesuai Akad</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kebutuhan" class="form-label">Kebutuhan</label>
                            <select class="form-select" id="kebutuhan" name="kebutuhan">
                                <option value="Untuk Investasi di tempat lain">Untuk Investasi di tempat lain</option>
                                <option value="Kebutuhan Harian">Kebutuhan Harian</option>
                                <option value="Pembayaran Sekolah">Pembayaran Sekolah</option>
                                <option value="Pembayaran Rumah Sakit">Pembayaran Rumah Sakit</option>
                                <option value="">Kebutuhan Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3 kebutuhan_lainnya" style="display: none">
                            <label for="kebutuhan_lainnya" class="form-label">Sebutkan (jika lainnya)</label>
                            <input class="form-control" type="text" placeholder="Sebutkan" id="kebutuhan_lainnya" name="kebutuhan_lainnya">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input class="form-control" type="text" placeholder="" id="keterangan" name="keterangan" required>
                        </div>
                        <p> Silakan klik <strong>Stop</strong> jika sudah yakin</p>
                        <button type="submit" class="btn btn-warning my-2">Stop</button>
                    </form>
                    @endif
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
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('#kebutuhan').change(function(){
            if($(this).val() == ""){
                $('.kebutuhan_lainnya').show();
            } else {
                $('.kebutuhan_lainnya').hide();
            }
        })
    })
</script>
<script>
    $(document).ready(function(){
        $("#tambahPengajuan").click(function(){
            item = $(this)[0].dataset.item;
            jenis = $(this)[0].dataset.jenis;
            gramasi = $(this)[0].dataset.gramasi;
            id_emas = $(this)[0].dataset.id_emas;
            var length = $("#form_tambah_perpanjangan tr").length;
            let index_emas = 1;
            if(length != 0){
                index_emas++;
            }
            $("#form_tambah_perpanjangan").append(`
                <tr>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>
                <input type="hidden" name="new_jatuh_tempo_sebelumnya[]" value="">
                <input type="hidden" name="new_tgl_akad_baru[]" value="">
                <input type="hidden" name="new_jangka_waktu[]" value="">
                <input type="hidden" name="new_jatuh_tempo_akan_datang[]" value="">
                <input type="hidden" name="new_nisbah[]" value="">
                <input type="hidden" name="new_status[]" value="">
                    <a onclick="" class="action-icon"> <i class="mdi mdi-check-network"></i></a>
                    <a onclick="" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                    <a onclick="deleteNewData(${index_emas})" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                    
                </td>
                </tr>
            `)
            $('#modal-tambah-dataperpanjangan').close();
            });
        })
</script>
@endpush
@endsection