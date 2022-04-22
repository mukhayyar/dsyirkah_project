@extends('layouts.main')
@section('content')

<!-- START SERVICES -->
<section class="py-3" style="background-color: rgb(243, 243, 243);">
    <div class="container">
            <div class="card d-block">
                <div class="card-header" style="background-color: rgb(143, 143, 143);">
                    <div class=" align-items-center mb-2 text-white">
                        <h3>Form Kelengkapan Data Anggota</h3>
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
                                    <input type="text" class="form-control" placeholder="x.xxx.xxxxxx7" aria-label="Recipient's username" readonly>
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="fullname" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" id="fullname" placeholder="Nama Lengkap" readonly="">
                            </div>
                        </div><br>
                        <div class="row g-2">
                            <div class="col-md">
                                <label for="fullname" class="form-label">Nomor HP</label>
                                <input class="form-control" type="text" id="fullname" placeholder="08xxxxxxxx112" readonly="">
                            </div>
                            <div class="col-md">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" placeholder="xxxxxk09@gmail.com" readonly=""> 
                            </div>
                        </div><hr><br>

                        <div class="row g-2">
                            <div class="col-md">
                                <label for="fullname" class="form-label">Nomor KTP</label>
                                <input class="form-control" type="text" id="fullname" placeholder="Masukkan Nomor KTP" required data-toggle="input-mask" data-mask-format="0000000000000000">
                            </div>
                            <div class="col-md">
                                <label for="example-select" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="example-select" required>
                                    <option selected>Pilih</option>
                                    <option>Laki - Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="row g-2">
                            <div class="col-md">
                                <label for="fullname" class="form-label">Tempat Lahir</label>
                                <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required>
                            </div>
                            <div class="col-md">
                                <label for="fullname" class="form-label">Tanggal Lahir</label>
                                <input class="form-control date" type="date" id="fullname" placeholder="dd/mm/yyyy" required>
                            </div>
                        </div><br>

                        <div class="row g-2">
                            <div class="col-md">
                                <label for="example-select" class="form-label">Status Pernikahan</label>
                                <select class="form-select" id="example-select" required>
                                    <option selected>Pilih</option>
                                    <option>Laki - Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="fullname" class="form-label">Nomor NPWP (Jika Punya)</label>
                                <input class="form-control date" type="date" id="fullname" placeholder="000000000" required>
                            </div>
                        </div><hr><br>
                        
                        <div class="col-md">
                            <label for="fullname" class="form-label">Alamat Sesuai KTP</label>
                            <input class="form-control date" type="text" id="fullname" placeholder="Jl. Raya Nommor:00 RT/RW" required>
                        </div>

                        
                        <div class="row g-2">
                            <div class="col-md">
                                <label for="fullname" class="form-label">Provinsi</label>
                                <select class="form-control" name="provinsi" id="form_prov">
                                    <option>--Provinsi--</option>
                                    <option>--Data Masih Diproses--</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="fullname" class="form-label">Kota / Kabupaten</label>
                                <select class="form-control" name="provinsi" id="form_kab">
                                    <option>--Kabupaten/Kota--</option>
                                    <option>--Pilih Provinsi Terlebih Dahulu--</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="row g-2">
                            <div class="col-md">
                                <label for="fullname" class="form-label">Kecamatan</label>
                                <select class="form-control" name="provinsi" id="form_kec">
                                    <option>--Kecamatan--</option>
                                    <option>--Pilih Kabupaten Terlebih Dahulu--</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="fullname" class="form-label">Kelurahan</label>
                                <select class="form-control" name="provinsi" id="form_kel">
                                    <option>--Kelurahan--</option>
                                    <option>--Pilih Kecamatan Terlebih Dahulu--</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="col-md">
                            <label for="example-select" class="form-label">Alamat Tinggal</label>
                            <select class="form-select" id="alamatTinggal" required>
                                <option value="sesuai">Sesuai KTP</option>
                                <option value="tidakSesuai">Tidak Sesuai KTP</option>
                            </select>
                        </div><br>

                        <div id="tidakSesuai" class="domisili" style="display:none">
                            <div class="col-md">
                                <label for="fullname" class="form-label">Alamat Saat ini(domisili)</label>
                                <input class="form-control date" type="text" id="fullname" placeholder="Jl. Raya Nommor:00 RT/RW" required>
                            </div>
                            
                            <div class="row g-2">
                                <div class="col-md">
                                    <label for="fullname" class="form-label">Provinsi</label>
                                    <select class="form-control" name="provinsi" id="form_prov_dom">
                                        <option>--Provinsi--</option>
                                        <option>--Data Masih Diproses--</option>
                                    </select>
                                </div>
                                <div class="col-md">
                                    <label for="fullname" class="form-label">Kota / Kabupaten</label>
                                    <select class="form-control" name="provinsi" id="form_kab_dom">
                                        <option>--Kabupaten/Kota--</option>
                                        <option>--Pilih Provinsi Terlebih Dahulu--</option>
                                    </select>
                                </div>
                            </div><br>
    
                            <div class="row g-2">
                                <div class="col-md">
                                    <label for="fullname" class="form-label">Kecamatan</label>
                                    <select class="form-control" name="provinsi" id="form_kec_dom">
                                        <option>--Kecamatan--</option>
                                        <option>--Pilih Kabupaten Terlebih Dahulu--</option>
                                    </select>
                                </div>
                                <div class="col-md">
                                    <label for="fullname" class="form-label">Kelurahan</label>
                                    <select class="form-control" name="provinsi" id="form_kel_dom">
                                        <option>--Kelurahan--</option>
                                        <option>--Pilih Kecamatan Terlebih Dahulu--</option>
                                    </select>
                                </div>
                            </div><hr><br>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Foto KTP</label>
                            <input class="form-control" type="file" id="formFile">
                        </div><hr><br>

                        <br><div class="mb-3 text-center" >
                            <button class="btn btn-primary" type="submit"> Simpan </button>
                        </div>
                    </form>
                </div>
                
            </div>
    </div>
