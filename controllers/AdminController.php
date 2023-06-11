<?php

namespace controllers;

use models\AdminModel;
use repositories\AdminRepo;

include "../repositories/AdminRepo.php";
class AdminController
{
    private AdminRepo $adminRepo;

    /**
     * @param AdminRepo $adminRepo
     */
    public function __construct()
    {
        $this->adminRepo = new AdminRepo();
    }

    public function createAdmin(AdminModel $adminModel) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") return $this->adminRepo->createAdmin($adminModel);
    }

    public function getAllAdmins() {
        return $this->adminRepo->getAllAdmins();
    }

    public function deleteAdmin($id) {
        return $this->adminRepo->deleteAdmin($id);
    }

    public function getAdminsFilter() {
        return $this->adminRepo->getEmployeeFilterAdmin();
    }
}