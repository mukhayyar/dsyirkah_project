@extends('layouts.main')
@section('content')
        @error('nomor_ba')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <!-- START HERO -->
        <div class="hero-section py-3" style="background-color: #dea057">
            <div class="container">
                <div class="row align-items-center" >
                    <div class="col-lg-4 col-md-12">
                        <div class="mt-md-4">
                            <h1 class="text-white display-1" style="font-size: 85px">
                                3000+
                            </h1>
                            <h1 class="display-6 fw-bolder" style="color: #572423">
                                SUDAH BERGABUNG
                            </h1>
                            <h1 class="text-white font-20">
                                Dalam Program D'Syirkah EOA CLUB
                            </h1>
                            <p class="font-18 text-white">Sebuah Program untuk membangun kekuatan ekonomi umat islam dengan berjama'ah dan saling tolong menolong 
                                dalam mengembangkan aset harta untuk kesuksesan dunia akhirat
                            </p>
                            <a href="/" class="navbar-brand me-lg-3 " style="z-index: 200">
                                <img src="/assets/images/buttondsyirkah.png" alt="" class="logo-dark" height="70">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-2" style="position: relative; top: 75px;">
                        <div class="text-md-end mt-3 me-lg d-none d-lg-block">
                            <img src="assets/images/headericon.png" alt="" style="image-size: 10px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- END HERO -->

        <!-- START Keuntungan Anggota -->
        <section class="py-3" style="background-color: white ">
            <div class="container">
                <div class="row py-4">
                    <div class="col-lg-12">
                        <div class="text-center" style="color: #724100">
                            <img src="/assets/images/keuntungan.png" alt="" class="logo-dark" height="40">
                            <h2>Apa keuntungan menjadi</h2>
                            <h1 class="fw-bolder">Anggota D'Syirkah:<h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="col-md-5 offset-md-2" style="position: relative; top: -20px; right: 120px;">
                            <div class="text-md-end mt-3 me-lg d-none d-lg-block">
                                <img src="assets/images/jpg2.png" alt="" style="image-size: 10px" />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12">
                        <div class="text-left p-3 p-lg-3 h3" style="color: #724100">
                            <ul style="list-style-image: url(/assets/images/list.png)" height="3">
                                <li>Aset kita bisa bermanfaat untuk dunia dan akhirat, InsyaAllah.</li><br>
                                <li>Mendapat Keuntungan bagi hasil usaha sesuai dengan akad syariah (Passive income)</li><br>
                                <li>Aset yang kita titipkan akan di olah oleh tim yang profesional</li><br>
                                <li>Tidak perlu menjalankan bisnis sendiri atau membuat sistem bisnis sendiri yang rumit & memakan waktu</li><br>
                                <li>bisa menjadi pilihan yang optimal, karena aset akan terus produktif bahkan disaat tidur</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-1 col-md-6">
                        <div class="col-md-5 offset-md-2" style="position: relative; top: -150px; left: 50px;">
                            <div class="text-md-end mt-3 me-lg d-none d-lg-block">
                                <img src="assets/images/jpg2back.png" alt="" style="image-size: 10px" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- END keuntungan Anggota -->
        
        <!-- START Keuntungan Mitra -->
        <section class="py-3" style="background-color: #dea057; background-image: url('assets/images/jpg3back.png'); background-repeat: no-repeat">
            <div class="container">
                <div class="row py-4">
                    <div class="col-lg-12">
                        <div class="text-center" style="color: #724100">
                            <img src="/assets/images/mitrausaha.png" alt="" class="logo-dark" height="40">
                            <h2>Keuntungan Menjadi</h2>
                            <h1 class="fw-bolder">Mitra Usaha:<h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-1 col-md-6">
                        <div class="col-md-5 offset-md-2">
                        </div>
                    </div>
                    

                    <div class="col-lg-8 col-md-12">
                        <div class="text-left p-3 p-lg-3 h3" style="color: #724100">
                            <ul style="list-style-image: url(/assets/images/list.png)" height="3">
                                <li>Mendapatkan Modal Usaha yang Insya Allah Berkah, Sehingga bisa menjadi modal bisnis untuk makin berkembang dan menguntungkan.</li><br><br>
                                <li>Mengekspansi bisnis menjadi lebih besar lagi</li><br>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="col-md-5 offset-md-2" style="position: relative; top: -360px; left: -70px;">
                            <div class="text-md-end mt-3 me-lg d-none d-lg-block">
                                <img src="assets/images/jpg3.png" alt="" style="image-size: 0px" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- END SERVICES Mitra -->

        <!-- START Keuntungan Anggota Dekstop -->
        <section class="py-5 d-none d-lg-block" style="position: relative; top: -250px; background-color: white ">
            <div class="container">
                

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="col-md-5 offset-md-2" style="position: relative; top: 80px; left: -180px;">
                            <div class="text-md-end mt-3 me-lg d-none d-lg-block">
                                <img src="assets/images/jpg4.png" alt="" style="image-size: 10px" />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="text-left" style="color: #724100">
                            <h2>Kenapa ada lebih dari 3.000+ Orang</h2>
                            <h1 class="fw-bolder">memilih D'syirkah EOA Club?<h1>
                        </div>
                        <div class="text-left p-3 p-lg-3 h3" style="color: #724100">
                            <ul style="list-style-image: url(/assets/images/memilih.png)" height="3">
                                <li>Diawasi Oleh dewan pengawas syariah, insyaAllah sistem yang digunakan pun berlandaskan Syariah.</li><br>
                                <li>Modal dana D'Syirkah akan diserahkan untuk usaha yang hanya sudah berjalan & menguntungkan di bidang peternakan, pertanian dan sebagainya yang sudah bekerjasama dengan EOA Club</li><br>
                                <li>Dipercayai untuk memegang amanah pengembangan aset oleh lebih dari 3.000+ Orang dan terus bertambah</li><br>
                                <li>D'Syirkah sudah berjalan sejak tahun 2020</li><br>
                                <li>Transparansi pelaporan bagi hasil yang dilakukan 3 bulan sekali kepada</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-1 col-md-6">
                        <div class="col-md-5 offset-md-2" style="position: relative; top: 750px; left: 0px;">
                            <div class="text-md-end mt-3 me-lg d-none d-lg-block">
                                <img src="assets/images/jpg4back.png" alt="" style="image-size: 10px" />
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-12">
                            <div class="text-center" style="position: relative; top: 100px;">
                                <img src="/assets/images/chat.png" alt="" class="logo-dark" height="40">
                                <h2 style="color: #724100">Ada masalah,</h2>
                                <h1 class="fw-bolder" style="color: #724100">ADA SOLUSI DARI EOA CLUB:<h1>
                                <button type="button" class="btn btn-new h5 btn-lg"><i class="mdi mdi-whatsapp"></i> <span><b>WA US YOUR QUESTION</span> </button>
                            </div>
                            <div class="col-md-12" style="position: relative; top: 180px;">
                                <div class="card-new" style="color: #724100">
                                    <div class="card-body">
                                        <div class="">
                                            <i class=""><img src="/assets/images/keuntungan.png" alt="" class="logo-dark" height="30"></i><span style="font-size: 25px">
                                                Punya tabungan lebih tapi tidak punya waktu berbisnis sendiri</span>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            <div class="col-md-12" style="position: relative; top: 220px;">
                                <div class="card-new" style="color: #724100">
                                    <div class="card-body">
                                        <div class="">
                                            <i class=""><img src="/assets/images/keuntungan.png" alt="" class="logo-dark" height="30"></i><span style="font-size: 25px">
                                                Mau mulai berbisnis tapi tidak punya pengalaman</span>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            <div class="col-md-12" style="position: relative; top: 260px;">
                                <div class="card-new" style="color: #724100">
                                    <div class="card-body">
                                        <div class="">
                                            <i class=""><img src="/assets/images/keuntungan.png" alt="" class="logo-dark" height="30"></i><span style="font-size: 25px">
                                                Banyak program diluar sana yang masi diragukan kehalalannya secara syariah</span>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END keuntungan Anggota -->

        <!-- START Keuntungan Anggota hp -->
        <section class="py-5 d-xl-none" style=" background-color: white ">
            <div class="container">
                <div class="row">
                    <div class=" col-md-1">
                        <div class="col-md-5 offset-md-2">
                            <div class="text-md-end mt-3 me-lg d-none d-lg-block">
                                <img src="assets/images/jpg4.png" alt="" style="image-size: 10px" />
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-11">
                        <div class="text-left" style="color: #724100">
                            <h2>Kenapa ada lebih dari 3.000+ Orang</h2>
                            <h1 class="fw-bolder">memilih D'syirkah EOA Club?<h1>
                        </div>
                        <div class="text-left p-3 p-lg-3 h3" style="color: #724100">
                            <ul style="list-style-image: url(/assets/images/memilih.png)" height="3">
                                <li>Diawasi Oleh dewan pengawas syariah, insyaAllah sistem yang digunakan pun berlandaskan Syariah.</li><br>
                                <li>Modal dana D'Syirkah akan diserahkan untuk usaha yang hanya sudah berjalan & menguntungkan di bidang peternakan, pertanian dan sebagainya yang sudah bekerjasama dengan EOA Club</li><br>
                                <li>Dipercayai untuk memegang amanah pengembangan aset oleh lebih dari 3.000+ Orang dan terus bertambah</li><br>
                                <li>D'Syirkah sudah berjalan sejak tahun 2020</li><br>
                                <li>Transparansi pelaporan bagi hasil yang dilakukan 3 bulan sekali kepada</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-1 col-md-6">
                        <div class="col-md-5 offset-md-2">
                            <div class="text-md-end mt-3 me-lg d-none d-lg-block">
                                <img src="assets/images/jpg4back.png" alt="" style="image-size: 10px" />
                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <img src="/assets/images/chat.png" alt="" class="logo-dark" height="40">
                                <h2 style="color: #724100">Ada masalah,</h2>
                                <h1 class="fw-bolder" style="color: #724100">ADA SOLUSI DARI EOA CLUB:<h1>
                                <button type="button" class="btn btn-new h5 btn-lg"><i class="mdi mdi-whatsapp"></i> <span><b>WA US YOUR QUESTION</span> </button>
                            </div>
                            <div class="col-md-12 py-3">
                                <div class="card-new" style="color: #724100">
                                    <div class="card-body">
                                        <div class="">
                                            <i class=""><img src="/assets/images/keuntungan.png" alt="" class="logo-dark" height="30"></i><span style="font-size: 25px">
                                                Punya tabungan lebih tapi tidak punya waktu berbisnis sendiri</span>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            <div class="col-md-12 py-3">
                                <div class="card-new" style="color: #724100">
                                    <div class="card-body">
                                        <div class="">
                                            <i class=""><img src="/assets/images/keuntungan.png" alt="" class="logo-dark" height="30"></i><span style="font-size: 25px">
                                                Mau mulai berbisnis tapi tidak punya pengalaman</span>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            <div class="col-md-12 py-3" >
                                <div class="card-new" style="color: #724100">
                                    <div class="card-body">
                                        <div class="">
                                            <i class=""><img src="/assets/images/keuntungan.png" alt="" class="logo-dark" height="30"></i><span style="font-size: 25px">
                                                Banyak program diluar sana yang masi diragukan kehalalannya secara syariah</span>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="py-5 d-xl-none" style="background-color: white ">
            <div class="container">
                

                <div class="row">
                    
                    <div class="col-lg-7 col-md-6">
                        <div class="text-left" style="color: #724100">
                            <h2>Kenapa ada lebih dari 3.000+ Orang</h2>
                            <h1 class="fw-bolder">memilih D'syirkah EOA Club?<h1>
                        </div>
                        <div class="text-left p-3 p-lg-3 h3" style="color: #724100">
                            <ul style="list-style-image: url(/assets/images/list.png)" height="3">
                                <li>Diawasi Oleh dewan pengawas syariah, insyaAllah sistem yang digunakan pun berlandaskan Syariah.</li><br>
                                <li>Modal dana D'Syirkah akan diserahkan untuk usaha yang hanya sudah berjalan & menguntungkan di bidang peternakan, pertanian dan sebagainya yang sudah bekerjasama dengan EOA Club</li><br>
                                <li>Dipercayai untuk memegang amanah pengembangan aset oleh lebih dari 3.000+ Orang dan terus bertambah</li><br>
                                <li>D'Syirkah sudah berjalan sejak tahun 2020</li><br>
                                <li>Transparansi pelaporan bagi hasil yang dilakukan 3 bulan sekali kepada</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row py-4">
                    <div class="col-lg-12">
                        <div class="text-center" style="color: #724100">
                            <img src="/assets/images/keuntungan.png" alt="" class="logo-dark" height="40">
                            <h2>Keuntungan Menjadi</h2>
                            <h1 class="fw-bolder">Mitra Usaha:<h1>
                        </div>
                    </div>
                </div>

            </div>
        </section> --}}
        <!-- END keuntungan Anggota -->

         <!-- START Video -->
         <section class="py-3" style="background-color: #dea057">
            <div class="container">
                <div class="row py-4">
                    <div class="col-lg-12">
                        <div class="text-center" style="color: #724100">
                            <h2>Anda bisa menyaksikan seperti video-video</h2>
                            <h1 class="fw-bolder">MENGENAI D'SYIRKAH PADA KATEGORI DIBAWAH INI<h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2 col-md-1">
                        <div class="col-md-5 offset-md-2">
                        </div>
                    </div>
                    
                    <div class="col-lg-8 col-md-10">
                        <div class="card border" style="border-color: #724100">
                            <div class="card-body">
                                <div class="ratio ratio-16x9">
                                    <iframe src="https://www.youtube.com/embed/PrUxWZiQfy4?autohide=0&showinfo=0&controls=0"></iframe>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>

                    <div class="col-lg-2 col-md-1">
                        <div class="col-md-5 offset-md-2" style="position: relative; top: 390px; left: -70px;">
                            <div class="text-md-end mt-3 me-lg d-none d-lg-block">
                                <img src="/assets/images/jpg5.png" alt="" style="image-size: 0px" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-new h5 btn-lg"><i class="mdi mdi-whatsapp"></i> <span><b>Info Lebih Lanjut (WA CS)</span> </button>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                    
                </div>

            </div>
        </section>
        <!-- END Video -->

        
        
@push('scripts')
@if(Session::has('pop_login'))
<script>
    $(document).ready(function(){
        $("#modal-login").modal('show');
    })
</script>
@endif
@endpush
@endsection