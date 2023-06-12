<?php
session_start();

// Cek apakah pengguna sudah login sebelumnya, jika iya, redirect ke halaman utama
if (!isset($_SESSION['logged_in'])) {
    header("Location: aboutMe.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Personalia</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #025464;">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Personalia</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="bi bi-kanban-fill"></i><span>Manajemen Karyawan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="employeeData.php"><i class="bi bi-clipboard-data"></i> Data</a>
                    <a class="collapse-item" href="employeeAbsent.php"><i class="bi bi-watch"></i> Presensi</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Register Admin -->
        <li class="nav-item">
            <a class="nav-link" href="registerAdmin.php">
                <i class="bi bi-person-rolodex"></i><span> Akun Admin</span></a>
        </li>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="bi bi-file-earmark-fill"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="reportEmployee.php"><i class="bi bi-printer"></i> Cetak Data Karyawan</a>
                    <a class="collapse-item" href="reportAbsent.php"><i class="bi bi-printer"></i> Cetak Presensi</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider mb-0">
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="aboutMe.php">
                <i class="bi bi-person-circle"></i>
                <span>Tentang Saya</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mb-0">
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-target="#logoutModal" data-toggle="modal">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->

    </ul>
    <!-- End of Sidebar -->

    <!-- Content -->
    <div id="content-wrapper" class="d-flex flex-column p-3">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <h3>PT ABC SPORT</h3>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"> Tentang Saya</h1>
            </div>
                <!-- /.container-fluid -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-info"> Fadhlih Girindra Putra</h2>
                        <img src="../resources/Informatika_202043500113_Fadhlih_Girindra_Putra.jpg" width="100px" class="rounded">
                        <p>Tentang Saya</p>
                        <ul>
                            <li><strong>Tanggal Lahir:</strong> 17/11/2000</li>
                            <li><strong>Alamat:</strong> Bekasi</li>
                            <li><strong>Email:</strong> fadhlihgp@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="col">
                            <h2 class="text-info">Pendidikan</h2>
                            <div>
                                <h4>* Universitas Indraprasta</h4>
                                <div class="ml-3">
                                    <p class="mb-0">2020-Sekarang</p>
                                    <p>Teknik Informatika</p>
                                </div>

                            </div>
                            <div>
                                <h4>* SMK BPS&K II BEKASI</h4>
                                <div class="ml-3">
                                    <p class="mb-0">2015-2018</p>
                                    <p>Multimedia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-info">Keterampilan</h2>
                        <table>
                            <tr class="mb-2">
                                <td>
                                    <img src="../resources/html.png" width="50px">
                                    <img src="../resources/css.png" width="50px">
                                    <img src="../resources/js.png" width="50px">
                                    <img src="../resources/bootstrap.png" width="50px">
                                    <img src="../resources/tailwind.png" width="70px">
                                </td>
                            </tr>
                            <tr class="mb-2">
                                <td>
                                    <img src="../resources/java.png" width="50px">
                                    <img src="../resources/php.png" width="50px">
                                    <img src="../resources/c%23.png" width="50px">
                                    <img src="../resources/net.png" width="65px">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="../resources/mysql.png" width="60px">
                                    <img src="../resources/sql%20server.png" width="60px">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-info">Sosial Media</h2>
                        <table>
                            <tr class="mb-2">
                                <td class="text-center">
                                    <a target="_blank" href="https://www.linkedin.com/in/fadhlih-girindra-putra-943717250/">
                                        <figure>
                                            <img src="../resources/linkedin.png" width="50px">
                                            <figcaption>Fadhlih Girindra Putra</figcaption>
                                        </figure>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a target="_blank" href="https://www.github.com/fadhlihgp">
                                        <figure>
                                            <img src="../resources/github.png" width="60px">
                                            <figcaption>fadhlihgp</figcaption>
                                        </figure>

                                    </a>
                                </td>
                                <td class="text-center">
                                    <a target="_blank" href="https://www.instagram.com/fadhlih17">
                                        <figure>
                                            <img src="../resources/instagram.png" width="60px">
                                            <figcaption>fadhlih17</figcaption>
                                        </figure>

                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white mt-4">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Booking App 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" jika anda yakin ingin mengakhiri sesi </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
