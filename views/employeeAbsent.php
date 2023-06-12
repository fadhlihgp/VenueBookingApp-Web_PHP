<?php
session_start();
include "../controllers/AbsentController.php";
// Cek apakah pengguna sudah login sebelumnya, jika iya, redirect ke halaman utama
if (!isset($_SESSION['logged_in'])) {
    header("Location: employeeAbsent.php");
    exit();
}
//?>
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
                <h1 class="h3 mb-0 text-gray-800">Presensi Karyawan</h1>
            </div>
            <!-- /.container-fluid -->

            <a href="#" class="btn btn-success btn-icon-split mb-3" data-toggle="modal" data-target="#inputModal">
                <span class="icon text-white-50">
                    <i class="bi bi-input-cursor"></i>
                </span>
                <span class="text">Input Absen Karyawan</span>
            </a>

            <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search w-100" action="employeeAbsent.php" method="get">
                <div class="d-flex flex-column">
                    <div>Filter Berdasarkan</div>
                    <div class="d-flex flex-row mb-3 gap">
                        <div class="mr-2">
                            <select class="custom-select" name="month">
                                <option selected disabled>Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="mr-2">
                            <select class="custom-select" name="year">
                                <option selected disabled>Pilih Tahun</option>
                                <?php
                                for ($i = 2023; $i <= 2050; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mr-2">
                            <input class="btn btn-primary" value="Pilih" type="submit">
                        </div>
                        <div>
                            <a class="btn btn-danger" href="employeeAbsent.php">Reset</a>
                        </div>
                    </div>
                </div>
            </form>

            <div class="card shadow mb-4 w-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Absensi Karyawan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Cuti</th>
                                <th>Alpa</th>
                                <th>Sakit</th>
                                <th>izin</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $controller = new \controllers\AbsentController();

                            $month = $_GET['month'] ?? null;
                            $year = $_GET['year'] ?? null;

                            if ($month && $year) {
                                $absents = $controller->getAbsentsByFilter($month, $year);
                            } else {
                                $absents = $controller->getAbsents();
                            }
                            $i = 1;
                            foreach ($absents as $absent) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $absent->getEmployeeId(); ?></td>
                                <td><?php echo $absent->getEmployeeName(); ?></td>
                                <td><?php echo $absent->getLeave(); ?></td>
                                <td><?php echo $absent->getAlpha(); ?></td>
                                <td><?php echo $absent->getSick(); ?></td>
                                <td><?php echo $absent->getPermission(); ?></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
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

<!-- Input Absent Modal -->
<div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="../viewsAction/createAbsentAction.php">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data Absen</h1>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama Karyawan</label>
                        <select class="custom-select" aria-label="Default select example" name="employeeId">
                            <option selected disabled>Pilih Karyawan</option>
                            <?php
                            foreach ($absents as $absent) { ?>
                                <option value="<?php echo $absent->getEmployeeId()?>"><?php echo $absent->getEmployeeId(). " - ". $absent->getEmployeeName();?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class=" col-form-label">Pilih Tanggal</label>
                        <input type="date" min="{{ now()->toDateString('Y-m-d') }}" name="date_absent"
                               class="form-control" min="today" required>
                    </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Alasan</label>
                    <select class="custom-select" aria-label="Default select example" name="information">
                        <option selected disabled>Pilih Alasan</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Izin">Izin</option>
                        <option value="Cuti">Cuti</option>
                        <option value="Alpa">Alpa</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
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
