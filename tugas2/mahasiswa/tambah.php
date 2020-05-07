<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mahasiswa</title>
</head>
<body>
	<h1>Tambah Mahasiswa</h1>
	<form action="" method="POST">
		<table>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><input type="number" name="nim"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Prodi</td>
				<td>:</td>
				<td>
					<select name="prodi" id="">
						<option value="trpl">TRPL</option>
						<option value="mi">MI</option>
						<option value="tk">TK</option>
					</select>
				</td>
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
				<td>Email</td>
				<td>:</td>
				<td><input type="email" name="email"></td>
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
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$prodi = $_POST['prodi'];
	$jekel = $_POST['jekel'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];

	$add = $mysqli->query("INSERT INTO tbl_mhs VALUES
		('$nim','$nama','$prodi','$jekel','$email','$alamat')");

	if ($add) {
		header("location:index.php");
	} else {
		echo "Gagal";
	}
}
?>