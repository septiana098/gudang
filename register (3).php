<?php
include "config/database.php";
$database = new Database();
$koneksi = $database->getConnection();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Pengelolaan Data Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .register-form {
            width: 100%;
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .register-form h2 {
            margin-bottom: 30px;
            text-align: center;
            color: #343a40;
        }
        .form-group {
            margin-bottom: 15px;
        }
        textarea.form-control {
            resize: none;
        }
        .btn {
            width: 48%;
        }
    </style>
</head>
<body>
    <div class="register-form">
        <form method="post">
            <h2>Register</h2>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required />
            </div>

            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email" required />
            </div>

            <div class="form-group">
                <label>No Telepon</label>
                <input class="form-control" type="text" name="no_telepon" placeholder="No Telepon" required />
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat lengkap" required></textarea>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username" required />
            </div>

            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" required />
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                <a class="btn btn-danger" href="login.php">Login</a>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['register'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $insert = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,no_telepon,username,password) VALUES('$nama','$email','$alamat','$no_telepon','$username','$password')");

        if ($insert) {
            echo '<script>alert("Selamat, Register Berhasil. Silahkan Login"); location.href="login.php";</script>';
        } else {
            echo '<script>alert("Register gagal, silahkan ulang kembali.")</script>';
        }
    }
    ?>
</body>
</html>
