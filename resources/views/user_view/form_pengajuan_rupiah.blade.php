@extends('layouts.main')
@section('content')
 <!-- START SERVICES -->
 <section class="py-3" style="background-color: rgb(243, 243, 243);">
    <div class="container">
            <div class="card d-block">
                <div class="card-header bg-success">
                    <div class=" align-items-center mb-2 text-white">
                        <h3>Form Pengajuan D'Syirkah Rupiah</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="py-0">
                        <h5>Data Pemohon</h5>
                    </div><hr>
                    <form action="#">
                        <div class="row g-2">
                            <div class="col-md">
                                <label class="form-label">Nomor BA</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="x.xxx.xxxxx23" aria-label="Recipient's username" readonly>
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="fullname" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" id="fullname" placeholder="Nama Sesuai" readonly="">
                            </div>
                        </div><br>
                        <div class="row g-2">
                            <div class="col-md">
                                <label for="fullname" class="form-label">Nomor HP</label>
                                <input class="form-control" type="text" id="fullname" placeholder="xxxxxxxxxx985" readonly="">
                            </div>
                            <div class="col-md">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" placeholder="xxxxx788@gmail.com" readonly=""> 
                            </div>
                        </div><hr><br>
                        <div class="row g-2">
                            <div class="col-md">
                                <label for="fullname" class="form-label">Nomor Pengajuan</label>
                                <input class="form-control" type="text" id="fullname" placeholder="Create by System" readonly="">
                            </div>
                            <div class="col-md">
                                <label for="emailaddress" class="form-label">Jenis Syirkah</label>
                                <input class="form-control" type="text" id="emailaddress" placeholder="Mutlaqah" readonly=""> 
                            </div>
                            <div class="col-md">
                                <label for="fullname" class="form-label">Versi D'Syirkah</label>
                                <input class="form-control" type="text" id="fullname" placeholder="3.0" readonly="">
                            </div>
                        </div><hr><br>

                        <div class="row g-2">
                            <div class="col-lg-4">
                                <div class="card text-white bg-success">
                                    <div class="card-body">
                                        <blockquote class="card-bodyquote">
                                            <div class="col-md">
                                                <label for="example-select" class="form-label">Pilihan Program</label>
                                                <select class="form-select" id="pilihanProgram" required>
                                                    <option selected>Pilih</option>
                                                    <option value="reguler">Reguler</option>
                                                    <option value="pokokWakaf">Pokok Diwakafkan</option>
                                                </select>
                                            </div><br>
                                            <div class="col-md program reguler" style="display: none">
                                                <label for="example-select" class="form-label">Jangka Waktu (jika reg)</label>
                                                <select class="form-select" id="example-select" required>
                                                    <option selected>Pilih</option>
                                                    <option>6 Bulan</option>
                                                    <option>12 Bulan</option>
                                                    <option>24 Bulan</option>
                                                </select>
                                            </div><br>
                                            <div class="col-md program reguler" style="display: none">
                                                <label for="fullname" class="form-label">Nisbah (sesuai dg jangka waktu)</label>
                                                <input class="form-control date" type="text" id="fullname" placeholder="(Anggota 50%:50% Club)" readonly>
                                            </div><br>
                                            <div class="col-md program reguler" style="display: none">
                                                <label for="example-select" class="form-label">Perpanjangan (jika reg)</label>
                                                <select class="form-select" id="example-select" required>
                                                    <option selected>Pilih</option>
                                                    <option>Otomatis</option>
                                                    <option>Tidak Otomatis</option>
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
                                        <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000.000.000" data-reverse="true">
                                        <span class="font-13 text-muted">Contoh: 100.000.000</span>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md text-center py-lg-3">
                                            <a href="javascript:void(0);" class="btn mb-2 text-white bg-success" data-bs-toggle="modal" data-bs-target="#modal-tambah-perwada"><i class="mdi mdi-order-numeric-descending me-2"></i>Lihat Nomor Rekening</a>
                                        </div>
                                        <div class="col-md">
                                            <label for="formFile" class="form-label">Upload Bukti Transfer</label>
                                            <input class="form-control" type="file" id="formFile">
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
                                                <input type="radio" id="customRadio1" name="customRadio" class="form-check-input">
                                                <label class="form-check-label" for="customRadio1">Nisbah semua dimasukkan ke Simpanan Berkah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                                <label class="form-check-label" for="customRadio2">Nisbah di Wakafkan 25% melalui Wakaf Peradaban ; 75% dimasukkan ke Simpanan Berkah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                                <label class="form-check-label" for="customRadio3">Nisbah di Wakafkan 50% melalui Wakaf Peradaban ; 50% dimasukkan ke Simpanan Berkah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                                <label class="form-check-label" for="customRadio4">Nisbah di Wakafkan 75% melalui Wakaf Peradaban ; 25% dimasukkan ke Simpanan Berkah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
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
                                                <input type="radio" id="customRadio1" name="customRadio" class="form-check-input">
                                                <label class="form-check-label" for="customRadio6">100% sedekah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                                <label class="form-check-label" for="customRadio7">40% anggota ; 60% sedekah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
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
    </div>
</section>
<!-- END SERVICES -->
@push('styles')
<link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
<style>

    .kbw-signature { width: 100%; height: 200px;}

    #sig canvas{

        width: 100% !important;

        height: auto;

    }

</style>
@endpush
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"
			  integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY="
			  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://keith-wood.name/js/jquery.signature.js"></script>
<script src="/assets/js/jquery.signature.js"></script>
<script>
    $(function() {
        $('#pilihanProgram').change(function(){
            $('.program').hide();
            $('.' + $(this).val()).show();
        })
    })
</script>
<script type="text/javascript">

    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});

    $('#clear').click(function(e) {

        e.preventDefault();

        sig.signature('clear');

        $("#signature64").val('');

    });

</script>
@endpush
@endsection