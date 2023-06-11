<?php

namespace repositories;
use dto\AbsentDto;
use models\AbsentModel;

include "../config/AppDbContext.php";
include "../dto/AbsentDto.php";
class AbsentRepo
{
    private \AppDbContext $context;

    /**
     * @param \AppDbContext $context
     */
    public function __construct()
    {
        $this->context = new \AppDbContext();
    }

    public function getAbsents() {
        $query = "SELECT e.id as employee_id, e.name, 
            IFNULL(SUM(CASE WHEN a.information = 'Cuti' THEN 1 ELSE 0 END), 0) AS Cuti, 
            IFNULL(SUM(CASE WHEN a.information = 'Alpa' THEN 1 ELSE 0 END), 0) AS Alpa, 
            IFNULL(SUM(CASE WHEN a.information = 'Sakit' THEN 1 ELSE 0 END), 0) AS Sakit, 
            IFNULL(SUM(CASE WHEN a.information = 'Izin' THEN 1 ELSE 0 END), 0) AS Izin 
            FROM employee e 
            LEFT JOIN absent a ON e.id = a.employee_id 
            GROUP BY e.id";
        $absents = [];
        try {
            $execute = mysqli_query($this->context->connectDb(),$query);
            while ($result = mysqli_fetch_array($execute)){
                $absentDto = new AbsentDto();
                $absentDto->setEmployeeId($result["employee_id"]);
                $absentDto->setEmployeeName($result["name"]);
                $absentDto->setLeave($result["Cuti"]);
                $absentDto->setAlpha($result["Alpa"]);
                $absentDto->setSick($result["Sakit"]);
                $absentDto->setPermission($result["Izin"]);
                $absents[] = $absentDto;
            }
        } catch (\mysqli_sql_exception $e) {
            echo "
            <script>
            alert('Gagal Mengambil data ' + $e);
            </script>";
        } finally {
            $this->context->closeConnect();
        }
        return $absents;
    }

    public function getAbsentsByFilter($month, $year) {
        $query = "SELECT e.id as employee_id, e.name, 
            IFNULL(SUM(CASE WHEN a.information = 'Cuti' THEN 1 ELSE 0 END), 0) AS Cuti, 
            IFNULL(SUM(CASE WHEN a.information = 'Alpa' THEN 1 ELSE 0 END), 0) AS Alpa, 
            IFNULL(SUM(CASE WHEN a.information = 'Sakit' THEN 1 ELSE 0 END), 0) AS Sakit, 
            IFNULL(SUM(CASE WHEN a.information = 'Izin' THEN 1 ELSE 0 END), 0) AS Izin 
            FROM employee e 
            LEFT JOIN absent a ON e.id = a.employee_id AND (MONTH(a.date) = $month and YEAR(a.date) = $year) 
            GROUP BY e.id";
        $absents = [];
        try {
            $execute = mysqli_query($this->context->connectDb(),$query);
            while ($result = mysqli_fetch_array($execute)){
                $absentDto = new AbsentDto();
                $absentDto->setEmployeeId($result["employee_id"]);
                $absentDto->setEmployeeName($result["name"]);
                $absentDto->setLeave($result["Cuti"]);
                $absentDto->setAlpha($result["Alpa"]);
                $absentDto->setSick($result["Sakit"]);
                $absentDto->setPermission($result["Izin"]);
                $absents[] = $absentDto;
            }
        } catch (\mysqli_sql_exception $e) {
            echo "
            <script>
            alert('Gagal Mengambil data ' + $e);
            </script>";
        } finally {
            $this->context->closeConnect();
        }
        return $absents;
    }

    public function createAbsent(AbsentModel $absentModel) {
        $id = $absentModel->getId();
        $employeeId = $absentModel->getEmployeeId();
        $date = $absentModel->getDate();
        $information = $absentModel->getInformation();

        $query = "insert into absent values ('$id', '$employeeId', '$date', '$information')";
        try {
            mysqli_query($this->context->connectDb(), $query);
            echo "
            <script>
                alert('Berhasil menambah data');
                window.location.replace('../views/employeeAbsent.php');
            </script>
            ";
            return true;
        } catch (\mysqli_sql_exception $e) {
            echo "
            <script>
            alert('Gagal Menambah data ' + $e);
            </script>";
            return false;
        } finally {
            $this->context->closeConnect();
        }

    }
}