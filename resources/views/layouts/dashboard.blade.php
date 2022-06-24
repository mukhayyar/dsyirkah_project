<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Datatables | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- third party css -->
        <link href="/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/fixedHeader.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/vendor/fixedColumns.bootstrap5.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
        @stack('styles')
    </head>

    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- LOGO -->
                <a href="/admin/dashboard" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="/assets/images/logo.png" alt="" height="70">
                    </span>
                    <span class="logo-sm">
                        <img src="/assets/images/logo_sm.png" alt="" height="25">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="/admin/dashboard" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="/assets/images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="/assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
                </a>

                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    @php
                    $users_dashboard_access = ["Administrator"];
                    $users_anggota_access = ["Administrator","Admin IT"];
                    $pengaturan_akun_anggota_access = ["Teller OPR","Admin"];
                    $master_access = ["Administrator","Admin IT"];
                    $daftar_usaha_access = ["Administrator","Admin IT","Manager"];
                    $pengajuan_access = ["Administrator","Teller OPR","Admin","Manager","Admin Perwada"];
                    $aktif_access = ["Administrator","Teller OPR","Admin","Manager","Admin Perwada"];
                    $reakad_access = ["Administrator","Teller OPR","Admin","Manager"];
                    $non_aktif_access = ["Administrator","Teller OPR","Admin","Manager"];
                    @endphp
                    <!--- Sidemenu -->
                    <ul class="side-nav">
                         <!--li class="side-nav-title side-nav-item">Dasboard</li-->
                        <li class="side-nav-item">
                            <a href="/admin/dashboard" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span class="badge bg-success float-end">3</span>
                                <span> Dashboards </span>
                            </a>
                        </li>

                        <li class="side-nav-title side-nav-item">Users Dashboard</li>

                        <li class="side-nav-item">
                            <a href="/admin/users_dashboard/ganti_sandi" class="side-nav-link">
                                <i class="uil-dialpad"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Ganti Sandi </span>
                            </a>
                        </li>
                        @if(in_array(Auth::user()->role,$users_dashboard_access))
                        <li class="side-nav-item">
                            <a href="/admin/users_dashboard/pengaturan_akun" class="side-nav-link">
                                <i class="uil-users-alt"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Pengaturan Akun </span>
                            </a>
                        </li>
                        @endif

                        @if(in_array(Auth::user()->role,$users_anggota_access))
                        <li class="side-nav-title side-nav-item">Users Anggota</li>

                        <li class="side-nav-item">
                            <a href="/admin/users_anggota/data_verifikasi_akun" class="side-nav-link">
                                <i class="uil-shield-check"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Data Verifikasi Akun </span>
                            </a>
                        </li>
                        
                        <li class="side-nav-item">
                            <a href="/admin/users_anggota/pengaturan_akun" class="side-nav-link">
                                <i class="uil-users-alt"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Pengaturan Akun </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="uil-user-square"></i>
                                <span class="badge bg-info float-end">2</span>
                                <span> Akses Area Anggota </span>
                            </a>
                        </li>
                        @endif

                        @if(in_array(Auth::user()->role,$pengaturan_akun_anggota_access))
                        <li class="side-nav-title side-nav-item">Users Anggota</li>

                        <li class="side-nav-item">
                            <a href="/admin/users_anggota/pengaturan_akun" class="side-nav-link">
                                <i class="uil-users-alt"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Pengaturan Akun </span>
                            </a>
                        </li>
                        @endif

                        @if(in_array(Auth::user()->role,$master_access))
                        <li class="side-nav-title side-nav-item">MASTER</li>

                        <li class="side-nav-item">
                            <a href="/admin/master/perwada" class="side-nav-link">
                                <i class="uil-shutter-alt"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Perwada </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="/admin/master/cif_anggota" class="side-nav-link">
                                <i class="dripicons-user-id"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> CIF Anggota </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="uil-whatsapp"></i>
                                <span class="badge bg-info float-end">2</span>
                                <span> Konten WA </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="uil-servers"></i>
                                <span class="badge bg-info float-end">2</span>
                                <span> List Keterangan </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#versidsyirkah" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-servers"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Versi DSyirkah </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="versidsyirkah">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="/admin/master/versi/mutlaqah_emas">Mutlaqah-Emas</a>
                                    </li>
                                    <li>
                                        <a href="/admin/master/versi/mutlaqah_rupiah">Mutlaqah-Rupiah</a>
                                    </li>
                                    <li>
                                        <a href="/admin/master/versi/muqoyyadah_emas">Muqoyyadah-Emas</a>
                                    </li>
                                    <li>
                                        <a href="/admin/master/versi/muqoyyadah_rupiah">Muqoyyadah-Rupiah</a>
                                    </li>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="/admin/master/item_emas" class="side-nav-link">
                                <i class="mdi mdi-gold"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Item Emas </span>
                            </a>
                        </li>
                        @endif

                        @if(in_array(Auth::user()->role,$daftar_usaha_access))
                        <li class="side-nav-title side-nav-item">Daftar Usaha</li>

                        <li class="side-nav-item">
                            <a href="/admin/daftar_usaha/usaha_basis_emas" class="side-nav-link">
                                <i class="uil-gold"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Usaha Basis Emas </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="/admin/daftar_usaha/usaha_basis_rupiah" class="side-nav-link">
                                <i class="uil-money-insert"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Usaha Basis Rupiah </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="/admin/daftar_usaha/laporan" class="side-nav-link">
                                <i class="uil-graph-bar"></i>
                                <span class="badge bg-info float-end">2</span>
                                <span> Laporan </span>
                            </a>
                        </li>
                        @endif

                        @if(in_array(Auth::user()->role,$pengajuan_access))
                        <li class="side-nav-title side-nav-item">Pengajuan D'Syirkah</li>

                        <li class="side-nav-item">
                            <a href="/admin/pengajuan_dsyirkah/emas" class="side-nav-link">
                                <i class="uil-file-plus-alt"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Emas </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="/admin/pengajuan_dsyirkah/rupiah" class="side-nav-link">
                                <i class="uil-file-plus "></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Rupiah </span>
                            </a>
                        </li>

                        @endif

                        @if(in_array(Auth::user()->role,$aktif_access))
                        <li class="side-nav-title side-nav-item">D'Syirkah Aktif</li>

                        <li class="side-nav-item">
                            <a href="/admin/dsyirkah_aktif/emas" class="side-nav-link">
                                <i class="uil-file-check-alt"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Emas </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="/admin/dsyirkah_aktif/rupiah" class="side-nav-link">
                                <i class="uil-file-check"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Rupiah </span>
                            </a>
                        </li>
                        @endif

                        @if(in_array(Auth::user()->role,$reakad_access))
                        <li class="side-nav-title side-nav-item">ReAkad D'Syirkah</li>

                        <li class="side-nav-item">
                            <a href="/admin/reakad_dsyirkah/perpanjang" class="side-nav-link">
                                <i class="uil-folder-plus"></i>
                                <span class="badge bg-info float-end">2</span>
                                <span> Perpanjang </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#stop-syirkah" aria-expanded="false" aria-controls="sidebarBaseUI" class="side-nav-link">
                                <i class="uil-times-circle"></i>
                                <span class="badge bg-info float-end">2</span>
                                <span> Stop Syirkah </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="stop-syirkah">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="/admin/reakad_dsyirkah/rupiah">Rupiah</a>
                                    </li>
                                    <li>
                                        <a href="/admin/reakad_dsyirkah/emas">Emas</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif

                        @if(in_array(Auth::user()->role,$non_aktif_access))
                        <li class="side-nav-title side-nav-item">D'Syirkah NonAktif</li>

                        <li class="side-nav-item">
                            <a href="/admin/dsyirkah_nonaktif/emas" class="side-nav-link">
                                <i class="uil-file-times-alt"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Emas </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="/admin/dsyirkah_nonaktif/rupiah" class="side-nav-link">
                                <i class="uil-file-times"></i>
                                <span class="badge bg-primary float-end">1</span>
                                <span> Rupiah </span>
                            </a>
                        </li>
                        @endif
                    </ul>


                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                  <!-- Topbar Start -->
                  <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">

                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>


                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-bell noti-icon"></i>
                                <span class="noti-icon-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title px-3">
                                    <h5 class="m-0">
                                        <span class="float-end">
                                            <a href="javascript: void(0);" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>

                                <div class="px-3" style="max-height: 300px;" data-simplebar>

                                    <h5 class="text-muted font-13 fw-normal mt-0">Today</h5>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-primary">
                                                        <i class="mdi mdi-comment-account-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Datacorp <small class="fw-normal text-muted ms-1">1 min ago</small></h5>
                                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                                </div>
                                              </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-info">
                                                        <i class="mdi mdi-account-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Admin <small class="fw-normal text-muted ms-1">1 hours ago</small></h5>
                                                    <small class="noti-item-subtitle text-muted">New user registered</small>
                                                </div>
                                              </div>
                                        </div>
                                    </a>

                                    <h5 class="text-muted font-13 fw-normal mt-0">Yesterday</h5>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon">
                                                        <img src="/assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Cristina Pride <small class="fw-normal text-muted ms-1">1 day ago</small></h5>
                                                    <small class="noti-item-subtitle text-muted">Hi, How are you? What about our next meeting</small>
                                                </div>
                                              </div>
                                        </div>
                                    </a>

                                    <h5 class="text-muted font-13 fw-normal mt-0">30 Dec 2021</h5>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-primary">
                                                        <i class="mdi mdi-comment-account-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Datacorp</h5>
                                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                                </div>
                                              </div>
                                        </div>
                                    </a>

                                     <!-- item-->
                                     <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon">
                                                        <img src="/assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14">Karen Robinson</h5>
                                                    <small class="noti-item-subtitle text-muted">Wow ! this admin looks good and awesome design</small>
                                                </div>
                                              </div>
                                        </div>
                                    </a>

                                    <div class="text-center">
                                        <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                    </div>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                                    View All
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list d-none d-sm-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-view-apps noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                                <div class="p-2">
                                    
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/assets/images/brands/usermanagement.png" alt="slack">
                                                <span>Users</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/assets/images/brands/dashboard.png" alt="Github">
                                                <span>Dashboard</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/assets/images/brands/masterdata.png" alt="dribbble">
                                                <span>Master Data</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/assets/images/brands/syirkah.png" alt="slack">
                                                <span>DSyirkah</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/assets/images/brands/gtc.png" alt="Github">
                                                <span>GTC</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/assets/images/brands/pembiayaan.png" alt="dribbble">
                                                <span>Pembiayaan</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/assets/images/brands/anggota.png" alt="slack">
                                                <span>Anggota</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/assets/images/brands/event.png" alt="Github">
                                                <span>Event</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/assets/images/brands/listform.png" alt="dribbble">
                                                <span>List Form</span>
                                            </a>
                                        </div>
                                    </div><hr>

                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/assets/images/brands/transaksi.png" alt="slack">
                                                <span>Transaksi</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/assets/images/brands/sertifikat.png" alt="Github">
                                                <span>Sertifikat</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="/assets/images/brands/mobile.png" alt="dribbble">
                                                <span>Mobile</span>
                                            </a>
                                        </div>
                                    </div><hr>

                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="https://eoaclub.id/webmail" target="_blank">
                                                <img src="/assets/images/brands/mail.png" alt="bitbucket">
                                                <span>Email</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="https://eoaclub.id/" target="_blank">
                                                <img src="/assets/images/brands/website.png" alt="dropbox">
                                                <span>Website</span>
                                            </a>
                                        </div>
                                    </div> <!-- end row-->
                                </div>
                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-user-name">{{Auth::user()->name}}</span>
                                    <span class="account-position">{{Auth::user()->role}}</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout me-1"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>
                <!-- end Topbar -->
            @yield('content')
         <!-- Footer Start -->
         <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> © KSPPS Simpul Berkah Sinergi - eoaclub.id
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->


    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->






        </div>
        <!-- END wrapper -->
        <!-- Right Sidebar -->

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->
             <!-- bundle -->
        <script src="/assets/js/vendor.min.js"></script>
        <script src="/assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="/assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="/assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="/assets/js/vendor/responsive.bootstrap5.min.js"></script>
        <script src="/assets/js/vendor/dataTables.buttons.min.js"></script>
        <script src="/assets/js/vendor/buttons.bootstrap5.min.js"></script>
        <script src="/assets/js/vendor/buttons.html5.min.js"></script>
        <script src="/assets/js/vendor/buttons.flash.min.js"></script>
        <script src="/assets/js/vendor/buttons.print.min.js"></script>
        <script src="/assets/js/vendor/dataTables.keyTable.min.js"></script>
        <script src="/assets/js/vendor/dataTables.select.min.js"></script>
        <script src="/assets/js/vendor/fixedColumns.bootstrap5.min.js"></script>
        <script src="/assets/js/vendor/fixedHeader.bootstrap5.min.js"></script>
        <!-- third party js ends -->
        @stack('scripts')
    </body>
</html>

            