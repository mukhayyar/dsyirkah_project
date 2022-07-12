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
                                            <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
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
                                                                        <option value="Otomatis" {{$pengajuan->perpanjangan == 'Otomatis' ? 'selected' : ''}}>Otomatis</option>
                                                                        <option value="Tidak Otomatis" {{$pengajuan->perpanjangan == 'Tidak Otomatis' ? 'selected' : ''}}>Tidak Otomatis</option>
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
                                                                    {{-- <input type="hidden" id="test" name="total_jumlah_emas" value="{{$pengajuan->total_gramasi}}"> --}}
                                                                    <input type="hidden" id="test" name="total_jumlah_emas" value="{{$pengajuan->total_gramasi}}">
                                                                    <th> <span id="total_jumlah_emas">{{$pengajuan->total_gramasi}}</span> Gram</th>
                                                                    <input type="hidden" id="input_total_jumlah_emas" name="total_jumlah_emas" value="{{$pengajuan->total_gramasi}}">
                                                                    <th style="width: 50px;"></th>
                                                                </tr>
                                                            </tfoot>
                                                            <tbody id="form_tambah_emas">
                                                                @foreach($pengajuan->rincian_pengajuan_emas as $item_emas)
                                                                <tr id="item-emas-{{$loop->index}}" class="id-emas" data-id="{{$item_emas->emas_id}}">
                                                                    <td>{{$item_emas->item}}</td>
                                                                    <input type="hidden" value="{{$item_emas->id}}" class="form-control" name="old_rincian_item_emas[]">
                                                                    <input type="hidden" value="{{$item_emas->item}}" class="form-control" name="old_item_emas[]">
                                                                    <td>
                                                                        <span class="badge badge-primary-lighten">{{$item_emas->jenis}}</span>
                                                                        <input type="hidden" value="{{$item_emas->jenis}}" class="form-control" name="old_jenis_emas[]">
                                                                    </td>
                                                                    <td>{{$item_emas->gramasi}}</td>
                                                                    <input type="hidden" value="{{$item_emas->gramasi}}" class="form-control gramasi-{{$loop->index}}" name="old_gramasi_emas[]">
                                                                    <td>
                                                                        <input id="input-keping-emas-{{$loop->index}}" type="number" min="1" value="{{$item_emas->keping}}" oninput="jumlahGram({{$loop->index}})" name="old_keping_emas[]" class="form-control" placeholder="Qty" style="width: 90px;" required>
                                                                    </td>
                                                                    <td>
                                                                        <span id="jumlah-keping-{{$loop->index}}">
                                                                            {{$item_emas->jumlah}}
                                                                        </span>
                                                                        Gram
                                                                        <input id="input-jumlah-keping-{{$loop->index}}" type="hidden" value="{{$item_emas->jumlah}}" class="form-control" name="old_jumlah_keping[]">
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:void(0);" id="removeRow" data-index_emas="{{$loop->index}}" data-id_emas="{{$item_emas->emas_id}}" data-id_rincian_emas="{{$item_emas->id}}" class="action-icon"> <i
                                                                                class="mdi mdi-delete"></i></a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div><hr><br> <!-- end table-responsive-->
                                                    <div class="card border-primary border program reguler" @if($pengajuan->pilihan_program == "reguler")style="display: block;" @else style="display: none;"@endif>
                                                        <div class="card-body">
                                                            <h5 class="card-title">Persetujuan : (jika Reguler)</h5>
                                                            <p class="card-text">
                                                                <div class="mt-3">
                                                                    <div class="form-check">
                                                                        <input type="radio" id="persetujuanRadio1" name="persetujuan" value="Simpanan berjangka dengan akad Mudharabah Muthlaqah" class="form-check-input" {{$pengajuan->persetujuan == "Simpanan berjangka dengan akad Mudharabah Muthlaqah" ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="persetujuanRadio1">Simpanan berjangka dengan akad Mudharabah Muthlaqah</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="persetujuanRadio2" name="persetujuan" value="Simpanan berjangka ini tidak dapat dicairkan sebelum tanggal jatuh tempo" class="form-check-input" {{$pengajuan->persetujuan == "Simpanan berjangka ini tidak dapat dicairkan sebelum tanggal jatuh tempo" ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="persetujuanRadio2">Simpanan berjangka ini tidak dapat dicairkan sebelum tanggal jatuh tempo</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="persetujuanRadio3" name="persetujuan" value="Simpanan Berjangka Dsyirkah minimal 100 Gram dengan jangka waktu 12 Bulan Mendapatkan Hadiah 1 Gram Gold / 100 Gram dengan jangka waktu 24 Bulan Mendapatkan Hadiah 2 Gram Gold" class="form-check-input" {{$pengajuan->persetujuan == "Simpanan Berjangka Dsyirkah minimal 100 Gram dengan jangka waktu 12 Bulan Mendapatkan Hadiah 1 Gram Gold / 100 Gram dengan jangka waktu 24 Bulan Mendapatkan Hadiah 2 Gram Gold" ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="persetujuanRadio3">Simpanan Berjangka Dsyirkah minimal 100 Gram dengan jangka waktu 12 Bulan Mendapatkan Hadiah 1 Gram Gold / 100 Gram dengan jangka waktu 24 Bulan Mendapatkan Hadiah 2 Gram Gold</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="persetujuanRadio4" name="persetujuan" value="Saya siap mengembalikan hadiah jika tidak sesuai dengan akad." class="form-check-input" {{$pengajuan->persetujuan == "Saya siap mengembalikan hadiah jika tidak sesuai dengan akad." ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="persetujuanRadio4">Saya siap mengembalikan hadiah jika tidak sesuai dengan akad.</label>
                                                                    </div>
                                                                </div>
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                    <div class="card border-primary border program pokokWakaf" @if($pengajuan->pilihan_program == "pokokWakaf")style="display: block;" @else style="display: none;"@endif>
                                                        <div class="card-body">
                                                            <h5 class="card-title">Persetujuan : (jika Pokok diwakafkan)</h5>
                                                            <p class="card-text">
                                                                <div class="mt-3">
                                                                    <div class="form-check">
                                                                        <input type="radio" id="persetujuanRadio5" name="persetujuan" value="Simpanan berjangka dengan akad Mudharabah Muthlaqah" class="form-check-input" {{$pengajuan->persetujuan == "Simpanan berjangka dengan akad Mudharabah Muthlaqah" ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="persetujuanRadio5">Simpanan berjangka dengan akad Mudharabah Muthlaqah</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="persetujuanRadio6" name="persetujuan" value="Simpanan berjangka ini tidak dapat dicairkan sebelum tanggal jatuh tempo" class="form-check-input" {{$pengajuan->persetujuan == "Simpanan berjangka ini tidak dapat dicairkan sebelum tanggal jatuh tempo" ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="persetujuanRadio6">Simpanan berjangka ini tidak dapat dicairkan sebelum tanggal jatuh tempo</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="persetujuanRadio7" name="persetujuan" value="Simpanan Berjangka Dsyirkah minimal 100 Gram dengan jangka waktu 12 Bulan Mendapatkan Hadiah 1 Gram Gold / 100 Gram dengan jangka waktu 24 Bulan Mendapatkan Hadiah 2 Gram Gold" class="form-check-input" {{$pengajuan->persetujuan == "Simpanan Berjangka Dsyirkah minimal 100 Gram dengan jangka waktu 12 Bulan Mendapatkan Hadiah 1 Gram Gold / 100 Gram dengan jangka waktu 24 Bulan Mendapatkan Hadiah 2 Gram Gold" ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="persetujuanRadio7">Simpanan Berjangka Dsyirkah minimal 100 Gram dengan jangka waktu 12 Bulan Mendapatkan Hadiah 1 Gram Gold / 100 Gram dengan jangka waktu 24 Bulan Mendapatkan Hadiah 2 Gram Gold</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="persetujuanRadio8" name="persetujuan" value="Saya siap mengembalikan hadiah jika tidak sesuai dengan akad." class="form-check-input" {{$pengajuan->persetujuan == "Saya siap mengembalikan hadiah jika tidak sesuai dengan akad." ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="persetujuanRadio8">Saya siap mengembalikan hadiah jika tidak sesuai dengan akad.</label>
                                                                    </div>
                                                                </div>
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
                                                                    <input type="radio" id="customRadio1" name="alokasiNisbah" value="Nisbah semua dimasukkan ke Simpanan Berkah" class="form-check-input" {{$pengajuan->alokasi_nisbah == "Nisbah semua dimasukkan ke Simpanan Berkah" ? 'checked' : ''}}>
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
                                                            <textarea class="form-control" name="catatan_edit" rows="5">{{$pengajuan->catatan_edit}}</textarea>
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
<div class="modal fade" id="modal-tambah-emas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg loading authentication-bg">
        <div class="modal-content bg-transparent">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-7 col-lg-5">
                        <div class="card">
                            <!-- Logo-->
                            <div class="modal-header" style="background-color: #afb4be">
                                <div style="color: rgb(255, 255, 255);"><h4 id="modalHeading">Tambah Item Emas</h4></div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="card-body p-4">
                                <form id="CustomerForm" name="CustomerForm">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-nowrap table-centered mb-0">
                                            <thead class="text-white bg-secondary ">
                                                <tr>
                                                    <th>Item emas</th>
                                                    <th>Jenis</th>
                                                    <th>Gramasi</th>
                                                    <th style="width: 50px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($item_emas_show as $emas)
                                                <tr>
                                                    <td>{{$emas->nama}}</td>
                                                    <td>
                                                        <span class="badge badge-primary-lighten">{{$emas->jenis}}</span>
                                                    </td>
                                                    <td>{{$emas->gramasi}} Gram</td>
                                                    <td>
                                                        <a id="tambah-emas-{{$emas->id}}" data-bs-dismiss="modal" data-item="{{$emas->nama}}" data-jenis="{{$emas->jenis}}" data-gramasi="{{$emas->gramasi}}" data-id_emas="{{$emas->id}}" class="action-icon tambah_emas" style="cursor: pointer;"> <i class="mdi mdi-archive-plus"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
@push('scripts')
<script>
    var item_emas_active = document.getElementsByClassName(`id-emas`);
    console.log(item_emas_active.length);
    for(var i = 0; i < item_emas_active.length; i++)
    {
        var id_emas = item_emas_active[i].dataset.id;
        document.getElementById(`tambah-emas-${id_emas}`).style.display = "none";
    }
    function jumlahGram(id_input)
    {
        var gramasi = document.getElementsByClassName(`gramasi-${id_input}`);
        var x = document.getElementById(`input-keping-emas-${id_input}`).value;
        gramasi = parseFloat(gramasi[0].value)
        var total = x*gramasi;
        total = total.toFixed(1);
        document.getElementById(`jumlah-keping-${id_input}`).innerHTML = total;
        document.getElementById(`input-jumlah-keping-${id_input}`).value = total;
        var length = $("#form_tambah_emas tr").length;
        var total = 0;
        var test_number = 0;
        for(let i = 0; i<length; i++)
        {
            test_number += parseFloat(document.getElementById(`jumlah-keping-${i}`).innerText)
        }
        total = parseFloat(total).toFixed(1);
        document.getElementById(`total_jumlah_emas`).innerHTML = test_number;
        document.getElementById(`input_total_jumlah_emas`).value = test_number;
    }
    $(function() {
        $('#pilihanProgram').change(function(){
            $('.program').hide();
            $('.' + $(this).val()).show();
        })
    });
    $(document).ready(function(){
        var id_versi = $("#id_versi").val();
        $.ajax({
            type: "GET",
            url: "/api/versi/bulan/"+id_versi,
            success: function(hasil){
                hasilAkhir = [];
                hasilAkhir.push("<option value=''>--Pilih--</option>");
                var oldVersi = {{$pengajuan->jangka_waktu}}
                hasil.forEach(element => {
                    value = `${element.id},${element.bulan}`;
                    if(element.bulan == oldVersi){
                        hasilAkhir.push("<option value='"+value+"' selected>"+element.bulan+" Bulan</option>");
                        $("#nisbahPil").val(element.nisbah);
                    } else {
                        hasilAkhir.push("<option value='"+value+"'>"+element.bulan+" Bulan</option>");
                    }
                });
                $("#bulanPil").html(hasilAkhir);
            }
        })
        $("body").on("change","#bulanPil", function(){
            var value = $(this).val();
            const myArray = value.split(",");
            let id = myArray[0];
            $.ajax({
                type: "GET",
                url: "/api/versi/nisbah/"+id,
                success: function(hasil){
                    $("#nisbahPil").val(hasil.nisbah);
                }
            })
        })
        $(".tambah_emas").click(function(){
            hasilAkhir = [];
            id_emas = $(this)[0].dataset.id_emas;
            item = $(this)[0].dataset.item;
            jenis = $(this)[0].dataset.jenis;
            gramasi = $(this)[0].dataset.gramasi;
            id_emas = $(this)[0].dataset.id_emas;
            var length = $("#form_tambah_emas tr").length;
            let index_emas = length++;
            $("#form_tambah_emas").append(`
            <tr id="item-emas-${index_emas}">
                <td>${item}</td>
                <input type="hidden" value="${item}" class="form-control" name="new_item_emas[]">
                <td>
                    <span class="badge badge-primary-lighten">${jenis}</span>
                    <input type="hidden" value="${jenis}" class="form-control" name="new_jenis_emas[]">
                </td>
                <td>${gramasi}</td>
                <input type="hidden" value="${id_emas}" class="form-control" name="new_id_emas[]">
                <input type="hidden" value="${gramasi}" class="form-control gramasi-${index_emas}" name="new_gramasi_emas[]">
                <td>
                    <input id="input-keping-emas-${index_emas}" type="number" min="1" value="" oninput="jumlahGram(${index_emas})" name="new_keping_emas[]" class="form-control" placeholder="Qty" style="width: 90px;" required>
                </td>
                <td>
                    <span id="jumlah-keping-${index_emas}">
                       0
                    </span>
                    Gram
                    <input id="input-jumlah-keping-${index_emas}" type="hidden" value="${jenis}" class="form-control" name="new_jumlah_keping[]">
                </td>
                <td>
                    <a href="javascript:void(0);" id="removeRow" data-index_emas="${index_emas}" data-id_emas="${id_emas}" class="action-icon"> <i
                            class="mdi mdi-delete"></i></a>
                </td>
            </tr>
            `)
            $(`#tambah-emas-${id_emas}`).css("display","none");
        });
        $(document).on('click', '#removeRow', function () {
            index_emas = $(this)[0].dataset.index_emas;
            id_emas = $(this)[0].dataset.id_emas;
            var jumlah_terhapus = $(`#jumlah-keping-${index_emas}`)[0].innerText; 
            console.log(jumlah_terhapus);
            var input_total_jumlah = document.getElementById(`total_jumlah_emas`).textContent;
            console.log(input_total_jumlah);
            var nilai_akhir = parseFloat(input_total_jumlah)-parseFloat(jumlah_terhapus);
            nilai_akhir = parseFloat(nilai_akhir).toFixed(1);
            if(nilai_akhir == 0.0){
                nilai_akhir = 0;
            }
            document.getElementById(`total_jumlah_emas`).innerHTML = nilai_akhir;
            document.getElementById(`input_total_jumlah_emas`).value = nilai_akhir;
            $(this).closest(`#item-emas-${index_emas}`).remove();
            $(`#tambah-emas-${id_emas}`).css("display","block");
            var id_rincian_emas = $(this)[0].dataset.id_rincian_emas;
            if(id_rincian_emas){
                $.ajax({
                    type: "DELETE",
                    url: "/admin/pengajuan_dsyirkah/emas/delete/rincian_emas/"+id_rincian_emas,
                    beforeSend: function(xhr){
                        xhr.setRequestHeader('X-CSRF-TOKEN', $('#token').val());
                    },
                    success: function(hasil){
                        console.log("berhasil dihapus");
                    }
                })
            }
        });
    })
</script>
@endpush
@endsection