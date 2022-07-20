@extends('layouts.main')
@section('content')
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush
        <!-- START HERO -->
        <section class="hero-section" style="background-color: #dea057">
            <div class="container" >
                <div class="row align-items-center" >
                    <div class="col-md-5">
                        <div class="mt-4">
                            <h2 class="text-white fw-normal hero-title">
                                D'Syirkah Transaksi
                            </h2>
                            <p class="md-4 font-16" style="color: #572423">Berikut adalah histori transaksi anda di D'Syirkah Mutlaqah atau Muqayyadah</p>
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
                        @foreach($collection as $data)
                        <div id="accordion">
                            <div class="card">
                              <div class="card-header" id="heading{{$loop->index}}">
                                <h5 class="mb-0">
                                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$loop->index}}">
                                    {{$data->no_pengajuan}} | {{$data->jenis_syirkah}} | {!!$data->status()!!} 
                                  </button>
                                </h5>
                              </div>
                          
                              <div id="collapse{{$loop->index}}" class="collapse" aria-labelledby="heading{{$loop->index}}" data-parent="#accordion">
                                <div class="card-body">
                                  Referensi: {{$data->referensi}} <br>
                                  Pilihan Program: {{$data->pilihan_program}} <br>
                                  Bulan: {{$data->bulan}} <br>
                                  Nisbah: {{$data->nisbah}} <br>
                                  Alokasi Nisbah: {{$data->alokasi_nisbah}} <br>
                                  Jangka Waktu: {{$data->jangka_waktu}} <br>
                                </div>
                              </div>
                            </div>
                        </div>
                        @endforeach
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