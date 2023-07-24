<?php
include "../connect.php";
session_start();

$idBis = $_GET['id'];

$sqlDel = "DELETE FROM bisnis WHERE id=$idBis";
$sqlDel2 = "DELETE FROM penawaran WHERE id_bisnis=$idBis";
$sqlRun = mysqli_query($conn, $sqlDel);
$sqlRun2 = mysqli_query($conn, $sqlDel2);

if ($sqlRun && $sqlRun2) {
    header("Location: histori.php");
} else {
    header("Location: histori.php");
}

?>