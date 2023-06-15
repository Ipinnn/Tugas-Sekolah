<?php

include 'config/koneksi.php';

error_reporting(0);

session_start();

if (isset($_SESSION['nama'])) {
    header("Location: index.php");
}

if (isset($_POST['simpan'])) {
    $nama       = $_POST['nama'];
    $username   = addslashes($_POST['username']);
    $password   = ($_POST['password']);
    $cpassword  = ($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM admin WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO admin (nama, username, password)
                    VALUES ('$nama', '$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $nama = "";
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                header("Location: login.php");
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}

?>