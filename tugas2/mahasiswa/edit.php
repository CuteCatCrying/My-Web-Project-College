<?php 
include("koneksi.php");
$edit = $mysqli->query("SELECT * FROM tbl_mhs WHERE nim=$_GET[nim]");
$data = $edit->fetch_array();
?>
<h1>Edit Data Mahasiswa</h1>
 <form action="" method="POST">
 	<table>
 		<tr>
 			<td>NIM</td>
 			<td>:</td>
 			<td><input type="number" name="nim" value="<?php echo $data['nim']; ?>" readonly></td>
 		</tr>
 		<tr>
 			<td>Nama</td>
 			<td>:</td>
 			<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
 		</tr>
 		<tr>
 			<td>Prodi</td>
 			<td>:</td>
 			<td>
 				<select name="prodi" id="">
 					<?php $prodi=$data['prodi'];
 					if (prodi == 'trpl') {
 						echo "<option value='trpl' selected>TRPL</option>";
 					} else {
 						echo "<option value='trpl'>TRPL</option>";
 					}
 					if (prodi == 'mi') {
 						echo "<option value='mi' selected>MI</option>";
 					} else {
 						echo "<option value='mi'>MI</option>";
 					}
 					if (prodi == 'tk') {
 						echo "<option value='tk' selected>TK</option>";
 					} else {
 						echo "<option value='tk'>TK</option>";
 					}
 					?>
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td>Jekel</td>
 			<td>:</td>
 			<td> 				
 				<?php $jekel=$data['jekel'];
 					if ($jekel == "laki laki") {
 						echo "<input type='radio' name='jekel' value='laki laki' selected>Laki laki";
 					} else {
 						echo "<input type='radio' name='jekel' value='laki laki'>Laki laki";
 					}
 					if ($jekel == "perempuan") {
 						echo "<input type='radio' name='jekel' value='perempuan' selected>Perempuan";
 					} else {
 						echo "<input type='radio' name='jekel' value='perempuan'>Perempuan";
 					}
 				?>
 			</td>
 		</tr>
 		<tr>
 			<td>Email</td>
 			<td>:</td>
 			<td><input type="email" name="email" value="<?php echo $data['email'] ?>"></td>
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
 	$nim = $_GET['nim'];
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
 		header("location:index.php");
 	} else {
 		echo "Gagal";
 	}
 }
 ?>