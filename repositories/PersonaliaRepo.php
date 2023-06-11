<?php

namespace repositories;
use AppDbContext;
use PersonaliaModel;

include "../config/AppDbContext.php";
include "../models/PersonaliaModel.php";
class PersonaliaRepo
{
    private AppDbContext $context;

    /**
     * @param AppDbContext $context
     */
    public function __construct()
    {
        $this->context = new AppDbContext();
    }

    public function loginPersonalia(PersonaliaModel $personaliaModel) {
        $username = $personaliaModel->getUsername();
        $password = $personaliaModel->getPassword();

        $query = "select * from personalia where username = '$username' and password = '$password'";
        $finds = [];

        try {
            $execute = mysqli_query($this->context->connectDb(), $query);
            while ($result = mysqli_fetch_array($execute)) {
                $personalia = new PersonaliaModel();
                $personalia->setUsername($result["username"]);
                $personalia->setPassword($result["password"]);
                $finds[] = $personalia;
            }
        } catch (mysqli_sql_exception $e){
            echo "
            <script>
            alert('Gagal Login ' + $e);
            </script>";
        } finally {
            $this->context->closeConnect();
        }

        if (count($finds) > 0) {
            return true;
        }

        return false;
    }
}