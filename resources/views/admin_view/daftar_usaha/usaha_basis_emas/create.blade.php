@extends('layouts.dashboard')
@section('content')
@push('styles')
<!-- Quill css -->
<link href="/assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />
@endpush
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
                        @if(isset($usaha))
                        <form action="" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @else
                        <form action="" method="post" enctype="multipart/form-data">
                        @endif    
                        @csrf
                        <div class="row">
                            <div class="col-xxl-8">
                                <div class="card">
                                    <div class="card-body py-0" data-simplebar style="max-height: 700px;"><br>
                                        <div class="mb-3">
                                            <label for="judul_usaha" class="form-label">Judul Usaha</label>
                                            <input type="text" id="judul_usaha" name="judul_usaha" class="form-control" value="@if(isset($usaha)){{$usaha->judul}}@else{{ old('judul_usaha') }}@endif">
                                        </div>
                                        <div>
                                            <h5>Profile Usaha</h5>
                                            <textarea name="profil_usaha" class="form-control" id="profil_usaha" cols="100" rows="10">@if(isset($usaha)){{$usaha->profil}}@else{{ old('profil_usaha') }}@endif</textarea>
                                        </div><br>

                                        <div>
                                            <h5>Legalitas</h5>
                                            <textarea name="legalitas" class="form-control" id="legalitas" cols="100" rows="10">@if(isset($usaha)){{$usaha->legalitas}}@else{{ old('legalitas') }}@endif</textarea>
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
                                                    <button type="submit" class="btn btn-primary mb-2"></i> Simpan</button>
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
                                                                    <select class="form-select" id="statusPost" name="status_post" required>
                                                                        <option value="">Pilih</option>
                                                                        <option value="Draf" @if(isset($usaha))@if($usaha->status_post == 'Draf') selected @endif @elseif(old('status_post') == 'Draf') selected @endif>Draf</option>
                                                                        <option value="Posting" @if(isset($usaha))@if($usaha->status_post == 'Posting') selected="selected" @endif @elseif(old('status_post') == 'Posting') selected @endif>Posting</option>
                                                                        <option value="Cancel" @if(isset($usaha))@if($usaha->status_post == 'Cancel') selected @endif @elseif(old('status_post') == 'Cancel') selected @endif>Cancel</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-md">
                                                                    <label for="fullname" class="form-label">Tanggal Post</label>
                                                                    <input class="form-control date" type="date" name="tanggal_post" id="tanggal_post" placeholder="dd/mm/yyyy" required value="@if(isset($usaha)){{$usaha->tanggal_post}}@else{{ old('tanggal_post') }}@endif">
                                                                </div><br>
                                                                <div class="col-md">
                                                                    <label for="pemilik" class="form-label">Pemilik Usaha</label>
                                                                    <input class="form-control" type="text" id="pemilik" name="pemilik" value="@if(isset($usaha)){{$usaha->pemilik}}@else{{ old('pemilik') }}@endif">
                                                                </div><br>
                                                                <div class="col-md">
                                                                    <label for="user_create" class="form-label">User Create</label>
                                                                    <input class="form-control" type="text" id="user_create" readonly="">
                                                                </div><br>
                                                                <div class="col-md">
                                                                    <label for="user_edit" class="form-label">User Edit</label>
                                                                    <input class="form-control" type="text" id="user_edit" readonly="">
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
                                                                    <label for="status_dana" class="form-label">Status Dana</label>
                                                                    <select class="form-select" id="status_dana" name="status_dana" required>
                                                                        <option value="">Pilih</option>
                                                                        <option value="Draf" @if(isset($usaha))@if($usaha->status_dana == 'draf') selected @endif @elseif(old('status_dana') == 'draf') selected @endif>Draf</option>
                                                                        <option value="Pengumpulan Dana" @if(isset($usaha))@if($usaha->status_dana == 'pengumpulan_dana') selected @endif @elseif(old('status_dana') == 'pengumpulan_dana') selected @endif>Pengumpulan Dana</option>
                                                                        <option value="Sudah Terpenuhi" @if(isset($usaha))@if($usaha->status_dana == 'sudah_terpenuhi') selected @endif @elseif(old('status_dana') == 'sudah_terpenuhi') selected @endif>Sudah Terpenuhi</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-md">
                                                                    <label for="kategori" class="form-label">Kategori</label>
                                                                    <select class="form-select" name="kategori" id="kategori" required>
                                                                        <option value="">Pilih</option>
                                                                        <option value="UMKM Peternakan" @if(isset($usaha))@if($usaha->jenis_usaha == 'UMKM Peternakan') selected @endif @elseif(old('kategori') == 'UMKM Peternakan') selected @endif>UMKM Peternakan</option>
                                                                        <option selected value="UMKM Kesehatan" @if(isset($usaha))@if($usaha->jenis_usaha == 'UMKM Kesehatan') selected @endif @elseif(old('kategori') == 'UMKM Kesehatan') selected @endif>UMKM Kesehatan</option>
                                                                        <option value="UMKM Perikanan" @if(isset($usaha))@if($usaha->jenis_usaha == 'UMKM Perikanan') selected @endif @elseif(old('kategori') == 'UMKM Perikanan') selected @endif>UMKM Perikanan</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-md">
                                                                    <label for="checkMuqayyadah" class="form-label">Jenis Akad</label>
                                                                    <select class="form-select" id="checkMuqayyadah" name="jenis_akad" required>
                                                                        <option value="">Pilih</option>
                                                                        <option value="Mutlaqah" @if(isset($usaha))@if($usaha->jenis_akad == 'Mutlaqah') selected @endif @elseif(old('jenis_akad') == 'Mutlaqah') selected @endif>Mutlaqah</option>
                                                                        <option value="Muqayyadah" @if(isset($usaha))@if($usaha->jenis_akad == 'Muqayyadah') selected @endif @elseif(old('jenis_akad') == 'Muqayyadah') selected @endif>Muqqayyadah</option>
                                                                    </select>
                                                                </div><br>
                                                                <div class="col-md Muqayyadah" style="display:none;">
                                                                    <label for="jenis_form_bentuk" class="form-label">Jenis Form / Bentuk</label>
                                                                    <select class="form-select" id="jenis_form_bentuk" name="jenis_form_bentuk">
                                                                        <option value="">Pilih</option>
                                                                        <option value="emas" @if(isset($usaha))@if($usaha->jenis_form == 'emas') selected @endif @elseif(old('jenis_form_bentuk') == 'emas') selected @endif>Emas</option>
                                                                    </select>
                                                                    <label for="kode_usaha" class="form-label">Kode Usaha</label>
                                                                    <input class="form-control" type="text" name="kode_usaha" id="kode_usaha">
                                                                </div><br>

                                                                <div class="col-md">
                                                                    <label for="kebutuhan" class="form-label">Kebutuhan (dalam Gram)</label>
                                                                    <input class="form-control" name="kebutuhan" type="number" id="kebutuhan" required value="@if(isset($usaha)){{$usaha->kebutuhan_emas}}@else{{ old('kebutuhan') }}@endif">
                                                                </div><br>

                                                                <div class="col-md">
                                                                    <label for="jangka_waktu" class="form-label">Jangka Waktu (dalam Angka)</label>
                                                                    <input class="form-control" name="jangka_waktu" type="number" id="jangka_waktu" value="@if(isset($usaha)){{$usaha->jangka_waktu}}@else{{ old('jangka_waktu') }}@endif" required>
                                                                </div><br>

                                                                <div class="col-md Muqayyadah" style="display:none;">
                                                                    <label for="capaian" class="form-label">Capaian (jika Muqoyyadah)</label>
                                                                    <input class="form-control date" name="capaian" type="number" id="capaian" value="@if(isset($usaha)){{$usaha->capaian_muqayyadah}}@else{{ old('capaian') }}@endif">
                                                                </div><br>
                                                                @if(isset($usaha))
                                                                @if($usaha->status_posta == "Posting")
                                                                <!-- Jika sudah di posting / tercapai-->
                                                                <div class="progress" style="height: 25px; ">
                                                                    <div class="progress-bar bg-success " role="progressbar" style="width: 0%; " aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div><br>
                                                                </div>
                                                                @endif
                                                                @endif
                                                        </div> <!-- end card-body-->
                                                    </div> <!-- end card-->
                                                </div><!-- end col-->
                                                <hr>
                                                <h5 class="mt-4 mb-2 font-16">Upload Thumbnail (file jpg/png)</h5>
                                                <div class="fallback">
                                                    <input name="thumbnail" type="file" accept=".jpg,.jpeg,.png"/>
                                                </div>
                                                @if(isset($usaha))
                                                <div class="dropzone-previews mt-3">
                                                    <div class="card mt-1 mb-0 shadow-none border dz-processing dz-complete dz-image-preview">
                                                        <div class="p-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <img src="/images/{{$usaha->thumbnail}}" alt="" class="avatar-sm rounded bg-light">
                                                                </div>
                                                                <div class="col ps-0">                                                                
                                                                    <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name="">{{$usaha->thumbnail}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <h5 class="mt-4 mb-2 font-16">Upload Proposal (file pdf)</h5>
                                                <!-- File Upload -->
                                                <div class="fallback">
                                                    <input name="proposal" type="file" accept=".pdf" />
                                                </div>
                                                @if(isset($usaha))
                                                <div class="dropzone-previews mt-3">
                                                    <div class="card mt-1 mb-0 shadow-none border dz-processing dz-complete dz-image-preview">
                                                        <div class="p-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <img src="/images/{{$usaha->proposal}}" alt="" class="avatar-sm rounded bg-light">
                                                                </div>
                                                                <div class="col ps-0">                                                                
                                                                    <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name="">{{$usaha->proposal}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <h5 class="mt-4 mb-2 font-16">Upload Photo (file jpg/png)</h5>
                                                <!-- File Upload -->
                                                <div class="fallback">
                                                    <input name="gallery[]" type="file" multiple accept=".jpg,.jpeg,.png"/>
                                                </div>
                                                @if(isset($usaha))
                                                <div class="dropzone-previews mt-3">
                                                    @foreach(json_decode($usaha->usahaImages->nama) as $image)
                                                    <div class="card mt-1 mb-0 shadow-none border dz-processing dz-complete dz-image-preview">
                                                        <div class="p-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <img src="/images/{{$image}}" alt="" class="avatar-sm rounded bg-light">
                                                                </div>
                                                                <div class="col ps-0">                                                                
                                                                    <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name="">{{$image}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </form>
                            </div> <!-- end col -->
                        </div>
                    </div> <!-- container -->
                </div> <!-- content -->
        @push('scripts')
        <!-- plugin js -->
        <script src="/assets/js/vendor/dropzone.min.js"></script>
        <!-- init js -->
        <script src="/assets/js/ui/component.fileupload.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            $(function() {
                $('#checkMuqayyadah').change(function(){
                    $('.Muqayyadah').hide();
                    $('.' + $(this).val()).show();
                })
            })
        </script>
        @endpush
@endsection