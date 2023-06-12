<?php
include "../controllers/AdminController.php";
include "../vendor/autoload.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $employeeId = $_POST["employeeId"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    if ($password !== $confirmPassword) {
        echo "
        <script>
            alert('Password dan konfirmasi password harus sama !');
            window.location.replace('../views/registerAdmin.php');
        </script>";
        return;
    } else {
        $controller = new \controllers\AdminController();
        $admin = new \models\AdminModel();
        $admin->setId(\Ramsey\Uuid\Uuid::uuid4());
        $admin->setEmployeeId($employeeId);
        $admin->setPassword($password);
        $admin->setUsername($username);
        $controller->createAdmin($admin);
    }

}
