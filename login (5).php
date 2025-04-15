<?php
require 'function.php';

if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}

$login = new Login();

if (isset($_POST["submit"])) {
    $result = $login->login($_POST["usernameemail"], $_POST["password"]);

    if ($result == 1) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $login->idUser();
        header("Location: index.php");
    } elseif ($result == 10) {
        echo "<script> alert('Wrong Password'); </script>";
    } elseif ($result == 100) {
        echo "<script> alert('User Not Registered'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Login</h2>
                        <form action="" method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="usernameemail">Username or Email</label>
                                <input type="text" name="usernameemail" id="usernameemail" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="registration.php">Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
