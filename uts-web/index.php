<!DOCTYPE html>
<html lang="en">

<head>
    <title>UTS Web Perpustakaan</title>
</head>

<body>
    <h1>Perpustakaan Politeknik Negeri Padang</h1>
    <form action="" method="POST">
        <table border="1">
            <tr align="center">
                <td>No</td>
                <td width="20%">Judul Buku</td>
                <td width="15%">Pengarang</td>
                <td width="10%">Penerbit</td>
                <td width="10%">Kategori Buku</td>
                <td>Jumlah Halaman</td>
                <td>Keterangan</td>
                <td width="10%">Aksi</td>
            </tr>

            <?php
            include("koneksi.php");
            $list_buku = $mysqli->query("SELECT * FROM buku");
            $no = 1;
            while ($data = $list_buku->fetch_array()) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['judul_buku']; ?></td>
                    <td><?php echo $data['pengarang']; ?></td>
                    <td><?php echo $data['penerbit']; ?></td>
                    <td><?php echo $data['kategori_buku']; ?></td>
                    <td><?php echo $data['jumlah_halaman']; ?></td>
                    <td><?php echo $data['keterangan']; ?></td>
                    <td>
                        <a href="edit.php?kode_buku=<?php echo $data['kode_buku']; ?>">Edit</a> | <a href="hapus.php?kode_buku=<?php echo $data['kode_buku']; ?>" onclick="return confirm('Anda Yakin Mau Hapus ?')">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </table>
    </form>
    <p><a href="tambah.php">Tambah Buku</a></p>
</body>

</html>