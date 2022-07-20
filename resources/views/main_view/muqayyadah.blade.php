@extends('layouts.main')
@section('content')
    <!-- START HERO -->
    <section class="hero-section" style="background-color: #dea057">
        <div class="container" >
            <div class="row align-items-center" >
                <div class="col-md-5">
                    <div class="mt-4">
                        <h2 class="text-white fw-normal hero-title">
                            D'Syirkah Muqayyadah
                        </h2>
                        <p class="md-4 font-21" style="color: #572423">D'Syirkah Mutlaqah adalah salah satu Produk dari EOA Club (KSPPS Simpul Berkah Sinerggi)</p>
                    </div>
                </div>
            </div><br>
        </div>
    </section>
    <!-- END HERO -->

    <!-- START SERVICES -->
    <section class="py-2" style="background-color: rgb(243, 243, 243);">
        <div class="container">
            <div class="row py-2">
                <div class="col-lg-12">
                    <div class="text-center text-white">
                        <br><br><h5 Class="card-header" style="background-color: #572423"> Berikut Untuk Penyaluran D'Syirkah Mutlaqah</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($usaha as $data)
                <div class="col-md-4">
                    <div class="card" >
                        <img src="/images/{{$data->thumbnail}}" class="card-img-top" alt="...">
                        <div class="card-body">
                                <p><b>Kategori Usaha: </b> {{$data->jenis_usaha}}</p>
                                <p><b>Nama Usaha: </b> {{$data->judul}}</p>
                              <p><b>Definisi Usaha : </b>{!!Str::limit($data->profil,150)!!}</p>
                              <p><b>Kebutuhan Modal: </b> @if(isset($data->kebutuhan_emas)) {{number_format($data->kebutuhan_emas,2,",",".")." Gram"}} @else {{"Rp. ".number_format($data->kebutuhan_rupiah,2,",",".")}}@endif</p>
                              <p><b>Prediksi Margin: </b> 5-10%</p>
                              <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$data->capaian_percent()}}%;" aria-valuenow="{{$data->capaian_percent()}}" aria-valuemin="0" aria-valuemax="100">Capaian {{$data->capaian_percent()}}%</div>
                        </div><br>
                        <div class="d-grid">
                                <a href="/muqayyadah/usaha/{{$data->id}}" class="btn btn-lg btn-new font-16 text-white" id="btn-Wa-center">Lihat Detail </a>
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $usaha->links("pagination::bootstrap-4") }}
        </div>
    </section>
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
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        @endif
@endsection
