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
                                            <p>1.Kode Perwada unik</p>
                                            <p>2.Semua data input manual</p>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-sm-5">
                                                <a href="javascript:void(0);" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#modal-tambah-perwada"><i class="mdi mdi-plus-circle me-2"></i> Perwada</a>
                                            </div>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="scroll-horizontal-preview">
                                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap data-table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode Perwada</th>
                                                            <th>Nama Perwada</th>
                                                            <th>Wilayah</th>
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
                    <div class="modal fade" id="modal-tambah-perwada" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg loading authentication-bg">
                            <div class="modal-content bg-transparent">
                            <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-7 col-lg-5">
                                            <div class="card">
                                                <!-- Logo-->
                                                <div class="modal-header" style="background-color: #afb4be">
                                                    <div style="color: rgb(255, 255, 255);"><h4 id="modalHeading">Tambah Perwada</h4></div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="card-body p-4">
                                                    <form id="CustomerForm" name="CustomerForm">
                                                        <input type="hidden" name="id_perwada" id="id_perwada">
                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Kode</label>
                                                            <input class="form-control" type="text" placeholder="000" name="kode" id="kode" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Nama Perwada</label>
                                                            <input class="form-control" type="text" name="nama" id="nama" placeholder="KP Pusat" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Wilayah</label>
                                                            <input class="form-control" type="text" name="wilayah" id="wilayah" placeholder="KP Pusat" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select class="form-select" id="statusForm" name="status">
                                                                <option value="Aktif">Aktif</option>
                                                                <option value="Hold">Hold</option>
                                                                <option value="Non Aktif">Non Aktif</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3 text-center" >
                                                            <button id="saveBtn" class="btn btn-primary" type="submit"> Tambah </button>
                                                        </div>
                                                        <div class="mb-3 text-center" >
                                                            <button id="editBtn" style="display: none;" class="btn btn-primary" type="submit"> Edit </button>
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
                {data: 'kode', name: 'kode'},
                {data: 'nama', name: 'nama'},
                {data: 'wilayah', name: 'wilayah'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('body').on('click', '.editPerwada', function () {
        var id_perwada = $(this).data('id');
        $.get("perwada" +'/' + id_perwada +'/edit', function (data) {
            $('#modalHeading').html("Edit Perwada");
            $('#saveBtn').css("display","none");
            $('#editBtn').css("display","block");
            $('#modal-tambah-perwada').modal('show');
            $('#id_perwada').val(id_perwada);
            $('#kode').attr("readonly","readonly");
            $('#kode').val(data.kode);
            $('#nama').val(data.nama);
            $('#wilayah').val(data.wilayah);
            $(`#statusForm option[value=${data.status}]`).attr('selected','selected');
            $('body').on('click','.btn-close',function(){
                $('#modalHeading').html("Tambah Perwada");
                $('#saveBtn').css("display","block");
                $('#editBtn').css("display","none");
                $('#modal-tambah-perwada').modal('show');
                $('#kode').removeAttr("readonly");
                $('#id_perwada').val('');
                $('#kode').val('');
                $('#nama').val('');
                $('#wilayah').val('');
                $(`#statusForm option[value=${data.status}]`).attr('selected','');
            })
        })
        });
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
            console.log($('#CustomerForm').serialize());
            $.ajax({
            data: $('#CustomerForm').serialize(),
            url: "",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#kode').removeAttr("readonly");
                $('#CustomerForm').trigger("reset");
                $('#modal-tambah-perwada').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
        });
        $('#editBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
            var id_perwada = $('#id_perwada').val();
            console.log($('#CustomerForm').serialize());
            $.ajax({
            data: $('#CustomerForm').serialize(),
            url: "perwada/"+id_perwada+"/edit",
            type: "PUT",
            dataType: 'json',
            success: function (data) {
                $('#CustomerForm').trigger("reset");
                $('#modal-tambah-perwada').modal('hide');
                $('#modalHeading').html("Tambah Perwada");
                $('#saveBtn').css("display","block");
                $('#editBtn').css("display","none");
                $('#modal-tambah-perwada').modal('show');
                $('#id_perwada').val('');
                $('#kode').val('');
                $('#nama').val('');
                $('#wilayah').val('');
                $(`#statusForm option[value=${data.status}]`).attr('selected','');
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