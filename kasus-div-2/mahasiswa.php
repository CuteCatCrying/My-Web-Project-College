<?php
include("koneksi.php");
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>
        <!-- proses list -->
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
            $list = $mysqli->query("SELECT * FROM tbl_mhs");
            $no = 1;
            while ($data = $list->fetch_array()) {

            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nim']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['prodi']; ?></td>
                    <td><?php echo $data['jekel']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><a href='<?php echo "index.php?p=mhs&aksi=edit&nim=$data[nim]" ?>'>EDIT</a> | <a href='<?php echo "aksi_mahasiswa.php?aksi=hapus&nim=$data[nim]" ?>' onclick="return confirm('Yakin akan menghapus data?')">Hapus</a></td>
                </tr>
            <?php
                $no += 1;
            }
            ?>
        </table>
        <p><a href="index.php?p=mhs&aksi=entri">Disini</a> untuk tambah mahasiswa</p>
    <?php
        break;
    case 'entri':
    ?>
        <!-- Proses Entri -->
        <h1>Tambah Mahasiswa</h1>
        <form action="aksi_mahasiswa.php?aksi=entri" method="POST">
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
    <?php
        break;
    case 'edit':
        $edit = $mysqli->query("SELECT * FROM tbl_mhs WHERE nim=$_GET[nim]");
        $data = $edit->fetch_array();
    ?>
        <!-- Proses Edit -->
        <h1>Edit Data Mahasiswa</h1>
        <form action="aksi_mahasiswa.php?aksi=update" method="POST">
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
                            <?php $prodi = $data['prodi'];
                            if ($prodi == 'trpl') {
                                echo "<option value='trpl' selected>TRPL</option>";
                            } else {
                                echo "<option value='trpl'>TRPL</option>";
                            }
                            if ($prodi == 'mi') {
                                echo "<option value='mi' selected>MI</option>";
                            } else {
                                echo "<option value='mi'>MI</option>";
                            }
                            if ($prodi == 'tk') {
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
                        <?php $jekel = $data['jekel'];
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
        break;
}
?>