<?php
include("koneksi.php");

if ($_GET['aksi'] == 'hapus') {
    $hapus = $mysqli->query("DELETE FROM tbl_dosen WHERE id=$_GET[id]");

    if ($hapus) {
        header("location:index.php?p=dosen");
    } else {
        echo "Gagal";
    }
}

if ($_GET['aksi'] == 'update') {
    $id = $_GET['id'];
    $nip = $_POST['nip'];
    $nama =  $_POST['nama'];
    $jekel = $_POST['jekel'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $pendidikan = $_POST['pendidikan'];
    $alamat = $_POST['alamat'];

    $update = $mysqli->query("UPDATE tbl_dosen
	SET
	nip = $nip,
	nama = '$nama',
	jekel = '$jekel',
	notelp = '$notelp',
	email = '$email',
	pendidikan = '$pendidikan',
	alamat = '$alamat'
	WHERE id=$id");

    if ($update) {
        header("location:index.php?p=dosen");
    } else {
        echo "Gagal";
    }
}

if ($_GET['aksi'] == 'entri') {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jekel = $_POST['jekel'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $pendidikan = $_POST['pendidikan'];
    $alamat = $_POST['alamat'];

    $add = $mysqli->query("INSERT INTO tbl_dosen VALUES
		(null,$nip,'$nama','$jekel','$notelp','$email','$pendidikan','$alamat')");

    echo $add;
    if ($add) {
        header("location:index.php?p=dosen");
    } else {
        echo "Gagal";
    }
}
