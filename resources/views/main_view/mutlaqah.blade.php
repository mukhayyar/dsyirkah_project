@extends('layouts.main')
@section('content')
        <!-- START HERO -->
        <section class="hero-section" style="background-color: #dea057">
            <div class="container" >
                <div class="row align-items-center" >
                    <div class="col-md-5">
                        <div class="mt-4">
                            <h2 class="text-white fw-normal hero-title">
                                D'Syirkah Mutlaqah
                            </h2>
                            <p class="md-4 font-21" style="color: #572423">D'Syirkah Mutlaqah adalah salah satu Produk dari EOA Club (KSPPS Simpul Berkah Sinerggi)</p>
                        </div>
                    </div>
                </div><br>
                <div class="col-md-5 g-3">
                    <a href="/mutlaqah/pengajuan/rupiah" class="btn btn-lg btn-new font-16 text-white" id="btn-form-gabung">
                        <i class="mdi mdi-clipboard-edit-outline"></i> Simpanan Rupiah</a>

                    <a href="/mutlaqah/pengajuan/emas" class="btn btn-lg btn-new font-16 text-white" id="btn-form-gabung">
                        <i class="mdi mdi-clipboard-edit-outline"></i > Simpanan Emas </a>
                </div><br>
                <div class="col-md-6 card shadow-sm">
                    <div class="container">
                        <h5 class="text-center py-2" style="color: #572423">
                            Target D'Syirkah Mutlaqah Saat ini :
                        </h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="text-black"> <stong> Target Rupiah : Rp {{number_format($target_rupiah,0,",",".")}},-</stong></p>
                                @if($target_rupiah!=0)
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$percent_target_rupiah}}%;" aria-valuenow="{{$percent_target_rupiah}}" aria-valuemin="0" aria-valuemax="100">Capaian {{$percent_target_rupiah}}%</div>
                                </div><br>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <p class="text-black"> <stong> Target Gold : {{number_format($target_emas,0,",",".")}} Gram</stong></p>
                                @if($target_emas!=0)
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$percent_target_emas}}%;" aria-valuenow="{{$percent_target_emas}}" aria-valuemin="0" aria-valuemax="100">Capaian {{$percent_target_emas}}%</div>
                                </div><br>
                                @endif
                        </div><hr>
                    </div>
                </div>
            </div>
        </section>
        <!-- END HERO -->

        <!-- START SERVICES -->
        <section class="py-0" style="background-color: rgb(243, 243, 243);">
            <div class="container">
                <div class="row py-2">
                    <div class="col-lg-12">
                        <div class="text-center text-white">
                            <br><br><h5 Class="card-header" style="background-color: #572423">Berikut Untuk Penyaluran D'Syirkah Mutlaqah</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($usaha as $data)
                    <div class="col-md-4">
                        <div class="card" >
                            <img src="/images/{{$data->thumbnail}}" width="250" height="400" class="card-img-top" alt="...">
                            <div class="card-body" style="background-color: #fefbea">
                                <p><b>Kategori Usaha: </b> {{$data->jenis_usaha}}</p>
                                <p><b>Nama Usaha: </b> {{$data->judul}}</p>
                                  <p><b>Definisi Usaha : </b>{!! Str::limit($data->profil,150) !!}</p>
                                  <p><b>Kebutuhan Modal: </b>@if(isset($data->kebutuhan_emas)) {{number_format($data->kebutuhan_emas,2,",",".")." Gram"}} @else {{"Rp. ".number_format($data->kebutuhan_rupiah,2,",",".")}} @endif</p>
                                  <p><b>Prediksi Margin: </b> 5-10%</p>
                            <div class="d-grid">
                                    <a href="/mutlaqah/usaha/{{$data->id}}" class="btn btn-lg font-16 text-white btn-new" id="btn-Wa-center">Lihat Detail </a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {{ $usaha->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </section>
        <!-- END SERVICES -->
        @if(!$check_lengkap_data->no_ktp)
        <div class="modal fade" id="modal fade show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" >
                    <div class="modal-header" style="background-color: #a3610a">
                        <h4 class="modal-title text-white" id="modal-not-login" >Warning!</h4>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body text-center" >
                        <h4>Anda Belum Bisa Mengakses Halaman Ini!</h4>
                        <div style="margin-top: 2%;">
                            <div class="text-sm-center"><h5>Untuk Mengakses Halaman Ini, Silahkan Melengkapi Data Diri Terlebih Dahulu.</h5></div>
                            <div class="modal-footer">
                                <a href="/user/kelengkapan_data" class="btn btn-primary">Lengkapi Data Diri</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
@endsection