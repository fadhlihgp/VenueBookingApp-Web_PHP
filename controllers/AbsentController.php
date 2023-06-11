<?php

namespace controllers;

use repositories\AbsentRepo;

include "../repositories/AbsentRepo.php";
class AbsentController
{
    private AbsentRepo $absentRepo;

    /**
     * @param AbsentRepo $absentRepo
     */
    public function __construct()
    {
        $this->absentRepo = new AbsentRepo();
    }

    public function getAbsents() {
        return $this->absentRepo->getAbsents();
    }

}