<?php
include("koneksi.php");

if ($_GET['aksi'] == 'hapus') {
    $mysqli->query("DELETE FROM tbl_mhs WHERE nim='$_GET[nim]'");
    header('location:index.php?p=mhs');
}

if ($_GET['aksi'] == 'update') {
    $nim = $_POST['nim'];
    $nama =  $_POST['nama'];
    $prodi = $_POST['prodi'];
    $jekel = $_POST['jekel'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $update = $mysqli->query("UPDATE tbl_mhs
 		SET
 		nama = '$nama',
 		prodi = '$prodi',
 		jekel = '$jekel',
 		email = '$email',
 		alamat = '$alamat'
 		WHERE nim=$nim");

    if ($update) {
        header("location:index.php?p=mhs");
    } else {
        echo "Gagal";
    }
}

if ($_GET['aksi'] == 'entri') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $jekel = $_POST['jekel'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $add = $mysqli->query("INSERT INTO tbl_mhs VALUES
		('$nim','$nama','$prodi','$jekel','$email','$alamat')");

    if ($add) {
        header("location:index.php?p=mhs");
    } else {
        echo "Gagal";
    }
}
