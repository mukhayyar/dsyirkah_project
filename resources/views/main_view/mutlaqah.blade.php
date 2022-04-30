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
                    @foreach($usaha as $data)
                    <div class="col-md-4">
                        <div class="card" >
                            <img src="/images/{{$data->thumbnail}}" width="250" height="400" class="card-img-top" alt="...">
                            <div class="card-body">
                                    <p><b>Kategori Usaha: </b> {{$data->jenis_usaha}}</p>
                                  <p class="card-text">{{$data->profil}}</p>
                                  <p><b>Kebutuhan: </b>@if(isset($data->kebutuhan_emas)) {{number_format($data->kebutuhan_emas,2,",",".")." Gram"}} @else {{"Rp. ".number_format($data->kebutuhan_rupiah,2,",",".")}} @endif</p>
                            <div class="d-grid">
                                    <a href="/mutlaqah/usaha/{{$data->id}}" class="btn btn-lg font-16 btn-primary" id="btn-Wa-center">Lihat Detail </a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $usaha->links() }}

                <div class="row py-2">
                    <div class="col-lg-12">
                        <div class="text-center text-white">
                            <br><br><h5 Class="card-header" style="background-color: rgb(48, 113, 252);">Laporan D'Syirkah Mutlaqah</h5>
                        </div>
                    </div>
                </div>
                <div class="card shadow-lg">
                   <div class="container py-3 tab-pane show active" id="scroll-horizontal-preview">
                    <table class="table table-sm table-centered mb-0 table table-striped w-100 nowrap data-table" id="scroll-horizontal-datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Usaha</th>
                                <th>Periode Laporan</th>
                                <th>Tahun</th>
                                <th>Target Margin</th>
                                <th>Capaian Margin</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
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
        <script>
            $(function(){
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'judul', name: 'judul'},
                        {data: 'jenis_usaha', name: 'jenis_usaha'},
                        {data: 'tanggal_post', name: 'tanggal_post'},
                        {data: 'jangka_waktu', name: 'jangka_waktu'},
                        {data: 'kebutuhan', name: 'kebutuhan'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
            })
        </script>
        @endpush
@endsection