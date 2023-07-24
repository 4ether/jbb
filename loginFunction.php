<?php
session_start();
include "connect.php";

$email = $_POST['email'];
$pass = md5($_POST['pass']);

$sql = mysqli_query($conn, "SELECT id, id_jenis, nama, email, notelp, password FROM pengguna WHERE email = '$email' AND password = '$pass'");
$count = mysqli_num_rows($sql);
$fetchData = mysqli_fetch_array($sql);

    if ($count > 0) {
        $idJenis = $fetchData['id_jenis'];
        $name = $fetchData['nama'];

        $notelp = $fetchData['notelp'];
        $idPengguna = $fetchData['id'];
        if ($idJenis == "2" || $idJenis == "3") {
            $_SESSION['email'] = $email;
            $_SESSION['nama'] = $name;
            $_SESSION['password'] = $pass;
            $_SESSION['id_jenis'] = $idJenis;
            $_SESSION['notelp'] = $notelp;
            $_SESSION['id'] = $idPengguna;

            header("Location: index.php");
            
        } else if ($idJenis == "1") {
            $_SESSION['email'] = $email;
            $_SESSION['nama'] = $name;
            $_SESSION['password'] = $pass;
            $_SESSION['id_jenis'] = $idJenis;
            $_SESSION['id'] = $idPengguna;

            header("Location: admins/admin.php");
        }
    } else {
        header("Location: login.php?error=1");
    }

?>