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
                                    <h4 class="page-title">List Akun Anggota</h4>
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
                                            <p>Email & Nomor Tidak ditampilkan secara rinci</p>
                                            <p>Bisa kirim WA & Email Untuk Reset Paswd Akses semua yang bisa lihat halaman ini</p>
                                            <p>edit hanya untk admin IT</p>
                                            <p>Vew untuk OPR & layanan</p>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-sm-5">
                                                <a href="javascript:void(0);" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#modal-tambahakun-anggota"><i class="mdi mdi-plus-circle me-2"></i> Akun</a>
                                            </div>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="scroll-horizontal-preview">
                                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap data-table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nomor BA</th>
                                                            <th>Nama Anggota</th>
                                                            <th>Email</th>
                                                            <th>Nomor HP</th>
                                                            <th>Status</th>
                                                            <th>Reset Sandi</th>
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
                    <div class="modal fade" id="modal-tambahakun-anggota" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg loading authentication-bg">
                            <div class="modal-content bg-transparent">
                            <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-7 col-lg-5">
                                            <div class="card">
                                                <!-- Logo-->
                                                <div class="modal-header" style="background-color: #afb4be">
                                                    <div style="color: rgb(255, 255, 255);"><h4 id="modelHeading">Tambah Akun Anggota</h4></div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="card-body p-4">
                                                    <form id="CustomerForm">
                                                        <div class="mb-3" id="cari-nomor-ba">
                                                            <label class="form-label">Nomor BA</label>
                                                            <div class="input-group">
                                                                <input type="text" id="no_ba" name="nomor_ba" class="form-control" placeholder="Cari Nomor BA" aria-label="Recipient's username">
                                                                <button class="btn btn-primary" id="cari" type="button">Cari</button>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Nama Lengkap</label>
                                                            <input class="form-control" type="text" id="fullNameAdd" name="nama" placeholder="Enter your name" readonly="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Nomor HP</label>
                                                            <input class="form-control" type="text" id="noHpAdd" name="noHp" placeholder="Enter your name" readonly="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="emailaddress" class="form-label">Email address</label>
                                                            <input class="form-control" type="email" id="emailAdd" name="email" readonly="">
                                                        </div>

                                                        <div id="password" class="mb-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">
                                                                <div class="input-group-text" data-password="false">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="passwordConf" class="mb-3">
                                                            <label for="password" class="form-label">Konfirmasi Password</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Enter your password">
                                                                <div class="input-group-text" data-password="false">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="status-div" class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select class="form-select" id="statusAdd" name="status">
                                                                <option value="1">Aktif</option>
                                                                <option value="0">Non Aktif</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3 text-center" >
                                                            <button class="btn btn-primary" id="saveBtn" type="submit"> Tambah </button>
                                                        </div>
                                                        <div class="mb-3 text-center" >
                                                            <button class="btn btn-primary" style="display:none;" id="editBtn" type="submit"> Edit </button>
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

                    <div class="modal fade" id="modal-notif-reset" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg loading authentication-bg">
                            <div class="modal-content bg-transparent">
                                <p id="modal-notif-reset-pesan" class="alert alert-warning"></p>
                            </div>
                        </div>
                    </div>
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
                {data: 'nomor_ba', name: 'nomor_ba'},
                {data: 'nama_lengkap', name: 'nama_lengkap'},
                {data: 'no_hp', name: 'no_hp'},
                {data: 'email', name: 'email'},
                {data: 'status', name: 'status'},
                {data: 'reset_sandi', name: 'reset_sandi'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('body').on('click','.reset-password',function () {
            console.log('test');
            $.ajax({
                data: {email:$(this).data('email')},
                url: '/lupa_password',
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#modal-notif-reset').modal('show');
                    $('#modal-notif-reset-pesan').html('Berhasil dikirim!');
                },
                error: function (data) {
                    $('#modal-notif-reset').modal('show');
                    $('#modal-notif-reset-pesan').html('Gagal dikirim!');
                }
            })
        })
        $('body').on('click', '.editAkun', function () {
        var id_akun = $(this).data('id');
        $.get("pengaturan_akun" +'/' + id_akun +'/edit', function (data) {
            $('#modelHeading').html("Edit Akun");
            $('#saveBtn').css("display","none");
            $('#editBtn').css("display","block");
            $('#cari-nomor-ba').css("display","none");
            $('#modal-tambahakun-anggota').modal('show');
            $('#no_ba').val(data.nomor_ba);
            $('#fullNameAdd').val(data.nama_lengkap);
            $('#noHpAdd').val(data.no_hp);
            $('#emailAdd').val(data.email);
            $(`#statusAdd option[value=${data.status}]`).attr('selected','selected');
            $('body').on('click','.btn-close',function() {
                $('#saveBtn').css("display","block");
                $('#editBtn').css("display","none");
                $('#modelHeading').html("Tambah Akun");
                $('#saveBtn').html("Tambah");
                $('#cari-nomor-ba').css("display","block");
                $('#no_ba').val('');
                $('#fullNameAdd').val('');
                $('#noHpAdd').val('');
                $('#emailAdd').val('');
                $(`#statusAdd option[value=${data.status}]`).attr('selected','');
            }); 
        })
        });
        $('body').on('click', '.viewAkun', function () {
        var id_akun = $(this).data('id');
        $.get("pengaturan_akun" +'/' + id_akun +'/view', function (data) {
            $('#modelHeading').html("Lihat Akun");
            $('#modal-tambahakun-anggota').modal('show');
            $('#no_ba').val(data.nomor_ba);
            $('#fullNameAdd').val(data.nama_lengkap);
            $('#noHpAdd').val(data.no_hp);
            $('#emailAdd').val(data.email);
            $('#cari-nomor-ba').css("display","none");
            $(`#status-div`).css("display","none");
            $(`#password`).css("display","none");
            $(`#passwordConf`).css("display","none");
            $(`#saveBtn`).css("display","none");
        })
        });
        $('#cari').click(function(e){
            e.preventDefault();
            $(this).html('Mencari...');
            var no_ba = $('#no_ba').val();
            $.get("pengaturan_akun/" +'cari/' + $('#no_ba').val(), function (data,e) {
                $(this).html('Ditemukan');
                $('#fullNameAdd').val(data.nama_lengkap);
                $('#noHpAdd').val(data.no_hp);
                $('#emailAdd').val(data.email);
                $(this).html('Cari');
            });
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
                $(this).html('Simpan');
                $('#modal-tambahakun-anggota').modal('hide');
                $('#saveBtn').css("display","block");
                $('#editBtn').css("display","none");
                $('#modelHeading').html("Tambah Akun");
                $('#saveBtn').html("Tambah");
                $('#cari-nomor-ba').css("display","block");
                $('#no_ba').val('');
                $('#fullNameAdd').val('');
                $('#noHpAdd').val('');
                $('#emailAdd').val('');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Simpan');
            }
        });
        });
        $('#editBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
            var id_user = $('#no_ba').val();
            $.ajax({
            data: $('#CustomerForm').serialize(),
            url: "pengaturan_akun/"+id_user+"/edit",
            type: "PUT",
            dataType: 'json',
            success: function (data) {
                $('#CustomerForm').trigger("reset");
                $(this).html('Simpan');
                $('#modal-tambahakun-anggota').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Simpan');
            }
        });
        });
    });
    </script>
@endpush
@endsection
