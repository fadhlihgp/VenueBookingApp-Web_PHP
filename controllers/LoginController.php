<?php

namespace controllers;

use PersonaliaModel;
use repositories\PersonaliaRepo;

include "../repositories/PersonaliaRepo.php";

class LoginController
{
    private $personaliaRepo;

    /**
     * @param $personaliaRepo
     */
    public function __construct()
    {
        $this->personaliaRepo = new PersonaliaRepo();
    }

    public function index() {
        require_once "../views/login.php";
    }

    public function login(PersonaliaModel $request) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $isSuccess = $this->personaliaRepo->loginPersonalia($request);

            if ($isSuccess) {
                $_SESSION['logged_in'] = true;
                header('Location: index.php');
                exit();
            } else if (!$isSuccess) {
                echo "<script>
                    alert('Username atau Password salah');
                </script>";
            }
        }
    }
}