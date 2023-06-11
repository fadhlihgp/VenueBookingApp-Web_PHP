<?php

use controllers\EmployeeController;
use models\EmployeeModel;

include "../controllers/EmployeeController.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $employee = new EmployeeModel();
    $employee->setId($_POST["id"]);
    $employee->setName($_POST["employeeName"]);
    $employee->setAddress($_POST["address"]);
    $employee->setPosition($_POST["position"]);
    $employee->setBirthDate($_POST["birthDate"]);
    $employee->setSex($_POST["sex"]);
    $employee->setPhoneNumber($_POST["phoneNumber"]);

    $controller = new EmployeeController();
    $controller->editEmployee($employee);
}