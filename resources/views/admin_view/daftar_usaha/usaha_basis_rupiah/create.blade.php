@extends('layouts.dashboard')
@section('content')
                <!-- Start Content-->

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">D'Syirkah</a></li>
                                            <li class="breadcrumb-item active">Form Jenis Usaha Basis Emas</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Usaha Basis Emas</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-xxl-8">
                                <div class="card">
                                    <div class="card-body py-0" data-simplebar style="max-height: 700px;"><br>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Judul Usaha</label>
                                            <input type="text" id="simpleinput" class="form-control">
                                        </div>
                                        <div>
                                            <h5>Profile Usaha</h5>
                                            <div id="snow-editor" style="height: 300px;">
                                                .....
                                            </div>
                                        </div><br>

                                        <div>
                                            <h5>Legalitas</h5>
                                            <div id="snow-editor1" style="height: 300px;">
                                                .....
                                            </div>
                                        </div><br>

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                            <div class="col-xxl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="row mb-2">
                                                <div class="col-sm-5">
                                                    <a href="" class="btn btn-primary mb-2"></i> Simpan</a>
                                                </div>
                                            </div><hr>
                                            <div class="col card-body py-0" data-simplebar style="max-height: 570px;"><br>
                                                <h5>Info</h5><hr>
                                                <div class="col-md-12">
                                                    <div class="card border-primary border">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-primary">Posting</h5>
                                                                 <div class="col-md">
                                                                    <label for="example-select" class="form-label">Status Post</label>
                                                                    <select class="form-select" id="example-select" required>
                                                                        <option selected>Pilih</option>
                                                                        <option>Draf</option>
                                                                        <option>Posting</option>
                                                                        <option>Cancel</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-md">
                                                                    <label for="fullname" class="form-label">Tanggal Post</label>
                                                                    <input class="form-control date" type="date" id="fullname" placeholder="dd/mm/yyyy" required>
                                                                </div><br>
                                                                <div class="col-md">
                                                                    <label for="fullname" class="form-label">User Create</label>
                                                                    <input class="form-control date" type="text" id="fullname" readonly="">
                                                                </div><br>
                                                                <div class="col-md">
                                                                    <label for="fullname" class="form-label">User Edit</label>
                                                                    <input class="form-control date" type="text" id="fullname" readonly="">
                                                                </div>
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                </div> <!-- end col-->

                                                <h5>Data Pendukung Usaha</h5><hr>
                                                <div class="col-md-12">
                                                    <div class="card border-primary border">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-primary">Status Usaha</h5>
                                                                <div class="col-md">
                                                                    <label for="example-select" class="form-label">Status Dana</label>
                                                                    <select class="form-select" id="example-select" required>
                                                                        <option selected>Pilih</option>
                                                                        <option>Draf</option>
                                                                        <option>Pengumpulan Dana</option>
                                                                        <option>Sudah Terpenuhi</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-md">
                                                                    <label for="example-select" class="form-label">Kategori</label>
                                                                    <select class="form-select" id="example-select" required>
                                                                        <option selected>Pilih</option>
                                                                        <option>UMKM Peternakan</option>
                                                                        <option>UMKM Kesehatan</option>
                                                                        <option>UMKM Perikanan</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-md">
                                                                    <label for="example-select" class="form-label">Jenis Akad</label>
                                                                    <select class="form-select" id="example-select" required>
                                                                        <option selected>Pilih</option>
                                                                        <option>Mutlaqah</option>
                                                                        <option>Muqqayyadah</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-md">
                                                                    <label for="example-select" class="form-label">Jenis Form / Bentuk (Jika Muqoyyadah)</label>
                                                                    <select class="form-select" id="example-select" required>
                                                                        <option>Rupiah</option>
                                                                    </select>
                                                                    <small>jika mutlaqah tidak ada form ini</small>
                                                                </div><br>

                                                                <div class="col-md">
                                                                    <label for="fullname" class="form-label">Kebutuhan (dalam Rupiah)</label>
                                                                    <input class="form-control date" type="text" id="fullname" required>
                                                                </div><br>

                                                                <div class="col-md">
                                                                    <label for="fullname" class="form-label">Jangka Waktu (dalam Angka)</label>
                                                                    <input class="form-control date" type="text" id="fullname" required>
                                                                </div><br>

                                                                <div class="col-md">
                                                                    <label for="fullname" class="form-label">Capaian (jika Muqoyyadah)</label>
                                                                    <input class="form-control date" type="text" id="fullname" readonly="">
                                                                </div><br>

                                                                <!-- Jika sudah di posting / tercapai-->
                                                                <div class="progress" style="height: 25px; ">
                                                                    <div class="progress-bar bg-success " role="progressbar" style="width: 25%; " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div><br>
                                                                </div>

                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                </div><!-- end col-->
                                                <hr>
                                                <!-- start attachments -->
                                                <p>Keterangan</p>
                                                <p>Ada ceklis dijadikan foto depan</p>
                                                <p>Upload Foto maksimal 5</p>
                                                <p>Upload file untuk tombol Proposal</p>
                                                <h5 class="mt-4 mb-2 font-16">Upload Photo (file jpg/png)</h5>
                                                <!-- File Upload -->
                                                <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                                data-upload-preview-template="#uploadPreviewTemplate">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple />
                                                </div>

                                                <div class="dz-message needsclick">
                                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                                    <h3>Drop files here or click to upload.</h3>
                                                </div>
                                                </form>

                                                <!-- Preview -->
                                                <div class="dropzone-previews mt-3" id="file-previews"></div>

                                                <!-- file preview template -->
                                                <div class="d-none" id="uploadPreviewTemplate">
                                                <div class="card mt-1 mb-0 shadow-none border">
                                                    <div class="p-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                                            </div>
                                                            <div class="col ps-0">
                                                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                                                <p class="mb-0" data-dz-size></p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <!-- Button -->
                                                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                                    <i class="dripicons-cross"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="mt-4 mb-2 font-16">Upload Proposal (file Pdf)</h5>
                                                <!-- File Upload -->
                                                <form action="/" method="post" class="dropzone" id="myAwesomeDropzone1" data-plugin="dropzone" data-previews-container="#file-previews"
                                                data-upload-preview-template="#uploadPreviewTemplate">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple />
                                                </div>

                                                <div class="dz-message needsclick">
                                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                                    <h3>Drop files here or click to upload.</h3>
                                                </div>
                                                </form>

                                                <!-- Preview -->
                                                <div class="dropzone-previews mt-3" id="file-previews"></div>

                                                <!-- file preview template -->
                                                <div class="d-none" id="uploadPreviewTemplate">
                                                <div class="card mt-1 mb-0 shadow-none border">
                                                    <div class="p-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                                            </div>
                                                            <div class="col ps-0">
                                                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                                                <p class="mb-0" data-dz-size></p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <!-- Button -->
                                                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                                    <i class="dripicons-cross"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                    </div> <!-- container -->
                </div> <!-- content -->
        @push('scripts')
        <!-- quill js -->
        <script src="assets/js/vendor/quill.min.js"></script>
        <!-- quill Init js-->
        <script src="assets/js/pages/demo.quilljs.js"></script>
        <!-- plugin js -->
        <script src="assets/js/vendor/dropzone.min.js"></script>
        <!-- init js -->
        <script src="assets/js/ui/component.fileupload.js"></script>
        @endpush
@endsection