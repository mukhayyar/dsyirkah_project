@extends('layouts.dashboard')
@section('content')
@push('styles')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
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
                                            <li class="breadcrumb-item active">Pengaturan Akun</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Pengaturan Akun</h4>
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
                                            <p>User Terdiri dari</p>
                                            <p>1.Administrator = All Akses</p>
                                            <p>2.Teller OPR = Full Akses ke Aktif, Reakad Nonaktif, pengaturan akun anggota, (pengajuan no edit)</p>
                                            <p>3.Admin = View+export pengajuan, Aktif, Reakad, Nonaktif, pengaturan akun anggota, edit pengajuan</p>
                                            <p>4.Admin IT = full Akses master, Daftar Usaha & Users Anggota</p>
                                            <p>5.Manager = View+export pengajuan, Aktif, Reakad Nonaktif, Daftar Usaha</p>
                                            <p>6.Admin Perwada = View pengajuan, Aktif,</p>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-sm-5">
                                                <a href="javascript:void(0);" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#modal-tambahakun-admin"><i class="mdi mdi-plus-circle me-2"></i> Akun</a>
                                            </div>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="scroll-horizontal-preview">
                                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap data-table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Karyawan</th>
                                                            <th>User</th>
                                                            <th>Email</th>
                                                            <th>Jabatan</th>
                                                            <th>Kantor</th>
                                                            <th>Grup</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                    </tbody>
                                                </table>
                                            </div> <!-- end preview-->

                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                    <!-- Modal -->
                    <div class="modal fade" id="modal-tambahakun-admin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg loading authentication-bg">
                            <div class="modal-content bg-transparent">
                            <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-7 col-lg-5">
                                            <div class="card">
                                                <!-- Logo-->
                                                <div class="modal-header" style="background-color: #afb4be">
                                                    <div style="color: rgb(255, 255, 255);"><h4>Tambah Akun Admin</h4></div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="card-body p-4">
                                                    <form id="CustomerForm" name="CustomerForm">
                                                        @csrf
                                                        <input type="hidden" name="id_admin" id="id_admin">
                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Nama Karyawan</label>
                                                            <input class="form-control" type="text" id="fullName" name="fullName" placeholder="Masukkan Nama Karyawan" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">User ID</label>
                                                            <input class="form-control" type="text" id="userName" name="userName" placeholder="Masukkan Username" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="emailaddress" class="form-label">Email address</label>
                                                            <input class="form-control" type="email" id="email" name="email" required placeholder="Email">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Jabatan</label>
                                                            <input class="form-control" type="text" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan Karyawan" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Kantor</label>
                                                            <select class="form-select" id="kantor" name="kantor" required>
                                                                <option selected>Pilihan</option>
                                                                <option value="Pusat">Pusat</option>
                                                                <option value="Perwada">Perwada</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Grup</label>
                                                            <select class="form-select" id="grup" name="grup" required>
                                                                <option selected>Pilihan</option>
                                                                <option value="Administrator">Administrator</option>
                                                                <option value="Teller OPR">Teller OPR</option>
                                                                <option value="Admin">Admin</option>
                                                                <option value="Admin IT">Admin IT</option>
                                                                <option value="Manager">Manager</option>
                                                                <option value="Admin Perwada">Admin Perwada</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select style="display: block;" class="form-select" id="statusForm" name="status">
                                                                <option selected>Pilihan</option>
                                                                <option value="1">Aktif</option>
                                                                <option value="0">Non Aktif</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                                                <div class="input-group-text" data-password="false">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Konfirmasi Password</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Enter your password">
                                                                <div class="input-group-text" data-password="false">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="mb-3 text-center" >
                                                            <button class="btn btn-primary" type="submit" id="saveBtn" value="create"> Daftar </button>
                                                        </div>
                                                        <div class="mb-3 text-center">
                                                            <button style="display: none;" class="btn btn-primary" type="submit" id="editBtn" value="create"> Edit </button>
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
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[type="hidden"]').val()
            }
        });
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama_karyawan', name: 'nama_karyawan'},
                {data: 'user_name', name: 'user_name'},
                {data: 'email', name: 'email'},
                {data: 'kantor', name: 'kantor'},
                {data: 'jabatan', name: 'jabatan'},
                {data: 'user.role', name: 'user.role'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('body').on('click', '.editUser', function () {
        var id_admin = $(this).data('id');
        $.get("pengaturan_akun" +'/' + id_admin +'/edit', function (data) {
            $('#modelHeading').html("Edit Customer");
            $('#saveBtn').css("display","none");
            $('#editBtn').css("display","block");
            $('#modal-tambahakun-admin').modal('show');
            $('#id_admin').val(id_admin);
            $('#fullName').val(data.nama_karyawan);
            $('#userName').val(data.user_name);
            $('#email').val(data.email);
            $('#jabatan').val(data.jabatan);
            $(`#kantor option[value=${data.kantor}]`).attr('selected','selected');
            $(`#grup option[value=${data.user.role}]`).attr('selected','selected');
            $(`#statusForm option[value=${data.status}]`).attr('selected','selected');
        })
        });
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
            $.ajax({
            data: $('#CustomerForm').serialize(),
            url: "",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#CustomerForm').trigger("reset");
                $('#modal-tambahakun-admin').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
        });
        $('#editBtn').click(function (e) {
            console.log('berhasil');
            var id_admin = $('#id_admin').val();
            console.log(id_admin)
            e.preventDefault();
            $(this).html('Editing..');
            console.log($('#CustomerForm').serialize());
            $.ajax({
            data: $('#CustomerForm').serialize(),
            url: "pengaturan_akun/"+id_admin+"/edit",
            type: "PUT",
            dataType: 'json',
            success: function (data) {
                $('#CustomerForm').trigger("reset");
                $('#modal-tambahakun-admin').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
        });
    });
    </script>
@endpush
@endsection
