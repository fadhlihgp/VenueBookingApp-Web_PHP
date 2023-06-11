<?php

namespace controllers;

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

    public function getEmployeeByName($name) {
        return $this->employeeRepo->getAllEmployeeByName($name);
    }
}