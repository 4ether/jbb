<?php
include "connect.php";

$id = $_POST['type'];
if($_POST['type'] === '1') {
	$jenis = "Admin";
} else if ($_POST['type'] === '2') {
	$jenis = "Investor";
} else if ($_POST['type'] === '3') {
	$jenis = "Pengusaha";
}
$nama = $_POST['nama'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$notelp = $_POST['notelp'];

	$varEm = "SELECT * FROM pengguna WHERE email='$email'";
	$var = "INSERT INTO pengguna (id_jenis, nama, email, password, notelp) VALUES ('$id','$nama','$email','$pass', '$notelp')";
	
	if(isset($_POST['submit'])){
		$checkEm = mysqli_query($conn, $varEm);
		if(mysqli_num_rows($checkEm) > 0) {
			header("Location: register.php?error=1");
		} else {
			$hasil = $conn->query($var);
			if($hasil === TRUE) {
				header("Location: login.php");
			}
		}
	}
	
$conn->close();
?>
