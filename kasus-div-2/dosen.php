<?php
include("koneksi.php");
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>
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
                    <td><a href='<?php echo "index.php?p=dosen&aksi=edit&id=$data[id]" ?>'>EDIT</a> | <a href='<?php echo "aksi_dosen.php?aksi=hapus&id=$data[id]" ?>' onclick="return confirm('Yakin akan menghapus data?')">Hapus</a></td>
                </tr>
            <?php
                $no += 1;
            }
            ?>
        </table>
        <p><a href="index.php?p=dosen&aksi=entri">Disini</a> untuk tambah Dosen</p>
    <?php
        break;
    case 'entri':
    ?>
        <h1>Tambah Dosen</h1>
        <form action="aksi_dosen.php?aksi=entri" method="POST">
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
    <?php
        break;
    case 'edit':
        $edit = $mysqli->query("SELECT * FROM tbl_dosen WHERE id=$_GET[id]");
        $data = $edit->fetch_array();
    ?>
        <h1>Edit Data Dosen</h1>
        <form action="aksi_dosen.php?aksi=update&id=<?php echo $data['id'] ?>" method="POST">
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
        break;
}
?>