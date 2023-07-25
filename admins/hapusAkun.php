<?php
include "../connect.php";
session_start();

$idP = $_GET['id'];

$sqlDel = "DELETE FROM pengguna WHERE id=$idP";
$sqlRun = mysqli_query($conn, $sqlDel);

if ($sqlRun) {
    header("Location: kelolaUser.php");
} else {
    header("Location: kelolaUser.php");
}

?>
