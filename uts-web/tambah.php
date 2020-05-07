<!DOCTYPE html>
<html lang="en">

<head>
    <title>UTS Web Perpustakaan</title>
</head>

<body>
    <h1>Tambah Buku</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Kode Buku</td>
                <td>:</td>
                <td><input type="text" name="kode_buku"></td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td>:</td>
                <td><input type="text" name="judul_buku"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td>:</td>
                <td><input type="text" name="pengarang"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:</td>
                <td><input type="text" name="penerbit"></td>
            </tr>
            <tr>
                <td>Kategori Buku</td>
                <td>:</td>
                <td>
                    <select name="kategori_buku">
                        <option value="Programming">Programming</option>
                        <option value="Desain Grafis">Desain Grafis</option>
                        <option value="Jaringan">Jaringan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Halaman</td>
                <td>:</td>
                <td><input type="number" name="jumlah_halaman"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><textarea name="keterangan" cols="30" rows="10"></textarea></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Reset">
        <input type="button" value="Back" onclick="window.location.href = 'index.php'">
    </form>
</body>

</html>

<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $kategori_buku = $_POST['kategori_buku'];
    $jumlah_halaman = $_POST['jumlah_halaman'];
    $keterangan = $_POST['keterangan'];

    $query_add = "INSERT INTO buku VALUES (
        '$kode_buku',
        '$judul_buku',
        '$pengarang',
        '$penerbit',
        '$kategori_buku',
        $jumlah_halaman,
        '$keterangan')";

    $add = $mysqli->query($query_add);
    if ($add) {
        header("location:index.php");
    } else {
        echo "Gagal";
    }
}
?>