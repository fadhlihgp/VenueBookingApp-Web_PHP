<?php
include "../controllers/AdminController.php";
$id = $_GET["id"];
$controller = new \controllers\AdminController();
$controller->deleteAdmin($id);
?>