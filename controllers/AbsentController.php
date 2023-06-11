<?php

namespace controllers;

use models\AbsentModel;
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
    public function getAbsentsByFilter($month, $year) {
        return $this->absentRepo->getAbsentsByFilter($month, $year);
    }
    public function createAbsent(AbsentModel $absentModel) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            return $this->absentRepo->createAbsent($absentModel);
        }
    }

}