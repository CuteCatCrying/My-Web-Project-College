<?php
include("koneksi.php");
$hapus = $mysqli->query("DELETE FROM buku WHERE kode_buku='$_GET[kode_buku]'");

if ($hapus) {
	header("location:index.php");
} else {
	echo "Gagal";
}
