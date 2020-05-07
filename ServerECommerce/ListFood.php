<?php include_once("db_connect.php");
$list_data = $conn->prepare("SELECT id, nama, keterangan, harga, promo, gambar FROM food");
$list_data->execute();
$list_data->bind_result($id, $nama, $keterangan, $harga, $promo, $gambar);
$food_menus = array();

while ($list_data->fetch()) {
    $temp = array();
    $temp['id'] = $id;
    $temp['nama'] = $nama;
    $temp['keterangan'] = $keterangan;
    $temp['harga'] = $harga;
    $temp['promo'] = $promo;
    $temp['gambar'] = $gambar;
    array_push($food_menus, $temp);
}
echo json_encode($food_menus);
