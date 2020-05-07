<?php
include("koneksi.php");
$edit = $mysqli->query("SELECT * FROM tbl_dosen WHERE id=$_GET[id]");
$data = $edit->fetch_array();
?>
<h1>Edit Data Dosen</h1>
<form action="" method="POST">
	<table>
		<tr>
			<td>NIP</td>
			<td>:</td>
			<td><input type="number" name="nip" value="<?php echo $data['nip']; ?>"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
		</tr>
		<tr>
			<td>Jekel</td>
			<td>:</td>
			<td>
				<input type='radio' name='jekel' value='laki laki' <?php if ($data['jekel'] == "laki laki") echo "checked"; ?>>Laki laki
				<input type='radio' name='jekel' value='perempuan' <?php if ($data['jekel'] == "perempuan") echo "checked"; ?>>Perempuan
			</td>
		</tr>
		<tr>
			<td>No Telp</td>
			<td>:</td>
			<td><input type="text" name="notelp" value="<?php echo $data['notelp']; ?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><input type="email" name="email" value="<?php echo $data['email'] ?>"></td>
		</tr>
		<tr>
			<td>Pendidikan</td>
			<td>:</td>
			<td>
				<select name="pendidikan" id="">
					<option value="S2" <?php if ($data['pendidikan'] == "S2") echo "selected"; ?>>S2</option>
					<option value="S1" <?php if ($data['pendidikan'] == "S1") echo "selected"; ?>>S1</option>
					<option value="D4" <?php if ($data['pendidikan'] == "D4") echo "selected"; ?>>D4</option>
					<option value="D3" <?php if ($data['pendidikan'] == "D3") echo "selected"; ?>>D3</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><textarea name="alamat" id="" cols="30" rows="10"><?php echo $data['alamat'] ?></textarea></td>
		</tr>
	</table>
	<input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST['submit'])) {
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
		header("location:index.php?p=mhs");
	} else {
		echo "Gagal";
	}
}
?>