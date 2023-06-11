<?php

namespace repositories;
use AppDbContext;
use models\EmployeeModel;

include "../config/AppDbContext.php";
include "../models/EmployeeModel.php";
class EmployeeRepo
{
    private AppDbContext $context;

    /**
     * @param AppDbContext $context
     */
    public function __construct()
    {
        $this->context = new AppDbContext();
    }

    public function getAllEmployees() {
        $query = "select * from employee";
        $employees = [];

        try {
            $execute = mysqli_query($this->context->connectDb(), $query);
            while ($result = mysqli_fetch_array($execute)) {
                $employee = new EmployeeModel();
                $employee->setId($result["id"]);
                $employee->setName($result["name"]);
                $employee->setAddress($result["address"]);
                $employee->setBirthDate($result["birthdate"]);
                $employee->setSex($result["sex"]);
                $employee->setPosition($result["position"]);
                $employee->setPhoneNumber($result["phonenumber"]);
                $employees[] = $employee;
            }
        } catch (\Exception $e) {
            echo "
            <script>
            alert('Gagal Mengambil data ' + $e);
            </script>";
        } finally {
            $this->context->closeConnect();
        }

        return $employees;
    }
}