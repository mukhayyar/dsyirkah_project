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
                                            <li class="breadcrumb-item active">Ganti Sandi</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Ganti Sandi</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Pengaturan Sandi Akun</h4>
                                    <hr><br><br>
                                    <div class="tab-pane show active" id="input-types-preview">
                                        <form method="POST" action="{{route('ganti_sandi_page')}}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="example-readonly" class="form-label">User</label>
                                                <input type="text" id="id-user" class="form-control" readonly="" value="@if(Auth::check()) {{Auth::user()->name}} @else User @endif">
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password Lama</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" name="old_password" class="form-control" placeholder="Enter your password">
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password Baru</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Konfirmasi Password Baru</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" name="password_confirm" class="form-control" placeholder="Enter your password">
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                            </div><br><br>
                                            <button type="submit" class="btn btn-primary">Simpan</button>

                                        </form>
                                    </div> <!-- end col -->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- container -->
@endsection