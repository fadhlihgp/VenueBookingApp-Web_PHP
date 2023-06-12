<?php

namespace repositories;
use models\AdminModel;
use models\EmployeeModel;

include "../config/AppDbContext.php";
include "../models/AdminModel.php";
include "../models/EmployeeModel.php";
class AdminRepo
{
    private \AppDbContext $context;

    /**
     * @param \AppDbContext $context
     */
    public function __construct()
    {
        $this->context = new \AppDbContext();
    }

    private function findAdminById($employeeId) {
        $query = "select * from admin where employee_id = '$employeeId'";
        $admins = [];
        try {
            $execute = mysqli_query($this->context->connectDb(), $query);
            while ($result = mysqli_fetch_array($execute)) {
                $admin = new AdminModel();
                $admin->setId($result["id"]);
                $admin->setEmployeeId($result["employee_id"]);
                $admins[] = $admin;
                return $admins;
            }
        } catch (\mysqli_sql_exception $e) {
            echo "
            <script>
            alert('Gagal mendapatkan data');
            </script>
            ";
        } finally {
            $this->context->closeConnect();
        }
    }
    public function createAdmin(AdminModel $adminModel) {
        $id = $adminModel->getId();
        $username = $adminModel->getUsername();
        $password = $adminModel->getPassword();
        $employeeId = $adminModel->getEmployeeId();

        $findAdmin = $this->findAdminById($employeeId);
        if ($findAdmin !== null) {
            echo "<script>
                alert('Gagal membuat data, akun sudah tersedia !');
                window.location.replace('../views/registerAdmin.php');
            </script>";
            return;
        }

        $query = "insert into admin values ('$id', '$username', '$password', '$employeeId')";
        try {
            $execute = mysqli_query($this->context->connectDb(), $query);
            if ($execute){
                echo "
                    <script>
                        alert('Berhasil membuat akun');
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Gagal membuat akun');
                    </script>
                ";
            }
        } catch (\mysqli_sql_exception $e) {

        } finally {
            $this->context->closeConnect();
        }
    }
    public function getAllAdmins() {
        $query = "select a.id, a.username, a.password, e.name, e.id as employee_id 
            from admin a join employee e on e.id = a.employee_id";
        $admins = [];
        try {
            $execute = mysqli_query($this->context->connectDb(), $query);
            while ($result = mysqli_fetch_array($execute)) {
                $admin = new AdminModel();
                $admin->setId($result["id"]);
                $admin->setUsername($result["username"]);
                $admin->setPassword($result["password"]);
                $admin->setEmployeeId($result["employee_id"]);
                $admin->setEmployeeName($result["name"]);
                $admins[] = $admin;
            }
            return $admins;
        } catch (\Exception $e) {

        } finally {
            $this->context->closeConnect();
        }
    }
    public function getEmployeeFilterAdmin() {
        $query = "select * from employee where position = 'Admin'";
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
    public function deleteAdmin($id) {
        $query = "delete from admin where id = '$id'";
        try {
            $execute = mysqli_query($this->context->connectDb(), $query);
            if ($execute) {
                echo "<script>
                        alert('Akun Berhasil dihapus');
                        window.location.replace('../views/registerAdmin.php');
                    </script>";
            } else {
                echo "<script>
                        alert('Gagal menghapus akun');
                        window.location.replace('../views/registerAdmin.php');
                     </script>";
            }
        } catch (\Exception $e) {

        } finally {
            $this->context->closeConnect();
        }
    }

}