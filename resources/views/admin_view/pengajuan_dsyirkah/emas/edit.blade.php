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
                                <div class="card d-block">
                                    <div class="card-header" style="background-color: goldenrod;">
                                        <div class=" align-items-center mb-2 text-white">
                                            <h3>Form Pengajuan D'Syirkah Emas</h3>
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
                                                        <input type="text" class="form-control" placeholder="{{$pengajuan->anggota->mask_nomor_ba()}}" aria-label="Recipient's username" readonly>
                                                        <input type="hidden" value="{{$pengajuan->anggota->nomor_ba}}" name="no_ba">
                                                        <input type="hidden" value="{{$pengajuan->anggota->id}}" name="anggota_id">
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nama Lengkap</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="{{$pengajuan->anggota->nama_lengkap}}" value="{{$pengajuan->anggota->nama_lengkap}}" name="nama_lengkap" readonly="">
                                                </div>
                                            </div><br>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nomor HP</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="{{$pengajuan->anggota->mask_no_hp()}}" readonly="">
                                                    <input type="hidden" value="{{$pengajuan->anggota->no_hp}}" name="no_hp">
                                                </div>
                                                <div class="col-md">
                                                    <label for="emailaddress" class="form-label">Email address</label>
                                                    <input class="form-control" type="email" id="emailaddress" placeholder="{{$pengajuan->anggota->mask_email()}}" readonly=""> 
                                                    <input type="hidden" value="{{$pengajuan->anggota->email}}" name="email">
                                                </div>
                                            </div><hr><br>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Nomor Pengajuan</label>
                                                    <input class="form-control" type="text" id="fullname" placeholder="{{$pengajuan->no_pengajuan}}" value="{{$pengajuan->no_pengajuan}}" name="no_referensi" readonly="">
                                                </div>
                                                <div class="col-md">
                                                    <label for="emailaddress" class="form-label">Jenis Syirkah</label>
                                                    <input class="form-control" type="text" id="emailaddress" placeholder="Mutlaqah" value="Mutlaqah" readonly="" name="jenis"> 
                                                </div>
                                                <div class="col-md">
                                                    <label for="fullname" class="form-label">Versi D'Syirkah</label>
                                                    <input class="form-control" type="text" id="versi" placeholder="{{$pengajuan->versi->versi}}" value="{{$pengajuan->versi->versi}}" readonly="" name="versi">
                                                    <input type="hidden" id="id_versi" value="{{$pengajuan->versi->id}}" readonly="">
                                                </div>
                                                <div class="col-md">
                                                    <label for="perwada" class="form-label">Perwada</label>
                                                    <select class="form-control" type="text" id="perwada" required name="perwada">
                                                        <option value="">Pilih</option>
                                                        @foreach($perwada as $pwd)
                                                        <option value="{{$pwd->nama}}" {{$pengajuan->referensi == $pwd->nama ? 'selected' : ''}}>{{$pwd->nama}}</option>
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
                                                                        <option value="reguler" {{$pengajuan->pilihan_program == 'reguler' ? 'selected' : ''}}>Reguler</option>
                                                                        <option value="pokokWakaf" {{$pengajuan->pilihan_program == 'pokokWakaf' ? 'selected' : ''}}>Pokok Diwakafkan</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-md program reguler" style="display: {{$pengajuan->pilihan_program == 'reguler' ? 'block' : 'none'}};">
                                                                    <label for="example-select" class="form-label">Jangka Waktu (jika reg)</label>
                                                                    <select class="form-select" id="bulanPil" name="jangka_waktu">
                                                                        <option value="">Pilih</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-md program reguler" style="display: {{$pengajuan->pilihan_program == 'reguler' ? 'block' : 'none'}};">
                                                                    <label for="nisbahPil" class="form-label">Nisbah (sesuai dg jangka waktu)</label>
                                                                    <input class="form-control date" type="text" id="nisbahPil" name="nisbah" readonly>
                                                                </div><br>
                                                                <div class="col-md program reguler" style="display: {{$pengajuan->pilihan_program == 'reguler' ? 'block' : 'none'}};">
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
                                                    <div class="col-sm-5">
                                                        <a href="javascript:void(0);" class="btn mb-2 text-white" data-bs-toggle="modal" data-bs-target="#modal-tambah-emas" style="background-color: goldenrod;"><i class="mdi mdi-plus-circle me-2"></i> Emas</a>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless table-nowrap table-centered mb-0">
                                                            <thead class="text-white" style="background-color: goldenrod;">
                                                                <tr>
                                                                    <th>Item emas</th>
                                                                    <th>Jenis</th>
                                                                    <th>Gramasi</th>
                                                                    <th>Keping</th>
                                                                    <th>Jumlah</th>
                                                                    <th style="width: 50px;"></th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot class="text-white" style="background-color: goldenrod;">
                                                                <tr>
                                                                    <th>Total</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th> <span id="total_jumlah_emas">{{$pengajuan->total_gramasi}}</span> Gram</th>
                                                                    <input type="hidden" value="" id="input_total_jumlah_emas" name="total_jumlah_emas">
                                                                    <th style="width: 50px;"></th>
                                                                </tr>
                                                            </tfoot>
                                                            <tbody id="form_tambah_emas">
                                                                @foreach($pengajuan->rincian_pengajuan_emas as $item_emas)
                                                                <tr id="item-emas-{{$loop->index}}">
                                                                    <td>{{$item_emas->item}}</td>
                                                                    <input type="hidden" value="{{$item_emas->item}}" class="form-control" name="item_emas[]">
                                                                    <td>
                                                                        <span class="badge badge-primary-lighten">{{$item_emas->jenis}}</span>
                                                                        <input type="hidden" value="{{$item_emas->jenis}}" class="form-control" name="jenis_emas[]">
                                                                    </td>
                                                                    <td>{{$item_emas->gramasi}}</td>
                                                                    <input type="hidden" value="{{$item_emas->gramasi}}" class="form-control gramasi-${index_emas}" name="gramasi_emas[]">
                                                                    <td>
                                                                        <input id="input-keping-emas-${index_emas}" type="number" min="1" value="{{$item_emas->keping}}" oninput="jumlahGram(${index_emas})" name="keping_emas[]" class="form-control" placeholder="Qty" style="width: 90px;" required>
                                                                    </td>
                                                                    <td>
                                                                        <span id="jumlah-keping-${index_emas}">
                                                                            {{$item_emas->jumlah}}
                                                                        </span>
                                                                        Gram
                                                                        <input id="input-jumlah-keping-${index_emas}" type="hidden" value="{{$item_emas->item}}" class="form-control" name="jumlah_keping[]">
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:void(0);" id="removeRow" data-index_emas="${index_emas}" data-id_emas="${id_emas}" class="action-icon"> <i
                                                                                class="mdi mdi-delete"></i></a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div><hr><br> <!-- end table-responsive-->
                                                    <div class="card border-primary border program pokokWakaf" @if($pengajuan->pilihan_program == "pokokWakaf")style="display: block;" @else style="display: none;"@endif>
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
                                                <div class="col-lg program reguler" @if($pengajuan->pilihan_program == "reguler")style="display: block;" @else style="display: none;"@endif>
                                                    <div class="card border-secondary border">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Alokasi Nisbah Reguler :</h5>
                                                            <div class="mt-3">
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio1" name="alokasiNisbah" value="Nisbah semua dimasukkan ke Simpanan Berkah" class="form-check-input">
                                                                    <label class="form-check-label" for="customRadio1">Nisbah semua dimasukkan ke Simpanan Berkah</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2" name="alokasiNisbah" value="Nisbah di Wakafkan 25% melalui Wakaf Peradaban ; 75% dimasukkan ke Simpanan Berkah" class="form-check-input" {{$pengajuan->alokasi_nisbah == "Nisbah di Wakafkan 25% melalui Wakaf Peradaban ; 75% dimasukkan ke Simpanan Berkah" ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="customRadio2">Nisbah di Wakafkan 25% melalui Wakaf Peradaban ; 75% dimasukkan ke Simpanan Berkah</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2" name="alokasiNisbah" value="Nisbah di Wakafkan 50% melalui Wakaf Peradaban ; 50% dimasukkan ke Simpanan Berkah" class="form-check-input" {{$pengajuan->alokasi_nisbah == "Nisbah di Wakafkan 50% melalui Wakaf Peradaban ; 50% dimasukkan ke Simpanan Berkah" ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="customRadio3">Nisbah di Wakafkan 50% melalui Wakaf Peradaban ; 50% dimasukkan ke Simpanan Berkah</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2" name="alokasiNisbah" value="Nisbah di Wakafkan 75% melalui Wakaf Peradaban ; 25% dimasukkan ke Simpanan Berkah" class="form-check-input" {{$pengajuan->alokasi_nisbah == "Nisbah di Wakafkan 75% melalui Wakaf Peradaban ; 25% dimasukkan ke Simpanan Berkah" ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="customRadio4">Nisbah di Wakafkan 75% melalui Wakaf Peradaban ; 25% dimasukkan ke Simpanan Berkah</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2" name="alokasiNisbah" value="Nisbah semua di wakafkan melalui Wakaf Peradaban" class="form-check-input" {{$pengajuan->alokasi_nisbah == "Nisbah semua di wakafkan melalui Wakaf Peradaban" ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="customRadio5">Nisbah semua di wakafkan melalui Wakaf Peradaban</label>
                                                                </div>
                                                            </div> 
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                </div>
                                                <div class="col-lg program pokokWakaf" @if($pengajuan->pilihan_program == "pokokWakaf")style="display: block;" @else style="display: none;"@endif>
                                                    <div class="card border-secondary border">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Alokasi Nisbah Wakaf :</h5>
                                                            <div class="mt-3">
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio1" name="alokasiNisbah" value="100% sedekah" class="form-check-input" {{$pengajuan->alokasi_nisbah == "100% sedekah" ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="customRadio6">100% sedekah</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2" name="alokasiNisbah" value="40% anggota ; 60% sedekah" class="form-check-input" {{$pengajuan->alokasi_nisbah == "40% anggota ; 60% sedekah" ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="customRadio7">40% anggota ; 60% sedekah</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="customRadio2" name="alokasiNisbah" value="25% anggota ; 75% sedekah" class="form-check-input" {{$pengajuan->alokasi_nisbah == "25% anggota ; 75% sedekah" ? 'checked' : ''}}>
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
                                                            <p class="card-text">{{$pengajuan->catatan_pengajuan}}</p>
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card border-secondary border">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Tandatangan :</h5>
                                                            <br/>
                                                            <img src="/images/data_penting/tanda_tangan/{{$pengajuan->ttd}}" alt="" width="550">
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                </div>
                                            </div>
                                            <div slass="row">
                                                <div class="col-lg-11">
                                                    <div class="card border-danger border">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Catatan Edit :</h5>
                                                            <textarea class="form-control" name="catatan_edit" rows="5"></textarea>
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

                </div> <!-- content -->
@endsection