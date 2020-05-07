<?php
include("koneksi.php");
$query_select = "SELECT * FROM buku WHERE kode_buku='$_GET[kode_buku]'";
$data = $mysqli->query($query_select)->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>UTS Web Perpustakaan</title>
</head>

<body>
	<h1>Edit Buku</h1>
	<form action="" method="POST">
		<table>
			<tr>
				<td>Kode Buku</td>
				<td>:</td>
				<td><input type="text" name="judul_buku" value="<?php echo $data['kode_buku']; ?>" readonly></td>
			</tr>
			<tr>
				<td>Judul Buku</td>
				<td>:</td>
				<td><input type="text" name="judul_buku" value="<?php echo $data['judul_buku']; ?>"></td>
			</tr>
			<tr>
				<td>Pengarang</td>
				<td>:</td>
				<td><input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>"></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td>:</td>
				<td><input type="text" name="penerbit" value="<?php echo $data['penerbit']; ?>"></td>
			</tr>
			<tr>
				<td>Kategori Buku</td>
				<td>:</td>
				<td>
					<select name="kategori_buku">
						<option value="Programming" <?php if ($data['kategori_buku'] == 'Programming') echo "selected"; ?>>Programming</option>
						<option value="Desain Grafis" <?php if ($data['kategori_buku'] == 'Desain Grafis') echo "selected"; ?>>Desain Grafis</option>
						<option value="Jaringan" <?php if ($data['kategori_buku'] == 'Jaringan') echo "selected"; ?>>Jaringan</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jumlah Halaman</td>
				<td>:</td>
				<td><input type="number" name="jumlah_halaman" value="<?php echo $data['jumlah_halaman']; ?>"></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td><textarea name="keterangan" cols="30" rows="10"><?php echo $data['keterangan']; ?></textarea></td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Submit">
		<input type="button" value="Back" onclick="window.location.href = 'index.php'">
	</form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
	$kode_buku = $_GET['kode_buku'];
	$judul_buku = $_POST['judul_buku'];
	$pengarang = $_POST['pengarang'];
	$penerbit = $_POST['penerbit'];
	$kategori_buku = $_POST['kategori_buku'];
	$jumlah_halaman = $_POST['jumlah_halaman'];
	$keterangan = $_POST['keterangan'];

	$query_update = "UPDATE buku SET
        judul_buku = '$judul_buku',
        pengarang = '$pengarang',
        penerbit = '$penerbit',
        kategori_buku = '$kategori_buku',
        jumlah_halaman = $jumlah_halaman,
        keterangan = '$keterangan' WHERE kode_buku = '$kode_buku'";

	$update = $mysqli->query($query_update);
	if ($update) {
		header("location:index.php");
	} else {
		echo "Gagal";
	}
}
?>