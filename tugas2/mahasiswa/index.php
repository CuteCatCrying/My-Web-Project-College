<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tugas 2</title>
</head>
<body>
	<h1>List Mahasiswa Politeknik</h1>
	<table border="1">
		<tr>
			<td>No</td>
			<td>NIM</td>
			<td>Nama</td>
			<td>Prodi</td>
			<td>Jekel</td>
			<td>Email</td>
			<td>Alamat</td>
			<td>Action</td>
		</tr>
		<?php 
		include("koneksi.php");
		$list = $mysqli->query("SELECT * FROM tbl_mhs");
		$no = 1;
		while ($data = $list->fetch_array()){

		?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data['nim']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['prodi']; ?></td>
				<td><?php echo $data['jekel']; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><a href='<?php echo "edit.php?nim=$data[nim]" ?>'>EDIT</a> | <a href='<?php echo "hapus.php?nim=$data[nim]" ?>'>Hapus</a></td>
			</tr>
		<?php 
			$no += 1;
		} 
		?>
	</table>
	<p><a href="tambah.php">Disini</a> untuk tambah mahasiswa</p>
</body>
</html>