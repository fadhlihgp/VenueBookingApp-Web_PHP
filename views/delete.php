<?php
include "../controllers/EmployeeController.php";
$id = $_GET["id"];
$controller = new \controllers\EmployeeController();
$controller->deleteEmployee($id);
?>


