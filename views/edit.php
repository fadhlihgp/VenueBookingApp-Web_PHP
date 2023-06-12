<?php
session_start();
use controllers\EmployeeController;
include "../controllers/EmployeeController.php";
// Cek apakah pengguna sudah login sebelumnya, jika iya, redirect ke halaman utama
if (!isset($_SESSION['logged_in'])) {
    header("Location: employeeData.php");
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

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Perbarui Data Karyawan</h1>
            </div>
            <!-- Begin Page Content -->
            <form class="row g-3" method="post" action="../viewsAction/editEmployeeAction.php">
                <?php
                $id = $_GET["id"];
                $controller = new EmployeeController();
                $employee = $controller->getEmployeeById($id);
                foreach ($employee as $item){ ?>
                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="form-label">Id</label>
                        <input type="text" name="id" class="form-control" id="inputEmail4"
                               value="<?php echo $item->getId(); ?>" readonly placeholder="id" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="inputPassword4" class="form-label">Nama</label>
                        <input type="text" name="employeeName" class="form-control" id="inputPassword4"
                               required placeholder="nama" value="<?php echo $item->getName();?>">
                    </div>
                    <div class="col-12 mb-2">
                        <label for="inputAddress" class="form-label">Alamat</label>
                        <input type="text" name="address" class="form-control" id="inputAddress"
                               placeholder="alamat" required value="<?php echo $item->getAddress(); ?>">
                    </div>
                    <div class="col-12 mb-2">
                        <label for="inputAddress2" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" name="phoneNumber" id="inputAddress2"
                               required placeholder="nomor telepon" value="<?php echo $item->getPhoneNumber(); ?>">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="birthDate"
                               class="form-control" required value="<?php echo $item->getBirthDate(); ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Jabatan</label>
                        <input type="text" name="position" class="form-control" id="inputZip"
                               placeholder="jabatan" value="<?php echo $item->getPosition(); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Jenis Kelamin</label>
                        <div class="d-flex">
                            <div class="mx-4">
                                <input class="form-check-input" type="radio" name="sex"
                                       id="gridRadios1" value="Laki-Laki" <?php if ($item->getSex() == 'Laki-Laki') echo 'checked'; ?>>
                                <label class="form-check-label" for="gridRadios1">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="ml-2">
                                <input class="form-check-input" type="radio" name="sex"
                                       id="gridRadios2" value="Perempuan" <?php if ($item->getSex() == 'Perempuan') echo 'checked'; ?>>
                                <label class="form-check-label" for="gridRadios2">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-12 mt-2">
                    <button type="submit" class="btn btn-success"><i class="bi bi-pencil"></i> Perbarui</button>
                    <a href="employeeData.php" class="btn btn-danger"><i class="bi bi-arrow-return-left"></i> Kembali</a>
                </div>
            </form>
            <!-- /.container-fluid -->

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

<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>


</body>

</html>
