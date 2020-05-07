<?php 
include("koneksi.php");
$hapus = $mysqli->query("DELETE FROM tbl_mhs WHERE nim=$_GET[nim]");

if ($hapus) {
	header("location:index.php");
} else {
	echo "Gagal";
}
?>