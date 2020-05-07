<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Dosen</title>
</head>

<body>
	<h1>Tambah Dosen</h1>
	<form action="" method="POST">
		<table>
			<tr>
				<td>NIP</td>
				<td>:</td>
				<td><input type="number" name="nip"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Jekel</td>
				<td>:</td>
				<td>
					<input type="radio" name="jekel" value="laki laki">Laki laki
					<input type="radio" name="jekel" value="perempuan">Perempuan
				</td>
			</tr>
			<tr>
				<td>No Telp</td>
				<td>:</td>
				<td><input type="text" name="notelp"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<td>Pendidikan</td>
				<td>:</td>
				<td>
					<select name="pendidikan" id="">
						<option value="S2">S2</option>
						<option value="S1">S1</option>
						<option value="D4">D4</option>
						<option value="D3">D3</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><textarea name="alamat" id="" cols="30" rows="10"></textarea></td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>

</html>

<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
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
?>