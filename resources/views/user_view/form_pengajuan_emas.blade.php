@extends('layouts.main')
@section('content')
<!-- START SERVICES -->
<section class="py-3" style="background-color: rgb(243, 243, 243);">
    <div class="container">
            <div class="card d-block">
                <div class="card-header" style="background-color: goldenrod;">
                    <div class=" align-items-center mb-2 text-white">
                        <h3>Form Pengajuan D'Syirkah Gold</h3>
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
                                <div class="card text-white" style="background-color: goldenrod;">
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
                                                <label for="fullname" class="form-label">Nisbah (sesuai dg jangka waktu)</label>
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
                                                <th> <span id="total_jumlah_emas">0</span> Gram</th>
                                                <input type="hidden" value="" id="input_total_jumlah_emas" name="total_jumlah_emas">
                                                <th style="width: 50px;"></th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="form_tambah_emas">
                                        </tbody>
                                    </table>
                                </div><hr><br> <!-- end table-responsive-->
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
                                                <input type="radio" id="customRadio1" name="alokasiNisbah" class="form-check-input" value="Nisbah semua dimasukkan ke Simpanan Berkah">
                                                <label class="form-check-label" for="customRadio1">Nisbah semua dimasukkan ke Simpanan Berkah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="alokasiNisbah" class="form-check-input" value="Nisbah di Wakafkan 25% melalui Wakaf Peradaban ; 75% dimasukkan ke Simpanan Berkah">
                                                <label class="form-check-label" for="customRadio2" >Nisbah di Wakafkan 25% melalui Wakaf Peradaban ; 75% dimasukkan ke Simpanan Berkah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="alokasiNisbah" class="form-check-input"
                                                value="Nisbah di Wakafkan 50% melalui Wakaf Peradaban ; 50% dimasukkan ke Simpanan Berkah">
                                                <label class="form-check-label" for="customRadio3">Nisbah di Wakafkan 50% melalui Wakaf Peradaban ; 50% dimasukkan ke Simpanan Berkah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="alokasiNisbah" class="form-check-input" value="Nisbah di Wakafkan 75% melalui Wakaf Peradaban ; 25% dimasukkan ke Simpanan Berkah">
                                                <label class="form-check-label" for="customRadio4">Nisbah di Wakafkan 75% melalui Wakaf Peradaban ; 25% dimasukkan ke Simpanan Berkah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="alokasiNisbah" class="form-check-input" value="Nisbah semua di wakafkan melalui Wakaf Peradaban">
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
                                                <input type="radio" id="customRadio1" name="alokasiNisbah" class="form-check-input" value="100% sedekah">
                                                <label class="form-check-label" for="customRadio6">100% sedekah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="alokasiNisbah" class="form-check-input" value="40% anggota ; 60% sedekah">
                                                <label class="form-check-label" for="customRadio7">40% anggota ; 60% sedekah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="alokasiNisbah" class="form-check-input" value="25% anggota ; 75% sedekah">
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
                                        <textarea name="catatan" id="" cols="70" rows="10" required></textarea>
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
                                    @foreach($item_emas as $emas)
                                    <div class="row g-2">
                                        <div class="col-md">
                                            <label for="" class="form-label">Item Emas</label>
                                            <input type="text" class="form-control" value="{{$emas->nama}}" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label for="" class="form-label">Jenis</label>
                                            <input type="text" class="form-control" value="{{$emas->jenis}}" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label for="" class="form-label">Gramasi</label>
                                            <input type="text" class="form-control" value="{{$emas->gramasi}}" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label for="" class="form-label">-</label>
                                            <button class="btn btn-warning tambah_emas" id="tambah-emas-{{$emas->id}}" data-bs-dismiss="modal" data-item="{{$emas->nama}}" data-jenis="{{$emas->jenis}}" data-gramasi="{{$emas->gramasi}}" data-id_emas="{{$emas->id}}" type="button">Tambah</button>
                                        </div>
                                    </div>
                                    @endforeach
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
        for(let i = 1; i<=length; i++)
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
    })
    $(document).ready(function(){
        var id_versi = $("#id_versi").val();
        $.ajax({
            type: "GET",
            url: "/api/versi/bulan/"+id_versi,
            success: function(hasil){
                hasilAkhir = [];
                hasilAkhir.push("<option>--Pilih--</option>");
                hasil.forEach(element => {
                    value = `${element.id},${element.bulan}`;
                    hasilAkhir.push("<option value='"+value+"'>"+element.bulan+" Bulan</option>");
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
            item = $(this)[0].dataset.item;
            jenis = $(this)[0].dataset.jenis;
            gramasi = $(this)[0].dataset.gramasi;
            id_emas = $(this)[0].dataset.id_emas;
            var length = $("#form_tambah_emas tr").length;
            let index_emas = 1;
            if(length != 0){
                index_emas++;
            }
            $("#form_tambah_emas").append(`
            <tr id="item-emas-${index_emas}">
                <td>${item}</td>
                <input type="hidden" value="${item}" class="form-control" name="item_emas[]">
                <td>
                    <span class="badge badge-primary-lighten">${jenis}</span>
                    <input type="hidden" value="${jenis}" class="form-control" name="jenis_emas[]">
                </td>
                <td>${gramasi}</td>
                <input type="hidden" value="${gramasi}" class="form-control gramasi-${index_emas}" name="gramasi_emas[]">
                <td>
                    <input id="input-keping-emas-${index_emas}" type="number" min="1" value="" oninput="jumlahGram(${index_emas})" name="keping_emas[]" class="form-control" placeholder="Qty" style="width: 90px;" required>
                </td>
                <td>
                    <span id="jumlah-keping-${index_emas}">
                       0
                    </span>
                    Gram
                    <input id="input-jumlah-keping-${index_emas}" type="hidden" value="${jenis}" class="form-control" name="jumlah_keping[]">
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
            var input_total_jumlah = document.getElementById(`input_total_jumlah_emas`).value;
            var nilai_akhir = parseFloat(input_total_jumlah)-parseFloat(jumlah_terhapus);
            nilai_akhir = parseFloat(nilai_akhir).toFixed(1);
            if(nilai_akhir == 0.0){
                nilai_akhir = 0;
            }
            document.getElementById(`total_jumlah_emas`).innerHTML = nilai_akhir;
            document.getElementById(`input_total_jumlah_emas`).value = nilai_akhir;
            $(this).closest(`#item-emas-${index_emas}`).remove();
            $(`#tambah-emas-${id_emas}`).css("display","block");
        });
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