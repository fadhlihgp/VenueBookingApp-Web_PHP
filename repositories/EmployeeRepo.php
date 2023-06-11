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
    public function getEmployeeById($id) {
        $query = "select * from employee where id = '$id'";
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
        public function createEmployee(EmployeeModel $employeeModel): void
    {
        $id = $employeeModel->getId();
        $name = $employeeModel->getName();
        $address = $employeeModel->getAddress();
        $birthDate = $employeeModel->getBirthDate();
        $phoneNumber = $employeeModel->getPhoneNumber();
        $position = $employeeModel->getPosition();
        $sex = $employeeModel->getSex();

        $query = "insert into employee values ('$id', '$name', '$address', '$birthDate', '$phoneNumber', '$position', '$sex')";
        try {
            $execute = mysqli_query($this->context->connectDb(), $query);
            if ($execute) {
                echo "
            <script>
                alert('Berhasil menyimpan data');
                window.location.replace('../views/employeeData.php');
            </script>";
            } else {
                echo "
            <script>
                alert('Gagal menyimpan data');
                window.location.replace('../views/employeeData.php');
            </script>";
            }

        } catch (\mysqli_sql_exception $exception) {
            echo "
            <script>
                alert('Gagal menyimpan data');
            </script>
            ";
        } finally {
            $this->context->closeConnect();
        }
    }
    public function editEmployee(EmployeeModel $employeeModel): void
    {
        $id = $employeeModel->getId();
        $name = $employeeModel->getName();
        $address = $employeeModel->getAddress();
        $birthDate = $employeeModel->getBirthDate();
        $phoneNumber = $employeeModel->getPhoneNumber();
        $position = $employeeModel->getPosition();
        $sex = $employeeModel->getSex();

        $query = "update employee set name = '$name', address = '$address', birthdate = '$birthDate', phonenumber = '$phoneNumber',
                  position = '$position', sex = '$sex' where id = '$id'";
        try {
            mysqli_query($this->context->connectDb(), $query);
            echo "
            <script>
                alert('Berhasil memperbarui data');
                window.location.replace('../views/employeeData.php');
            </script>
            ";
        } catch (\mysqli_sql_exception $exception) {
            echo "
            <script>
                alert('Gagal memperbarui data' + $exception);
            </script>
            ";
        } finally {
            $this->context->closeConnect();
        }
    }
    public function deleteEmployee($id) {
        $query = "delete from employee where id = '$id'";
        try {
            mysqli_query($this->context->connectDb(), $query);
            echo "
            <script>
                alert('Berhasil menghapus data');
                window.location.replace('../views/employeeData.php');
            </script>
            ";
        } catch (\mysqli_sql_exception $exception) {
            echo "
            <script>
                alert('Gagal menyimpan data');
            </script>
            ";
        } finally {
            $this->context->closeConnect();
        }
    }
}