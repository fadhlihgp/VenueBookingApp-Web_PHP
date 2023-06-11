<?php
session_start();

// Cek apakah pengguna sudah login sebelumnya, jika iya, redirect ke halaman utama
if (isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit();
}

use controllers\LoginController;

include "../controllers/LoginController.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new PersonaliaModel();
    $user->setUsername($_POST['username']);
    $user->setPassword($_POST['password']);

    $login = new LoginController();
    $login->login($user);
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" >

</head>

<body>
<main>
    <div class="d-flex">

    </div>
    <section class="d-flex vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                         class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="post">
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Login Personlia</p>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="username" id="form3Example3" class="form-control form-control-lg"
                                   placeholder="Masukkan username" required/>
                            <label class="form-label" for="form3Example3">Username</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                                   placeholder="Enter password" required/>
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input type="submit" class="btn btn-primary btn-lg" value="Login"
                               style="padding-left: 2.5rem; padding-right: 2.5rem;"/>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- Right -->
        </div>
    </section>
    <!-- Pills content -->
</main>
<footer>
    <!-- place footer here -->
</footer>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="../js/bootstrap.min.js">
</script>
</body>

</html>
