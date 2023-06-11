<?php

namespace controllers;

use models\EmployeeModel;
use repositories\EmployeeRepo;
include "../repositories/EmployeeRepo.php";
class EmployeeController
{
    private EmployeeRepo $employeeRepo;

    /**
     * @param EmployeeRepo $employeeRepo
     */
    public function __construct()
    {
        $this->employeeRepo = new EmployeeRepo();
    }

    public function getAllEmployees() {
//        if ($_SERVER["REQUEST_METHOD"] === "GET"){
//            return $this->employeeRepo->getAllEmployees();
//        }
        return $this->employeeRepo->getAllEmployees();
    }

    public function getEmployeeById($id) {
        return $this->employeeRepo->getEmployeeById($id);
    }
    public function createEmployee(EmployeeModel $employeeModel) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") return $this->employeeRepo->createEmployee($employeeModel);
    }

    public function editEmployee(EmployeeModel $employeeModel) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") return $this->employeeRepo->editEmployee($employeeModel);
    }

    public function deleteEmployee($id) {
        return $this->employeeRepo->deleteEmployee($id);
    }

    public function getEmployeeFilterAdmin() {
        return $this->employeeRepo->getEmployeeFilterAdmin();
    }
}