<?php 
include("koneksi.php");
$hapus = $mysqli->query("DELETE FROM tbl_dosen WHERE id=$_GET[id]");

if ($hapus) {
	header("location:index.php");
} else {
	echo "Gagal";
}
?>