@extends('layouts.dashboard')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">D'Syirkah</a></li>
                        <li class="breadcrumb-item active">Versi DSyirkah</li>
                    </ol>
                </div>
                <h4 class="page-title">List Versi DSyirkah - Muqoyyadah Rupiah</h4>
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
                            <a href="javascript:void(0);" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#modal-tambah-versidsyirkah"><i class="mdi mdi-plus-circle me-2"></i> Versi DSyirkah</a>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="scroll-horizontal-preview">
                            <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Versi Syirkah</th>
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
<div class="modal fade" id="modal-tambah-versidsyirkah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg loading authentication-bg">
        <div class="modal-content bg-transparent">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-7 col-lg-5">
                        <div class="card">
                            <!-- Logo-->
                            <div class="modal-header" style="background-color: #afb4be">
                                <div style="color: rgb(255, 255, 255);"><h4>Tambah versi Dsyirkah</h4></div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="card-body p-4">
                                <form action="#" id="VersiForm">
                                    @csrf

                                    <input class="form-control" type="hidden" id="jenis" name="jenis" value="Muqayyadah" required>
                                    <input class="form-control" type="hidden" id="item" name="item" value="rupiah" required>
                                    
                                    <input class="form-control" type="hidden" id="id_versi" value="" required>

                                    <div class="mb-3">
                                        <label for="versi" class="form-label">Versi Syirkah</label>
                                        <input class="form-control" type="text" id="versi" name="versi" placeholder="0.0" data-toggle="input-mask" data-mask-format="0.0" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="bulan" class="form-label">Bulan</label>
                                            <input class="form-control bulan" type="text" id="bulan" name="bulan[]" placeholder="00" data-toggle="input-mask" data-mask-format="00" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="nisbah" class="form-label">Nisbah</label>
                                            <input class="form-control nisbah" type="text" id="nisbah" name="nisbah[]" placeholder="50% anggota : 50% club" required>
                                        </div>
                                    </div><br>
                                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="bulan" class="form-label">Bulan</label>
                                            <input class="form-control bulan" type="text" id="bulan" name="bulan[]" placeholder="00" data-toggle="input-mask" data-mask-format="00" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="nisbah" class="form-label">Nisbah</label>
                                            <input class="form-control nisbah" type="text" id="nisbah" name="nisbah[]" placeholder="50% anggota : 50% club" required>
                                        </div>
                                    </div><br>

                                    <div class="row lg-5">
                                        <div class="col-lg-6">
                                            <label for="bulan" class="form-label">Bulan</label>
                                            <input class="form-control bulan" type="text" id="bulan" name="bulan[]" placeholder="00" data-toggle="input-mask" data-mask-format="00" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="nisbah" class="form-label">Nisbah</label>
                                            <input class="form-control nisbah" type="text" id="nisbah" name="nisbah[]" placeholder="50% anggota : 50% club" required>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="bulan" class="form-label">Bulan</label>
                                            <input class="form-control bulan" type="text" id="bulan" name="bulan[]" placeholder="00" data-toggle="input-mask" data-mask-format="00" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="nisbah" class="form-label">Nisbah</label>
                                            <input class="form-control nisbah" type="text" id="nisbah" name="nisbah[]" placeholder="50% anggota : 50% club" required>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="bulan" class="form-label">Bulan</label>
                                            <input class="form-control bulan" type="text" id="bulan" name="bulan[]" placeholder="00" data-toggle="input-mask" data-mask-format="00" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="nisbah" class="form-label">Nisbah</label>
                                            <input class="form-control nisbah" type="text" id="nisbah" name="nisbah[]" placeholder="50% anggota : 50% club" required>
                                        </div>
                                    </div><br>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="statusForm" name="status">
                                            <option value="1">Aktif</option>
                                            <option value="0">Non Aktif</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3 text-center" >
                                        <button id="saveBtn" class="btn btn-primary" type="submit"> Simpan </button>
                                    </div>

                                    <div class="mb-3 text-center" >
                                        <button id="editBtn" style="display: none" class="btn btn-primary" type="submit"> Update </button>
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
                {data: 'jenis', name: 'jenis'},
                {data: 'versi', name: 'versi'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('body').on('click', '.editVersi', function () {
        var id_versi = $(this).data('id');
        $.get(id_versi +'/edit', function (data) {
            $('#modal-header').html("Edit versi");
            $('#saveBtn').css("display","none");
            $('#editBtn').css("display","block");
            $('#modal-tambah-versidsyirkah').modal('show');
            $('#id_versi').val(id_versi);
            let bulanList = $('.bulan');
            let nisbahList = $('.nisbah');
            for(let i = 0; i < bulanList.length;i++){
                bulanList[i].value = data.nisbah_versi_produk_syirkah[i].bulan;
                nisbahList[i].value = data.nisbah_versi_produk_syirkah[i].nisbah;
            }
            $('#versi').val(data.versi);
            $(`#statusForm option[value=${data.status}]`).attr('selected','selected');
            $('body').on('click','.btn-close',function(){
                $('#modal-header').html("Tambah versi");
                $('#saveBtn').css("display","block");
                $('#editBtn').css("display","none");
                $('#modal-tambah-versidsyirkah').modal('show');
                $('#id_versi').val('');
                $('#versi').val('');
                $('.nisbah').val('');
                $('.bulan').val('');
                $(`#statusForm option[value=${data.status}]`).attr('selected','');
            })
        })
        });
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
            console.log($('#VersiForm').serialize());
            $.ajax({
            data: $('#VersiForm').serialize(),
            url: "",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#VersiForm').trigger("reset");
                $('#modal-tambah-versidsyirkah').modal('hide');
                table.draw();
                $('#saveBtn').html('Simpan');
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
        });
        $('#editBtn').click(function (e) {
            e.preventDefault();
            $('#saveBtn').html('Sending..');
            var id_versi = $("#id_versi").val();
            console.log($('#VersiForm').serialize());
            $.ajax({
            data: $('#VersiForm').serialize(),
            url: id_versi+"/edit",
            type: "PUT",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#VersiForm').trigger("reset");
                $('#modal-tambah-versidsyirkah').modal('hide');
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