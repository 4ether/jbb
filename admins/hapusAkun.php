<?php
include "../connect.php";
session_start();

$idP = $_GET['id'];

$sqlDel = "DELETE FROM pengguna WHERE id=$idP";
$sqlDel2 = "DELETE FROM penawaran WHERE id_penawar=$idP";
$sqlRun = mysqli_query($conn, $sqlDel);
$sqlRun2 = mysqli_query($conn, $sqlDel2);

if ($sqlRun && $sqlRun2) {
    header("Location: kelolaUser.php");
} else {
    header("Location: kelolaUser.php");
}

?>