</section>
<!-- END SERVICES -->
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('#alamatTinggal').change(function(){
            $('.domisili').hide();
            $('#' + $(this).val()).show();
        })
    })
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi",
            success: function(hasil){
                hasil = hasil.provinsi
                hasilAkhir = []
                hasilAkhir.push("<option>--Provinsi--</option>");
                hasil.forEach(element => {
                    value = `${element.id},${element.nama}`
                    hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                });
                $("#form_prov").html(hasilAkhir);
            }
        })
        $("body").on("change","#form_prov",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            console.log(id)
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+id,
                success: function(hasil){
                    hasil = hasil.kota_kabupaten
                    hasilAkhir = []
                    hasilAkhir.push("<option>--Kabupaten/Kota--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                    hasil.forEach(element => {
                        value = `${element.id},${element.nama}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kab").html(hasilAkhir);
                }
            })
            
        })
        $("body").on("change","#form_kab",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            console.log(id)
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota="+id,
                success: function(hasil){
                    hasil = hasil.kecamatan
                    hasilAkhir = []
                    hasilAkhir.push("<option>--Kecamatan--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                    hasil.forEach(element => {
                        value = `${element.id},${element.nama}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kec").html(hasilAkhir);
                }
            })
            
        })
        $("body").on("change","#form_kec",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            console.log(id)
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan="+id,
                success: function(hasil){
                    hasil = hasil.kelurahan
                    hasilAkhir = []
                    hasilAkhir.push("<option>--Kelurahan--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                    hasil.forEach(element => {
                        value = `${element.id},${element.nama}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kel").html(hasilAkhir);
                }
            })
            
        })
    })
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi",
            success: function(hasil){
                hasil = hasil.provinsi
                hasilAkhir = []
                hasilAkhir.push("<option>--Provinsi--</option>");
                hasil.forEach(element => {
                    value = `${element.id},${element.nama}`
                    hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                });
                $("#form_prov_dom").html(hasilAkhir);
            }
        })
        $("body").on("change","#form_prov_dom",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            console.log(id)
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+id,
                success: function(hasil){
                    hasil = hasil.kota_kabupaten
                    hasilAkhir = []
                    hasilAkhir.push("<option>--Kabupaten/Kota--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                    hasil.forEach(element => {
                        value = `${element.id},${element.nama}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kab_dom").html(hasilAkhir);
                }
            })
            
        })
        $("body").on("change","#form_kab_dom",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            console.log(id)
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota="+id,
                success: function(hasil){
                    hasil = hasil.kecamatan
                    hasilAkhir = []
                    hasilAkhir.push("<option>--Kecamatan--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                    hasil.forEach(element => {
                        value = `${element.id},${element.nama}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kec_dom").html(hasilAkhir);
                }
            })
            
        })
        $("body").on("change","#form_kec_dom",function(){
            var value = $(this).val()
            const myArray = value.split(",")
            let id = myArray[0]
            console.log(id)
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan="+id,
                success: function(hasil){
                    hasil = hasil.kelurahan
                    hasilAkhir = []
                    hasilAkhir.push("<option>--Kelurahan--</option>");
                    hasilAkhir.push("<option>--Data Masih Diproses--</option>");
                    hasil.forEach(element => {
                        value = `${element.id},${element.nama}`
                        hasilAkhir.push("<option value='"+value+"'>"+element.nama+"</option>");
                    });
                    $("#form_kel_dom").html(hasilAkhir);
                }
            })
            
        })
    })
</script>
@endpush
@endsection