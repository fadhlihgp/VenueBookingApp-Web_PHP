<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename= Laporan-Karyawan" .date("His").".xls");
?>
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
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th colspan="7"><h3 class="text-center text-dark">Data Karyawan PT ABC Sport</h3></th>
            </tr>
            <tr>
                <td><strong>Id</strong></td>
                <td><strong>Nama</strong></td>
                <td><strong>Alamat</strong></td>
                <td><strong>Tanggal Lahir</strong></td>
                <td> <strong>No Telepon</strong></td>
                <td><strong>Jenis Kelamin</strong></td>
                <td><strong>Jabatan</strong></td>
            </tr>
            </thead>
            <tbody id="employeeTable">
            <?php
            use controllers\EmployeeController;
            include "../controllers/EmployeeController.php";
            $controller = new EmployeeController();
            $employees = $controller->getAllEmployees();
            for ($i = 0; $i < count($employees); $i++) {
                $modalId = "modal-" . $employees[$i]->getId(); ?>
                <tr>
                    <td><?php echo $employees[$i]->getId();?></td>
                    <td><?php echo $employees[$i]->getName();?></td>
                    <td><?php echo $employees[$i]->getAddress();?></td>
                    <td><?php echo $employees[$i]->getBirthDate();?></td>
                    <td><?php echo $employees[$i]->getPhoneNumber();?></td>
                    <td><?php echo $employees[$i]->getSex();?></td>
                    <td><?php echo $employees[$i]->getPosition();?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
