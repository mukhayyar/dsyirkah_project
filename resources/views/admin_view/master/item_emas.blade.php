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
                                            <li class="breadcrumb-item active">Perwada/li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List Perwada</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Hanya Sementara -->
                                        <div class="card-body col-lg-7">
                                            <h6>Keterangan</h6>

                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-sm-5">
                                                <a href="javascript:void(0);" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#modal-tambah-namaemas"><i class="mdi mdi-plus-circle me-2"></i> Emas</a>
                                            </div>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="scroll-horizontal-preview">
                                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Emas</th>
                                                            <th>Jenis Emas</th>
                                                            <th>Gramasi</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>0.1 Gram</td>
                                                            <td>
                                                                <span class="badge badge-primary-lighten">Reguler</span>
                                                            </td>
                                                            <td>0.1</td>
                                                            <td>
                                                                <span class="badge badge-success-lighten">Active</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-edit-emas"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>0.5 Gram</td>
                                                            <td>
                                                                <span class="badge badge-primary-lighten">Reguler</span>
                                                            </td>
                                                            <td>0.5</td>
                                                            <td>
                                                                <span class="badge badge-success-lighten">Active</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-edit-emas"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>0.1 Gram</td>
                                                            <td>
                                                                <span class="badge badge-info-lighten">Series IF</span>
                                                            </td>
                                                            <td>0.1</td>
                                                            <td>
                                                                <span class="badge badge-success-lighten">Active</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-edit-emas"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> <!-- end preview-->

                                            <div class="tab-pane" id="scroll-horizontal-code">
                                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;table id=&quot;scroll-horizontal-datatable&quot; class=&quot;table w-100 nowrap&quot;&gt;
                                                            &lt;thead&gt;
                                                                &lt;tr&gt;
                                                                    &lt;th&gt;No&lt;/th&gt;
                                                                    &lt;th&gt;Pengajuan&lt;/th&gt;
                                                                    &lt;th&gt;Perwada&lt;/th&gt;
                                                                    &lt;th&gt;Office&lt;/th&gt;
                                                                    &lt;th&gt;Age&lt;/th&gt;
                                                                    &lt;th&gt;Start date&lt;/th&gt;
                                                                    &lt;th&gt;Salary&lt;/th&gt;
                                                                    &lt;th&gt;Extn.&lt;/th&gt;
                                                                    &lt;th&gt;E-mail&lt;/th&gt;
                                                                &lt;/tr&gt;
                                                            &lt;/thead&gt;
                                                            &lt;tbody&gt;
                                                                &lt;tr&gt;
                                                                    &lt;td&gt;Tiger&lt;/td&gt;
                                                                    &lt;td&gt;Nixon&lt;/td&gt;
                                                                    &lt;td&gt;System Architect&lt;/td&gt;
                                                                    &lt;td&gt;Edinburgh&lt;/td&gt;
                                                                    &lt;td&gt;61&lt;/td&gt;
                                                                    &lt;td&gt;2011/04/25&lt;/td&gt;
                                                                    &lt;td&gt;$320,800&lt;/td&gt;
                                                                    &lt;td&gt;5421&lt;/td&gt;
                                                                    &lt;td&gt;t.nixon@datatables.net&lt;/td&gt;
                                                                &lt;/tr&gt;
                                                                &lt;tr&gt;
                                                                    &lt;td&gt;Garrett&lt;/td&gt;
                                                                    &lt;td&gt;Winters&lt;/td&gt;
                                                                    &lt;td&gt;Accountant&lt;/td&gt;
                                                                    &lt;td&gt;Tokyo&lt;/td&gt;
                                                                    &lt;td&gt;63&lt;/td&gt;
                                                                    &lt;td&gt;2011/07/25&lt;/td&gt;
                                                                    &lt;td&gt;$170,750&lt;/td&gt;
                                                                    &lt;td&gt;8422&lt;/td&gt;
                                                                    &lt;td&gt;g.winters@datatables.net&lt;/td&gt;
                                                                &lt;/tr&gt;
                                                            &lt;/tbody&gt;
                                                        &lt;/table&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                                            </div> <!-- end preview code-->
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->
                    <!-- Modal -->
                    <div class="modal fade" id="modal-tambah-namaemas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg loading authentication-bg">
                            <div class="modal-content bg-transparent">
                            <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-7 col-lg-5">
                                            <div class="card">
                                                <!-- Logo-->
                                                <div class="modal-header" style="background-color: #afb4be">
                                                    <div style="color: rgb(255, 255, 255);"><h4>Tambah Emas</h4></div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="card-body p-4">
                                                    <form action="#">

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Nama Emas</label>
                                                            <input class="form-control" type="text" placeholder="000" id="fullname" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Jenis Emas</label>
                                                            <select class="form-select" id="example-select">
                                                                <option>Pilih</option>
                                                                <option>Reguler</option>
                                                                <option>Series IF</option>
                                                                <option>Series IS</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Gramasi</label>
                                                            <input class="form-control" type="text" id="fullname" placeholder="KP Pusat" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select class="form-select" id="example-select">
                                                                <option>Active</option>
                                                                <option>NonAktiv</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3 text-center" >
                                                            <button class="btn btn-primary" type="submit"> Daftar </button>
                                                        </div>

                                                    </form>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- end card -->
                                            <!-- end row -->

                                        </div> <!-- end col -->
                                    </div>

                                    <!-- end row -->
                                </div>
                                <!-- end container -->
                            </div>
                            </div>
                            <!-- end page -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                    <div class="modal fade" id="modal-edit-emas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg loading authentication-bg">
                            <div class="modal-content bg-transparent">
                            <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-7 col-lg-5">
                                            <div class="card">
                                                <!-- Logo-->
                                                <div class="modal-header" style="background-color: #afb4be">
                                                    <div style="color: rgb(255, 255, 255);"><h4>Edit Perwada</h4></div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="card-body p-4">
                                                    <form action="#">

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Nama Emas</label>
                                                            <input class="form-control" type="text" placeholder="000" id="fullname" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Jenis Emas</label>
                                                            <select class="form-select" id="example-select">
                                                                <option>Pilih</option>
                                                                <option>Reguler</option>
                                                                <option>Series IF</option>
                                                                <option>Series IS</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Gramasi</label>
                                                            <input class="form-control" type="text" id="fullname" placeholder="KP Pusat" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select class="form-select" id="example-select">
                                                                <option>Active</option>
                                                                <option>NonAktiv</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3 text-center" >
                                                            <button class="btn btn-primary" type="submit"> Daftar </button>
                                                        </div>

                                                    </form>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- end card -->
                                            <!-- end row -->

                                        </div> <!-- end col -->
                                    </div>

                                    <!-- end row -->
                                </div>
                                <!-- end container -->
                            </div>
                            </div>
                            <!-- end page -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                </div> <!-- content -->
@endsection
