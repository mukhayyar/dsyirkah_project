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
                        <li class="breadcrumb-item active">Tindaklanjut Emas</li>
                    </ol>
                </div>
                <h4 class="page-title">Tindaklanjut Emas</h4>
            </div>
        </div>
    </div>
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="modal-header" style="background-color: goldenrod">
                    <h4 class="title" style="color: rgb(255, 255, 255);" id="data-pengajuan-emas">Tindaklanjut Emas</h4>
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
                                        <td>: {{$pengajuan->perpanjangan_emas->get(0)->tgl_akad_baru}}</td>
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
                                        <input id="id_versi" type="hidden" value="{{$pengajuan->versi->id}}">: 
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
                                        <td>: {{$pengajuan->perpanjangan_emas()->orderBy("jatuh_tempo_akan_datang","desc")->where('status','Approved')->first()->jatuh_tempo_akan_datang}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nisbah</td>
                                        <td>: {{$pengajuan->perpanjangan_emas()->orderBy("jatuh_tempo_akan_datang","desc")->where('status','Approved')->first()->nisbah}}</td>
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
                                                    <input type="hidden" name="">
                                                    <input type="hidden" name="">
                                                    <input type="hidden" name="">
                                                    <input type="hidden" name="">
                                                    <input type="hidden" name="">
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
                                                    {{$pengajuan->persetujuan()}}
                                                </li>
                                            </ul></p>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                                
                            </div><br>
                            <form action="{{$id}}/approve" method="POST" id="form_simpan_perpanjangan">
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
                                                    <tbody id="form_tambah_perpanjangan">
                                                    <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
                                                    @foreach($pengajuan->perpanjangan_emas as $perpanjangan)
                                                    <tr id="item-{{$loop->index+1}}">
                                                        <td>{{$loop->index+1}}</td>
                                                        <td class="tambah-sebelum-{{$loop->index+1}}">{{$perpanjangan->jatuh_tempo_sebelumnya}}</td>
                                                        <input type="hidden" name="old_id_perpanjangan[]" value="{{$perpanjangan->id}}">
                                                        <input class="tambah-sebelum-{{$loop->index+1}}" type="hidden" name="old_jatuh_tempo_sebelumnya[]" value="{{$perpanjangan->jatuh_tempo_sebelumnya}}">
                                                        <td class="tambah-akad-{{$loop->index+1}}">{{$perpanjangan->tgl_akad_baru}}</td>
                                                        <input class="tambah-akad-{{$loop->index+1}}" type="hidden" name="old_tgl_akad_baru[]" value="{{$perpanjangan->tgl_akad_baru}}">
                                                        <td class="tambah-jangka-{{$loop->index+1}}">{{$perpanjangan->jangka_waktu}}</td>
                                                        <td class="tambah-mendatang-{{$loop->index+1}}">{{$perpanjangan->jatuh_tempo_akan_datang}}</td>
                                                        <td class="tambah-nisbah-{{$loop->index+1}}">{{$perpanjangan->nisbah}}</td>
                                                        <td class="tambah-status-{{$loop->index+1}}">{{$perpanjangan->status}}</td>
                                                        <td>
                                                            <input class="tambah-jangka-{{$loop->index+1}}" type="hidden" name="old_jangka_waktu[]" value="{{$perpanjangan->jangka_waktu}}">
                                                            <input class="tambah-mendatang-{{$loop->index+1}}" type="hidden" name="old_jatuh_tempo_akan_datang[]" value="{{$perpanjangan->jatuh_tempo_akan_datang}}">
                                                            <input class="tambah-nisbah-{{$loop->index+1}}" type="hidden" name="old_nisbah[]" value="{{$perpanjangan->nisbah}}">
                                                            <input class="tambah-status-{{$loop->index+1}}" type="hidden" name="old_status[]" value="{{$perpanjangan->status}}">
                                                            <input type="hidden" name="pengajuan_id" value="{{$perpanjangan->pengajuan_id}}">
                                                            <input type="hidden" name="old_perpanjangan_id[]" value="{{$perpanjangan->id}}">
                                                            @if($perpanjangan->status == "Pengajuan")
                                                            <a href="javascript:void(0);" id="activateRow" data-index="{{$loop->index+1}}" class="action-icon item-active-{{$loop->index+1}}"> <i class="mdi mdi-check-network"></i></a>
                                                            @endif
                                                            @if($perpanjangan->status == "Approved" || $perpanjangan->status == "Pengajuan")
                                                            <a href="javascript:void(0);" id="editRow" data-index="{{$loop->index+1}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                                            @if($loop->index != 0)
                                                            <a href="javascript:void(0);" id="removeRow" class="action-icon" data-index="{{$loop->index+1}}" data-id_rincian_perpanjangan="{{$perpanjangan->id}}"> <i class="mdi mdi-delete"></i></a>
                                                            @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                        </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div slass="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <h5>Rincian Perpanjangan Terhapus</h5>
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
                                                    <tbody id="form_tambah_perpanjangan">
                                                    <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
                                                    @foreach($pengajuan->perpanjangan_emas()->onlyTrashed()->get() as $perpanjangan)
                                                    <tr id="item-{{$loop->index+1}}">
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

                </form>
                   
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
<div class="modal fade" id="modal-tambah-dataperpanjangan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg loading authentication-bg">
        <div class="modal-content bg-transparent">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-7 col-lg-5">
                        <div class="card">
                            <!-- Logo-->
                            <div class="modal-header" style="background-color: #afb4be">
                                <div style="color: rgb(255, 255, 255);"><h4 id="modal-tambah-title">Tambah Data Perpanjangan</h4></div>
                                <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="card-body p-4">
                                <form id="form_tambah_data_perpanjangan">
                                    <div class="mb-3">
                                        <label for="jatuh_tempo_sebelumnya" class="form-label">Jatuh Tempo Sebelumnya</label>
                                        <input class="form-control" type="date" placeholder="dd/mm/yyyy" id="jatuh_tempo_sebelumnya">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tgl_akad_baru" class="form-label">Tanggal Akad Baru</label>
                                        <input class="form-control" type="date" placeholder="dd/mm/yyyy" id="tgl_akad_baru">
                                    </div>

                                    <div class="mb-3">
                                        <label for="jangka_waktu" class="form-label">Jangka Waktu (dalam Bulan)</label>
                                        <select class="form-select" id="jangka_waktu" name="jangka_waktu">
                                            <option value="">Pilih</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jatuh_tempo_mendatang" class="form-label">Jatuh Tempo Akan Datang</label>
                                        <input class="form-control" type="date" placeholder="dd/mm/yyyy" id="jatuh_tempo_mendatang">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nisbah" class="form-label">Nisbah</label>
                                        <input class="form-control" type="text" id="nisbah" value="" readonly>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="statusPil" class="form-label">Status</label>
                                        <select class="form-select" id="statusPil">
                                            <option value="Pengajuan">Pengajuan</option>
                                            <option value="Approved">Approved</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 text-center" >
                                        <button class="btn btn-primary" id="tambahPengajuan" type="button"> Simpan </button>
                                    </div>
                                    <div class="mb-3 text-center" >
                                        <button class="btn btn-primary" id="updatePengajuan" style="display: none" type="button"> Update </button>
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
        var id_versi = $("#id_versi").val();
        $.ajax({
            type: "GET",
            url: "/api/versi/bulan/"+id_versi,
            success: function(hasil){
                hasilAkhir = [];
                hasilAkhir.push("<option value=''>--Pilih--</option>");
                var oldVersi = {{$pengajuan->jangka_waktu}};
                hasil.forEach(element => {
                    value = `${element.id}`;
                    hasilAkhir.push("<option data-id='"+value+"' value='"+element.bulan+"'>"+element.bulan+" Bulan</option>");
                });
                $("#jangka_waktu").html(hasilAkhir);
            }
        })
        $("body").on("change","#jangka_waktu", function(){
            var selected = $(this)[0].options.selectedIndex;
            var id = $(this)[0].options[selected].dataset.id;
            $.ajax({
                type: "GET",
                url: "/api/versi/nisbah/"+id,
                success: function(hasil){
                    $("#nisbah").val(hasil.nisbah);
                }
            })
        })
        $("#tambahPengajuan").click(function(){
            var jatuh_tempo_sebelumnya = $('#jatuh_tempo_sebelumnya').val();
            var tgl_akad_baru = $('#tgl_akad_baru').val();
            var jangka_waktu = $('#jangka_waktu').val();
            var jatuh_tempo_mendatang = $('#jatuh_tempo_mendatang').val();
            var nisbah = $('#nisbah').val();
            var status = $('#statusPil').val();
            var length = $("#form_tambah_perpanjangan tr").length;
            let index_data = 1;
            if(length != 0){
                index_data++;
            }
            $("#form_tambah_perpanjangan").append(`
            <tr id="item-${index_data}">
                <td>${index_data}</td>
                <td class="tambah-sebelum-${index_data}">${jatuh_tempo_sebelumnya}</td>
                <td class="tambah-akad-${index_data}">${tgl_akad_baru}</td>
                <td class="tambah-jangka-${index_data}">${jangka_waktu}</td>
                <td class="tambah-mendatang-${index_data}">${jatuh_tempo_mendatang}</td>
                <td class="tambah-nisbah-${index_data}">${nisbah}</td>
                <td class="tambah-status-${index_data}">${status}</td>
                <td>
                    <input type="hidden" class="tambah-sebelum-${index_data}" name="new_jatuh_tempo_sebelumnya[]" value="${jatuh_tempo_sebelumnya}">
                    <input type="hidden" class="tambah-akad-${index_data}" name="new_tgl_akad_baru[]" value="${tgl_akad_baru}">
                    <input type="hidden" class="tambah-jangka-${index_data}" name="new_jangka_waktu[]" value="${jangka_waktu}">
                    <input type="hidden" class="tambah-mendatang-${index_data}" name="new_jatuh_tempo_akan_datang[]" value="${jatuh_tempo_mendatang}">
                    <input type="hidden" class="tambah-nisbah-${index_data}" name="new_nisbah[]" value="${nisbah}">
                    <input type="hidden" class="tambah-status-${index_data}" name="new_status[]" value="${status}">
                    <a href="javascript:void(0);" id="editRow" data-index="${index_data}" class="action-icon" data-id> <i class="mdi mdi-pencil"></i></a>
                    <a href="javascript:void(0);" id="removeRow" data-index="${index_data}" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                    </td>
                    </tr>
            `)
            $('#form_tambah_data_perpanjangan')[0].reset();
            $('#modal-tambah-dataperpanjangan').modal("hide");
        }); 
        $(document).on('click', '#removeRow', function () {
            if(confirm("Yakin akan menghapus data perpanjangan ini?")){
                var index = $(this)[0].dataset.index;
                $(this).closest(`#item-${index}`).remove();
                var id_rincian_perpanjangan = $(this)[0].dataset.id_rincian_perpanjangan;
                if(id_rincian_perpanjangan){
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/dsyirkah_aktif/emas/delete/perpanjangan/"+id_rincian_perpanjangan,
                        beforeSend: function(xhr){
                            xhr.setRequestHeader('X-CSRF-TOKEN', $('#token').val());
                        },
                        success: function(hasil){
                            console.log("berhasil dihapus");
                        }
                    })
                }
            }
        });
        $(document).on('click', '#activateRow', function () {
            var index = $(this)[0].dataset.index;
            $(this).closest(`.item-active-${index}`).remove();
            $(`.tambah-status-${index}`).val("Approved")
            $(`td.tambah-status-${index}`).html("Approved")
        });
        $(document).on('click', '#editRow', function () {
            $('#modal-tambah-title')[0].textContent = 'Edit Data Perpanjangan';
            var index = $(this)[0].dataset.index;
            var jatuh_tempo_sebelumnya = $(`input.tambah-sebelum-${index}`)[0].value;
            var tgl_akad_baru = $(`input.tambah-akad-${index}`).val();
            var jangka_waktu = $(`input.tambah-jangka-${index}`).val();
            var jatuh_tempo_mendatang = $(`input.tambah-mendatang-${index}`).val();
            var nisbah = $(`input.tambah-nisbah-${index}`).val();
            var status = $(`input.tambah-status-${index}`).val();
            var id_versi = $("#id_versi").val();
            $.ajax({
                type: "GET",
                url: "/api/versi/bulan/"+id_versi,
                success: function(hasil){
                    hasilAkhir = [];
                    hasilAkhir.push("<option value=''>--Pilih--</option>");
                    var oldVersi = jangka_waktu;
                    hasil.forEach(element => {
                        value = `${element.id}`;
                        if(element.bulan == oldVersi){
                            hasilAkhir.push("<option data-id='"+value+"' value='"+element.bulan+"' selected>"+element.bulan+" Bulan</option>");
                            $("#jangka_waktu").val(element.nisbah);
                        } else {
                            hasilAkhir.push("<option data-id='"+value+"' value='"+element.bulan+"'>"+element.bulan+" Bulan</option>");
                        }
                    });
                    $("#jangka_waktu").html(hasilAkhir);
                }
            })
            $("body").on("change","#jangka_waktu", function(){
                var selected = $(this)[0].options.selectedIndex;
                var id = $(this)[0].options[selected].dataset.id;
                $.ajax({
                    type: "GET",
                    url: "/api/versi/nisbah/"+id,
                    success: function(hasil){
                        $("#nisbah").val(hasil.nisbah);
                    }
                })
            })
            $('#jatuh_tempo_sebelumnya').val(jatuh_tempo_sebelumnya);
            $('#tgl_akad_baru').val(tgl_akad_baru);
            $('#jangka_waktu').val(jangka_waktu);
            $('#jatuh_tempo_mendatang').val(jatuh_tempo_mendatang);
            $('#nisbah').val(nisbah);
            $(`#statusPil option[value="${status}"]`).attr('selected','selected');
            $('#modal-tambah-dataperpanjangan').modal("show");
            $('#updatePengajuan').css("display","block");
            $('#updatePengajuan').attr("data-index",`${index}`);
            $('#tambahPengajuan').css("display","none");
            $('body').on('click','.btn-close',function() {
                $('#modal-tambah-title')[0].textContent = 'Tambah Data Perpanjangan';
                $('#form_tambah_data_perpanjangan').trigger('reset');
            })
        });
        $(document).on('click', '#updatePengajuan', function () {
            var index = $(this)[0].dataset.index;
            var jatuh_tempo_sebelumnya = $('#jatuh_tempo_sebelumnya').val();
            var tgl_akad_baru = $('#tgl_akad_baru').val();
            var jangka_waktu = $('#jangka_waktu').val();
            var jatuh_tempo_mendatang = $('#jatuh_tempo_mendatang').val();
            var nisbah = $('#nisbah').val();
            var status = $('#statusPil').val();
            $(`.tambah-sebelum-${index}`).val(jatuh_tempo_sebelumnya)
            $(`.tambah-akad-${index}`).val(tgl_akad_baru)
            $(`.tambah-jangka-${index}`).val(jangka_waktu)
            $(`.tambah-mendatang-${index}`).val(jatuh_tempo_mendatang)
            $(`.tambah-nisbah-${index}`).val(nisbah)
            $(`.tambah-status-${index}`).val(status)
            $(`td.tambah-sebelum-${index}`).html(jatuh_tempo_sebelumnya)
            $(`td.tambah-akad-${index}`).html(tgl_akad_baru)
            $(`td.tambah-jangka-${index}`).html(jangka_waktu)
            $(`td.tambah-mendatang-${index}`).html(jatuh_tempo_mendatang)
            $(`td.tambah-nisbah-${index}`).html(nisbah)
            $(`td.tambah-status-${index}`).html(status)
            $('#modal-tambah-dataperpanjangan').modal("hide");
            $('#form_tambah_data_perpanjangan')[0].reset();
            $('#updatePengajuan').css("display","none");
            $('#tambahPengajuan').css("display","block");
        });
    })  
</script>
@endpush
@endsection