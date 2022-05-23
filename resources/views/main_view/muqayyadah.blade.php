@extends('layouts.main')
@section('content')
    <!-- START HERO -->
    <section class="hero-section" style="background-color: rgb(48, 113, 252);" >
        <div class="container" >
            <div class="row align-items-center" >
                <div class="col-md-5">
                    <div class="mt-4">
                        <h2 class="text-white fw-normal hero-title">
                            D'Syirkah Muqayyadah
                        </h2>
                        <p class="md-4 font-16 text-white">D'Syirkah Mutlaqah adalah salah satu Produk dari EOA Club (KSPPS Simpul Berkah Sinerggi)</p>
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
                        <br><br><h5 Class="card-header" style="background-color: rgb(48, 113, 252);">Berikut Untuk Penyaluran D'Syirkah Mutlaqah</h5>
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
                              <p class="card-text">{{$data->profil}}</p>
                              <p><b>Kebutuhan: </b> @if(isset($data->kebutuhan_emas)) {{number_format($data->kebutuhan_emas,2,",",".")." Gram"}} @else {{"Rp. ".number_format($data->kebutuhan_rupiah,2,",",".")}}@endif</p>
                              <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">Capaian 90%</div>
                        </div><br>
                        <div class="d-grid">
                                <a href="/muqayyadah/usaha/{{$usaha->id}}" class="btn btn-lg font-16 btn-primary" id="btn-Wa-center">Lihat Detail </a>
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $usaha->links() }}
        </div>
    </section>
    @if(!$check_lengkap_data->no_ktp)
        <div id="exampleModalLive" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="display: block;">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLiveLabel">Kamu Belum Bisa Mengakses Halaman Ini!</h5>
                </div>
                <div class="modal-body">
                  <p>Untuk Mengakses Halaman Ini, Mohon Melengkapi Data Diri Terlebih Dahulu.</p>
                </div>
                <div class="modal-footer">
                  <a href="/user/kelengkapan_data" class="btn btn-primary">Disini</a>
                </div>
              </div>
            </div>
          </div>
        @endif
@endsection
