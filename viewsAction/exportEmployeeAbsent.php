<?php
include "../controllers/AbsentController.php";
$controller = new \controllers\AbsentController();

$month = $_GET['month'] ?? null;
$year = $_GET['year'] ?? null;

if ($month && $year) {
    $absents = $controller->getAbsentsByFilter($month, $year);
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename= Laporan-Absen-Karyawan" .date("His").".xls");
} else {
    echo "<Script>
                            alert('Pilih periode absen terlebih dahulu !');
                            window.location.replace('../views/reportAbsent.php');
                        </Script>";
}



$monthString = "" ;
switch ($month) {
    case 1 : $monthString = "Januari"; break;
    case 2 : $monthString = "Februari"; break;
    case 3 : $monthString = "Maret"; break;
    case 4 : $monthString = "April"; break;
    case 5 : $monthString = "Mei"; break;
    case 6 : $monthString = "Juni"; break;
    case 7 : $monthString = "Juli"; break;
    case 8 : $monthString = "Agustus"; break;
    case 9 : $monthString = "September"; break;
    case 10 : $monthString = "Oktober"; break;
    case 11: $monthString = "November"; break;
    case 12 : $monthString = "Desember"; break;
}

?>

<div class="card shadow mb-4 w-100">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th colspan="7"><h3>Data Absensi Karyawan Bulan <?php echo $monthString." Tahun ".$year ?></h3></th>
                </tr>
                <tr>
                    <td><b>No</b></td>
                    <td><b>Id</b></td>
                    <td><b>Nama</b></td>
                    <td><b>Cuti</b></td>
                    <td><b>Alpa</b></td>
                    <td><b>Sakit</b></td>
                    <td><b>izin</b></td>
                </tr>
                </thead>
                <tr>
                <?php
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
                </tr>
            </table>
        </div>
    </div>
</div>
