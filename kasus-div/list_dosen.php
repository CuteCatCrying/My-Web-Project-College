<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Tugas 2</title>
</head>

<body>
	<h1>List Dosen Politeknik</h1>
	<table border="1">
		<tr>
			<td>No</td>
			<td>NIP</td>
			<td>Nama</td>
			<td>Jekel</td>
			<td>No Telp</td>
			<td>Email</td>
			<td>Pendidikan</td>
			<td>Alamat</td>
			<td>Action</td>
		</tr>
		<?php
		include("koneksi.php");
		$list = $mysqli->query("SELECT * FROM tbl_dosen");
		$no = 1;
		while ($data = $list->fetch_array()) {

		?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data['nip']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['jekel']; ?></td>
				<td><?php echo $data['notelp']; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['pendidikan']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><a href='<?php echo "index.php?p=edit_dosen&id=$data[id]" ?>'>EDIT</a> | <a href='<?php echo "hapus.php?id=$data[id]" ?>'>Hapus</a></td>
			</tr>
		<?php
			$no += 1;
		}
		?>
	</table>
	<p><a href="index.php?p=tambah_dosen">Disini</a> untuk tambah Dosen</p>
</body>

</html>