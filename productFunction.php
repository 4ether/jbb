<?php
include "connect.php";
session_start();

$nominal = $_POST["nominal"];
$idPenawar = $_SESSION["id"];
$idBisnis = $_GET["id"];

$sqlBis = "SELECT id, nama, harga FROM bisnis WHERE id=$idBisnis";
$hasil = mysqli_query($conn, $sqlBis);
$row = mysqli_fetch_assoc($hasil);

$idBis = $row['id'];
$namaBisnis = $row['nama'];
$hargaBis = $row['harga'];

$var = "INSERT INTO penawaran (id_bisnis, id_penawar, namaBisnis, hargaAsli, hargaTawar, tanggal) VALUES ('$idBisnis','$idPenawar','$namaBisnis','$hargaBis', '$nominal', NOW())";

if(isset($_POST['submit'])){
    $hasil = $conn->query($var);
    if ($hasil === TRUE) { 
        header("Location: product.php?id=$idBisnis");
    } else {
        echo "
        <script>
            alert('Mohon maaf gagal mengajukan penawaran!');
            window.location=document.referrer;
        </script>
        ";
    }
}

$conn->close();
?>