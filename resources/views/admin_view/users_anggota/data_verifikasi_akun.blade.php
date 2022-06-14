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
                                            <li class="breadcrumb-item active">Verifikasi Akun</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Data Verifikasi Akun</h4>
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
                                            <p>1.Validasi ke Nomor BA (unik), Nomor Hp, Email</p>
                                            <p>2.Import Excel</p>
                                            <p>Action = View, Edit, Kirim Email</p>
                                            <p>3.Edit All Kecuali nomor BA</p>
                                            <p>4.kirim Email Verivikasi pendaftaran</p>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-5">
                                                <a href="javascript:void(0);" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#modal-tambahdata"><i class="mdi mdi-plus-circle me-2"></i> Data</a>
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#importExcel" class="btn btn-success mb-2"><i class="mdi mdi-database-import me-2"></i> Import</a>
                                            </div>
                                        </div>

                                        <!-- <li class="nav-item me-0">
                                            <a class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex" data-bs-toggle="modal" data-bs-target="#modal-login">
                                                <i class="mdi mdi-account me-2"></i> Masuk
                                            </a>
                                        </li> -->

                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="scroll-horizontal-preview">
                                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap data-table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nomor BA</th>
                                                            <th>Nama Lengkap</th>
                                                            <th>Nomor HP</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div> <!-- end preview-->
                                            <!-- end preview code-->
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
                		<!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="data_verifikasi_akun/import" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modal-tambahdata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-toggle="modal" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-lg loading authentication-bg">
                        <div class="modal-content bg-transparent">
                        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-xxl-7 col-lg-5">
                                        <div class="card">
                                            <!-- Logo-->
                                            <div class="modal-header" style="background-color: #afb4be">
                                                <div style="color: rgb(255, 255, 255);"><h4>Tambah Data Verifikasi</h4></div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="card-body p-4">
                                                <form id="CustomerForm" name="CustomerForm">
                                                    @csrf
                                                    <input type="hidden" name="id_user" id="id_user">
                                                    <div class="mb-3">
                                                        <label for="fullname" class="form-label">Nomor Buku Anggota (BA)</label>
                                                        <input class="form-control" type="text" id="no_ba" name="no_ba" placeholder="contoh: 0.123.1234567" data-toggle="input-mask" data-mask-format="0.000.0000000" data-reverse="true" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="fullname" class="form-label">Nama Lengkap</label>
                                                        <input class="form-control" type="text" id="nama" name="nama" placeholder="Enter your name" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="fullname" class="form-label">Nomor HP</label>
                                                        <input class="form-control" type="text" id="no_hp" name="no_hp" placeholder="Enter your name" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="emailaddress" class="form-label">Email address</label>
                                                        <input class="form-control" type="email" id="email" name="email" required placeholder="Enter your email">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-select" class="form-label">Status</label>
                                                        <select class="form-select" name="status" id="statusADd">
                                                            <option value="1">Aktif</option>
                                                            <option value="0">Non Aktif</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3 text-center" >
                                                        <button class="btn btn-primary" id="saveBtn" type="submit"> Simpan </button>
                                                    </div>
                                                    <div class="mb-3 text-center" >
                                                        <button class="btn btn-primary" id="editBtn" style="display: none;" type="submit"> Edit </button>
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
@push('scripts')
<link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"
			  integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY="
			  crossorigin="anonymous"></script>
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
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('body').on('click', '.editAkun', function () {
            var id_akun = $(this).data('id');
            $.get("data_verifikasi_akun" +'/' + id_akun +'/edit', function (data) {
                $('#modelHeading').html("Edit Customer");
                $('#saveBtn').css("display",'none');
                $('#editBtn').css("display",'block');
                $('#editBtn').html('Edit');
                $('#modal-tambahdata').modal('show');
                $('#no_ba').attr("readonly","readonly");
                $('#id_user').val(id_akun);
                $('#no_ba').val(data.nomor_ba);
                $('#nama').val(data.nama_lengkap);
                $('#email').val(data.email);
                $('#no_hp').val(data.no_hp);
                $(`#statusAdd option[value=${data.status}]`).attr('selected','selected');
                $('body').on('click','.btn-close',function(){
                    $('#modalHeading').html("Tambah Perwada");
                    $('#saveBtn').css("display","block");
                    $('#saveBtn').html("Simpan");
                    $('#editBtn').css("display","none");
                    $('#modal-tambah-perwada').modal('show');
                    $('#no_ba').removeAttr("readonly");
                    $('#id_user').val('');
                    $('#no_ba').val('');
                    $('#nama').val('');
                    $('#email').val('');
                    $('#no_hp').val('');
                    $(`#statusAdd option[value=${data.kantor}]`).attr('selected','');
            })
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
                $('#modal-tambahdata').modal('hide');
                table.draw();
                $('#saveBtn').html('Simpan');
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Simpan');
            }
        });
        });
        $('#editBtn').click(function (e) {
            e.preventDefault();
            console.log("test");
            $(this).html('Test..');
            var id_user = $("#id_user").val();
            console.log("test");
            $.ajax({
                data: $('#CustomerForm').serialize(),
                url: "data_verifikasi_akun/"+id_user+"/edit",
                type: "PUT",
                dataType: 'json',
                success: function (data) {
                    console.log("test");
                    $('#no_ba').removeAttr("readonly");
                    $('#CustomerForm').trigger("reset");
                    $('#modal-tambahdata').modal('hide');
                    table.draw();
                    $('#editBtn').html('Edit');
                    $('#editBtn').css("display",'none');
                    $('#saveBtn').css("display",'block');
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#editBtn').html('Edit');
                }
            });
        });
    });
    </script>
@endpush
@endsection