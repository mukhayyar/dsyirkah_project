@extends('layouts.main')
@section('content')
        <!-- START HERO -->
        <section class="hero-section" style="background-color: rgb(48, 113, 252);" >
            <div class="container" >
                <div class="row align-items-center" >
                    <div class="col-md-5">
                        <div class="mt-4">
                            <h2 class="text-white fw-normal hero-title">
                                D'Syirkah Transaksi
                            </h2>
                            <p class="md-4 font-16 text-white">Berikut adalah histori transaksi anda di D'Syirkah Mutlaqah atau Muqayyadah</p>
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
                        <div id="accordion">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Collapsible Group Item #1
                                  </button>
                                </h5>
                              </div>
                          
                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>

                <div class="row">
                   
                </div>
            </div>
        </section>
        <!-- END SERVICES -->
        @if(!$check_lengkap_data->no_ktp)
        <div id="exampleModalLive" class="modal fade show" tabindex="-1" aria-modal="true" aria-labelledby="myLargeModalLabel" role="dialog" style="display: block;">
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
@push('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush
@endsection