<?php

use controllers\AbsentController;
use models\AbsentModel;

include "../controllers/AbsentController.php";
include "../vendor/autoload.php";
include "../models/AbsentModel.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $absent = new AbsentModel();
    $absent->setId(\Ramsey\Uuid\Uuid::uuid4()->toString());
    $absent->setEmployeeId($_POST['employeeId']);
    $absent->setDate($_POST['date_absent']);
    $absent->setInformation($_POST['information']);

    $controller = new AbsentController();
    $controller->createAbsent($absent);
}
