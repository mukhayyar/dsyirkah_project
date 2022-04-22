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
                                        <div class="ribbon ribbon-success float-start" style="background-color: rgb(65, 124, 253);"><i class="mdi mdi-progress-check me-1"></i> Draff / Pengumpulan Dana / Sudah Terpenuhi </div>
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                                                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                                                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                                                    </ol>
                                                    <div class="carousel-inner" role="listbox">
                                                        <div class="carousel-item active">
                                                            <img class="d-block img-fluid" src="assets/images/small/small-2.jpg" alt="First slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block img-fluid" src="assets/images/small/small-2.jpg" alt="Second slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block img-fluid" src="assets/images/small/small-1.jpg" alt="Third slide">
                                                        </div>
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
                                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                        <li class="nav-item">
                                            <a href="#home1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 btn-info active">
                                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Profile Usaha</span>
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
                                            <p Class="text-muted"> 1111Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
                                                libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. With supporting text below
                                                as a natural lead-in to additional contenposuere erat a ante. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
                                                libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. With supporting text below
                                                as a natural lead-in to additional contenposuere erat a ante. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
                                                libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. With supporting text below
                                                as a natural lead-in to additional contenposuere erat a ante. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
                                                libero voluptas quod perferendis! Voluptate, quod illo rerum? </p>
                                        </div>
                                        <div class="tab-pane" id="profile1">
                                            <p Class="text-muted"> With supporting text below as a natural lead-in to additional contenposuere erat a ante. Voluptates, illo, iste itaque voluptas
                                                corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate,
                                                quod illo rerum? Lorem ipsum dolor sit amet.</p>
                                        </div>
                                        <div class="tab-pane" id="legalitas">
                                            <p Class="text-muted"> 3333Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
                                                libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. With supporting text below
                                                as a natural lead-in to additional contenposuere erat a ante. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
                                                libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. With supporting text below
                                                as a natural lead-in to additional contenposuere erat a ante. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
                                                libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. With supporting text below
                                                as a natural lead-in to additional contenposuere erat a ante. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
                                                libero voluptas quod perferendis! Voluptate, quod illo rerum? </p>
                                        </div>
                                    </div>
                                    <p class="text-muted mb-2">
                                    </p>
                                    <p class="text-muted mb-4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><b>Kategori : </b><small>UMKM Peternakan</small></p>
                                    <p><b>Bentuk : </b><small>Rupiah / Emas</small></p>
                                    <p><b>Kebutuhan : </b><small>Rp 100.0000.000,- </small></p>
                                    <p><b>Jangka Waktu : </b><small>78 Bulan</small></p>
                                    <p><b>Capaian : </b><small>Rp 25.000.0000,-</small></p>
                                    <div class="progress" style="height: 25px; ">
                                        <div class="progress-bar bg-success " role="progressbar" style="width: 25%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div><br>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-top: 2%;">
                                    <div class="text-sm-center"><h5>Silahkan Hubungi Kami jika membutuhkan penjelasan lebih detail</h5></div>
                                    <div class="text-center mt-sm-0 mt-3 text-sm-center">
                                        <a href="" class="btn btn-lg font-16 btn-danger" id="btn-proposal">
                                            <i class="mdi mdi-book"></i> Lihat Proposal </a>
                                        <a href="" class="btn btn-lg font-16 btn-success" id="btn-Wa-center">
                                            <i class="mdi mdi-whatsapp"></i> WA Customer Services </a>
                                        <a href="" class="btn btn-lg font-16 btn-primary" id="btn-form-gabung" >
                                            <i class="mdi mdi-clipboard-edit-outline"></i> Daftar </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-4">
                                        <h5>Posting</h5>
                                        <p>17 March 2018 <small class="text-muted">1:00 PM</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </section>
        <!-- END SERVICES -->
@endsection
