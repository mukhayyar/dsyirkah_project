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
                        <li class="breadcrumb-item active">NonAktif Emas</li>
                    </ol>
                </div>
                <h4 class="page-title">List NonAktif Emas</h4>
            </div>
        </div>
    </div>
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body col-lg-7">
                        <h6>Keterangan</h6>
                        <p>1. Tambah Filter tanggal per periode</p>
                        <p>2. </p>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="scroll-horizontal-preview">
                            <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Slesai</th>
                                        <th>Kode Sertifikat</th>
                                        <th>Nomor BA</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis D'Syirkah</th>
                                        <th>Total Emas</th>
                                        <th>Kategori</th>
                                        <th>Pengiriman</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>12 Apr 2022 13:30</td>
                                        <td>5467658768678</td>
                                        <td>0.123.1234567</td>
                                        <td>Nasorudin</td>
                                        <td>Muqoyyadah</td>
                                        <td>10 Gram</td>
                                        <td>
                                            <span class="badge badge-primary-lighten">Selesai Akad</span>
                                            <span class="badge badge-danger-lighten">Batal Akad</span>
                                        </td>
                                        <td>
                                            <a href="" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-upload-pengiriman"><i class="mdi mdi-file-upload"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-update"></i></a>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary-lighten">Proses</span>
                                            <span class="badge badge-info-lighten">Close</span>
                                        </td>
                                        <td>
                                            <a href="view-nonaktif-emas.html" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-file-restore-outline"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>12 Apr 2022 13:30</td>
                                        <td>5467658768678</td>
                                        <td>0.123.1234567</td>
                                        <td>Nasorudin</td>
                                        <td>Muqoyyadah</td>
                                        <td>5 Gram</td>
                                        <td>
                                            <span class="badge badge-primary-lighten">Selesai Akad</span>
                                            <span class="badge badge-danger-lighten">Batal Akad</span>
                                        </td>
                                        <td>
                                            <a href="" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-upload-pengiriman"><i class="mdi mdi-file-upload"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-update"></i></a>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary-lighten">Proses</span>
                                            <span class="badge badge-info-lighten">Close</span>
                                        </td>
                                        <td>
                                            <a href="view-nonaktif-emas.html" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-file-restore-outline"></i></a>
                                        </td>
                                    <tr>
                                        <td>3</td>
                                        <td>12 Apr 2022 13:30</td>
                                        <td>5467658768678</td>
                                        <td>0.123.1234567</td>
                                        <td>Nasorudin</td>
                                        <td>Muqoyyadah</td>
                                        <td>30 gram</td>
                                        <td>
                                            <span class="badge badge-primary-lighten">Selesai Akad</span>
                                            <span class="badge badge-danger-lighten">Batal Akad</span>
                                        </td>
                                        <td>
                                            <a href="" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-upload-pengiriman"><i class="mdi mdi-file-upload"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-update"></i></a>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary-lighten">Proses</span>
                                            <span class="badge badge-info-lighten">Close</span>
                                        </td>
                                        <td>
                                            <a href="view-nonaktif-emas.html" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-file-restore-outline"></i></a>
                                        </td>
                                    </tr>
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
@endsection