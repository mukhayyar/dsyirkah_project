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
                                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td>0.123.1234567</td>
                                                            <td>Nasorudin</td>
                                                            <td>xxxxxx.xcng@gmail.com</td>
                                                            <td>xxxxxxxxx769</td>
                                                            <td>
                                                                <span class="badge badge-success-lighten">Active</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-email-fast"></i></a>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-view-anggota"> <i class="mdi mdi-card-search-outline"></i></a>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-edit-anggota"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>0.123.1234567</td>
                                                            <td>Nasorudin</td>
                                                            <td>xxxxxx.xcng@gmail.com</td>
                                                            <td>xxxxxxxxx769</td>
                                                            <td>
                                                                <span class="badge badge-success-lighten">Active</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-email-fast"></i></a>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-view-anggota"> <i class="mdi mdi-card-search-outline"></i></a>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-edit-anggota"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>0.123.1234567</td>
                                                            <td>Nasorudin</td>
                                                            <td>xxxxxx.xcng@gmail.com</td>
                                                            <td>xxxxxxxxx769</td>
                                                            <td>
                                                                <span class="badge badge-success-lighten">Active</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-email-fast"></i></a>

                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-view-anggota"> <i class="mdi mdi-card-search-outline"></i></a>
                                                                <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-edit-anggota"> <i class="mdi mdi-square-edit-outline"></i></a>
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
                                                    <div style="color: rgb(255, 255, 255);"><h4>Tambah Akun Anggota</h4></div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="card-body p-4">
                                                    <form action="#">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nomor BA</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Cari Nomor BA" aria-label="Recipient's username">
                                                                <button class="btn btn-primary" type="button">Cari</button>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Nama Lengkap</label>
                                                            <input class="form-control" type="text" id="fullname" placeholder="Enter your name" readonly="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Nomor HP</label>
                                                            <input class="form-control" type="text" id="fullname" placeholder="Enter your name" readonly="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="emailaddress" class="form-label">Email address</label>
                                                            <input class="form-control" type="email" id="emailaddress" readonly="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="password" class="form-control" placeholder="Enter your password">
                                                                <div class="input-group-text" data-password="false">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Konfirmasi Password</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="password" class="form-control" placeholder="Enter your password">
                                                                <div class="input-group-text" data-password="false">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
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

                    <div class="modal fade" id="modal-view-anggota" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg loading authentication-bg">
                            <div class="modal-content bg-transparent">
                            <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-7 col-lg-5">
                                            <div class="card">
                                                <!-- Logo-->
                                                <div class="modal-header" style="background-color: #afb4be">
                                                    <div style="color: rgb(255, 255, 255);"><h4>Lihat Akun Anggota</h4></div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="card-body p-4">
                                                    <form action="#">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nomor BA</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Nomor BA" aria-label="Recipient's username" readonly="">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Nama Lengkap</label>
                                                            <input class="form-control" type="text" id="fullname" placeholder="Enter your name" readonly="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Nomor HP</label>
                                                            <input class="form-control" type="text" id="fullname" placeholder="Enter your name" readonly="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="emailaddress" class="form-label">Email address</label>
                                                            <input class="form-control" type="email" id="emailaddress" readonly="">
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

                    <div class="modal fade" id="modal-edit-anggota" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg loading authentication-bg">
                            <div class="modal-content bg-transparent">
                            <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-7 col-lg-5">
                                            <div class="card">
                                                <!-- Logo-->
                                                <div class="modal-header" style="background-color: #afb4be">
                                                    <div style="color: rgb(255, 255, 255);"><h4>Edit Akun Anggota</h4></div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="card-body p-4">
                                                    <form action="#">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nomor BA</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Nomor BA" aria-label="Recipient's username" readonly="">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Nama Lengkap</label>
                                                            <input class="form-control" type="text" id="fullname" placeholder="Enter your name" readonly="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Nomor HP</label>
                                                            <input class="form-control" type="text" id="fullname" placeholder="Enter your name" readonly="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="emailaddress" class="form-label">Email address</label>
                                                            <input class="form-control" type="email" id="emailaddress" readonly="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="password" class="form-control" placeholder="Enter your password">
                                                                <div class="input-group-text" data-password="false">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Konfirmasi Password</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="password" class="form-control" placeholder="Enter your password">
                                                                <div class="input-group-text" data-password="false">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
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
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
console.log('test');
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'firstName', name: 'firstName'},
              {data: 'lastName', name: 'lastName'},
              {data: 'info', name: 'info'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      $('#createNewCustomer').click(function () {
          $('#saveBtn').val("create-Customer");
          $('#Customer_id').val('');
          $('#CustomerForm').trigger("reset");
          $('#modelHeading').html("Create New Customer");
          $('#ajaxModel').modal('show');
      });
      $('body').on('click', '.editCustomer', function () {
        var Customer_id = $(this).data('id');
        $.get("" +'/' + Customer_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Customer");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#Customer_id').val(data.id);
            $('#name').val(data.name);
            $('#detail').val(data.detail);
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
                $('#ajaxModel').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
      });
      $('body').on('click', '.deleteCustomer', function () {
          var Customer_id = $(this).data("id");
          confirm("Are You sure want to delete !");
          $.ajax({
              type: "DELETE",
              url: ""+'/'+Customer_id,
              success: function (data) {
                  table.draw();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
      });
    });
  </script>
@endpush
@endsection
