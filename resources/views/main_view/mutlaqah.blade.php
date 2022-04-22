@extends('layouts.main')
@section('content')
        <!-- START HERO -->
        <section class="hero-section" style="background-color: rgb(48, 113, 252);" >
            <div class="container" >
                <div class="row align-items-center" >
                    <div class="col-md-5">
                        <div class="mt-4">
                            <h2 class="text-white fw-normal hero-title">
                                D'Syirkah Mutlaqah
                            </h2>
                            <p class="md-4 font-16 text-white">D'Syirkah Mutlaqah adalah salah satu Produk dari EOA Club (KSPPS Simpul Berkah Sinerggi)</p>
                        </div>
                    </div>
                </div><br>
                <div class="col-md-5 g-3">
                    <a href="" class="btn btn-lg font-16 btn-success" id="btn-form-gabung">
                        <i class="mdi mdi-clipboard-edit-outline"></i> Ikut dengan Rupiah </a>
                    <a href="" class="btn btn-lg font-16 text-white" id="btn-form-gabung" style="background-color: goldenrod;">
                        <i class="mdi mdi-clipboard-edit-outline"></i > Ikut dengan Emas </a>
                </div><br>
                <div class="col-md-6 card shadow-sm">
                    <div class="container">
                        <h5 class="text-black fw-normal hero-title">
                            Target D'Syirkah Mutlaqah Saat ini :
                        </h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="text-black"> <stong> Target Rupiah : Rp 9.000.000.000,-</stong></p>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">Capaian 90%</div>
                                </div><br>
                            </div>
                            <div class="col-lg-6">
                                <p class="text-black"> <stong> Target Gold : 1.000 Gram</stong></p>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">Capaian 90%</div>
                            </div><br>
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
                            <br><br><h5 Class="card-header" style="background-color: rgb(48, 113, 252);">Berikut Untuk Penyaluran D'Syirkah Mutlaqah</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card" >
                            <img src="OIP.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                    <p><b>Kategori Usaha: </b> UMKM</p>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <p><b>Kebutuhan: </b>Rp 1.000.000.000,-</p>
                            <div class="d-grid">
                                    <a href="/detail_mutlaqah" class="btn btn-lg font-16 btn-primary" id="btn-Wa-center">Lihat Detail </a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" >
                            <img src="OIP.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                    <p><b>Kategori Usaha: </b> UMKM</p>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <p><b>Kebutuhan: </b> 250 Gram</p>
                            <div class="d-grid">
                                    <a href="/detail_mutlaqah" class="btn btn-lg font-16 btn-primary" id="btn-Wa-center">Lihat Detail </a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" >
                            <img src="OIP.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                    <p><b>Kategori Usaha: </b> UMKM</p>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <p><b>Kebutuhan: </b> 300 Gram</p>
                            <div class="d-grid">
                                    <a href="/detail_mutlaqah" class="btn btn-lg font-16 btn-primary" id="btn-Wa-center">Lihat Detail </a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="javascript: void(0);" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="javascript: void(0);">Next</a>
                        </li>
                    </ul>
                </nav>

                <div class="row py-2">
                    <div class="col-lg-12">
                        <div class="text-center text-white">
                            <br><br><h5 Class="card-header" style="background-color: rgb(48, 113, 252);">Laporan D'Syirkah Mutlaqah</h5>
                        </div>
                    </div>
                </div>
                <div class="card shadow-lg">
                   <div class="container py-3 tab-pane show active" id="scroll-horizontal-preview">
                    <table class="table table-sm table-centered mb-0 table table-striped w-100 nowrap" id="scroll-horizontal-datatable">
                        <thead>
                            <tr>
                                <th>Nama Usaha</th>
                                <th>Periode Laporan</th>
                                <th>Tahun</th>
                                <th>Target Margin</th>
                                <th>Capaian Margin</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>UMKM Peternakan</td>
                                <td>Periode 1</td>
                                <td>2022</td>
                                <td>3%</td>
                                <td>4%</td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-editakun-admin"> <i class="mdi mdi-file-pdf-box"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>UMKM Peternakan</td>
                                <td>Periode 1</td>
                                <td>2022</td>
                                <td>3%</td>
                                <td>4%</td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-editakun-admin"> <i class="mdi mdi-file-pdf-box"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>UMKM Peternakan</td>
                                <td>Periode 1</td>
                                <td>2022</td>
                                <td>3%</td>
                                <td>4%</td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-editakun-admin"> <i class="mdi mdi-file-pdf-box"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>UMKM Peternakan</td>
                                <td>Periode 1</td>
                                <td>2022</td>
                                <td>3%</td>
                                <td>4%</td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-editakun-admin"> <i class="mdi mdi-file-pdf-box"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>UMKM Peternakan</td>
                                <td>Periode 1</td>
                                <td>2022</td>
                                <td>3%</td>
                                <td>4%</td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-editakun-admin"> <i class="mdi mdi-file-pdf-box"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>UMKM Peternakan</td>
                                <td>Periode 1</td>
                                <td>2022</td>
                                <td>3%</td>
                                <td>4%</td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-editakun-admin"> <i class="mdi mdi-file-pdf-box"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                   </div>

                </div>
            </div>
        </section>
        <!-- END SERVICES -->
        @push('scripts')
        <!-- third party js -->
        <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>
        <script src="assets/js/vendor/dataTables.buttons.min.js"></script>
        <script src="assets/js/vendor/buttons.bootstrap5.min.js"></script>
        <script src="assets/js/vendor/buttons.html5.min.js"></script>
        <script src="assets/js/vendor/buttons.flash.min.js"></script>
        <script src="assets/js/vendor/buttons.print.min.js"></script>
        <script src="assets/js/vendor/dataTables.keyTable.min.js"></script>
        <script src="assets/js/vendor/dataTables.select.min.js"></script>
        <script src="assets/js/vendor/fixedColumns.bootstrap5.min.js"></script>
        <script src="assets/js/vendor/fixedHeader.bootstrap5.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="assets/js/pages/demo.datatable-init.js"></script>
        @endpush
@endsection