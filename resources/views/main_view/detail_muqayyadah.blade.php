@extends('layouts.main')
@section('content')
        <!-- START SERVICES -->
        <section class="py-3" style="background-color: rgb(243, 243, 243);">
            <div class="container">
                    <div class="card d-block">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h3 class="">Usaha Maju Bersama</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card ribbon-box">
                                        <div class="ribbon ribbon-new float-start"><i class="mdi mdi-progress-check me-1"></i>{{$usaha->status_dana}} </div>
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        @foreach(json_decode($usaha->usahaImages->nama) as $image)
                                                        @if($loop->index == 0)
                                                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}" class="active"></li>
                                                        @else
                                                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}"></li>
                                                        @endif
                                                        @endforeach
                                                    </ol>
                                                    <div class="carousel-inner" role="listbox">
                                                        @foreach(json_decode($usaha->usahaImages->nama) as $image)
                                                        @if($loop->index == 0)
                                                        <div class="carousel-item active">
                                                            <img class="d-block img-fluid" width="612" height="418" src="/images/{{$image}}" alt="{{$image}}">
                                                        </div>
                                                        @else
                                                        <div class="carousel-item">
                                                            <img class="d-block img-fluid" width="612" height="418" src="/images/{{$image}}" alt="{{$image}}">
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </a>
                                        </div>
                                    </div> <!-- end card-->
                                    
                                    
                                </div>
                                <div class="col-md-6">
                                    <h3>Deskripsi Usaha :</h3>
                                    <hr>
                                    <ul class="nav nav-pills2 bg-nav-pills2 nav-justified mb-3">
                                        <li class="nav-item">
                                            <a href="#home1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 btn-info active" >
                                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Profile Usaha</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#usaha" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 text-white">
                                                <i class="mdi mdi-television-guide d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Kinerja Usaha</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#legalitas" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 btn-info">
                                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Legalitas</span>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="home1">
                                            <p Class="text-muted"> {!!$usaha->profil!!} </p>
                                        </div>
                                        <div class="tab-pane" id="legalitas">
                                            <p Class="text-muted"> {!!$usaha->legalitas!!} </p>
                                        </div>
                                    </div>
                                    <p class="text-muted mb-2">
                                    </p>
                                    <p class="text-muted mb-4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><b>Kategori : </b><small>{{$usaha->jenis_usaha}}</small></p>
                                    <p><b>Bentuk : </b><small>{{$usaha->jenis_form}}</small></p>
                                    <p><b>Kebutuhan : </b><small>@if($usaha->checkUsahaKebutuhan())Rp {{number_format($usaha->kebutuhan_rupiah,2,",",".")}},- @else {{$usaha->kebutuhan_emas}} @endif</small></p>
                                    <p><b>Prediksi Bagi hasil: </b><small>5-10%</small>/Tahun</p>
                                    <p><b>Jangka Waktu : </b><small>{{$usaha->jangkaWaktu()}}</small></p>
                                    <p><b>Capaian : </b><small>@if($usaha->checkUsahaKebutuhan())Rp {{number_format($usaha->capaian_muqayyadah,2,",",".")}},- @else {{$usaha->capaian_muqayyadah}} @endif</small></p>
                                    <div class="progress" style="height: 25px; ">
                                        <div class="progress-bar bg-success " role="progressbar" style="width: {{$usaha->capaian_percent()}}%; " aria-valuenow="{{$usaha->capaian_percent()}}" aria-valuemin="0" aria-valuemax="100">{{$usaha->capaian_percent()}}%</div><br>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-top: 2%;">
                                    <div class="text-sm-center"><h5>Silahkan Hubungi Kami jika membutuhkan penjelasan lebih detail</h5></div>
                                    <div class="text-center mt-sm-0 mt-3 text-sm-center">
                                        <a target="_blank" href="/proposal/{{$usaha->proposal}}" class="btn btn-lg btn-new font-16" id="btn-proposal">
                                            <i class="mdi mdi-book"></i> Lihat Proposal Usaha </a>
                                        <a href="https://wa.me/6281219974532" target="_blank" class="btn btn-lg btn-new font-16" id="btn-Wa-center">
                                            <i class="mdi mdi-whatsapp"></i> WA CS </a>
                                        <a href="/muqayyadah/usaha/{{$usaha->id}}/pengajuan" class="btn btn-lg btn-new font-16" id="btn-form-gabung" >
                                            <i class="mdi mdi-clipboard-edit-outline"></i> Pilih Usaha ini </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-4">
                                        <h5>Posting</h5>
                                        <p>{{date("d M Y",strtotime($usaha->tanggal_post))}} <small class="text-muted">1:00 PM</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </section>
        <!-- END SERVICES -->
@endsection
