<?php
session_start();
if (!(isset($_SESSION['user']))) {
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Tugas</title>
  <style>
    * {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: turquoise;
      line-height: 100px;
      font-size: 20px;
      text-align: center;
      width: 100%;
      height: 15vh;
    }

    .menu {
      background-color: grey;
      float: left;
      width: 20%;
      height: 75vh;
    }

    .menu ul li {
      list-style: none;
      margin-left: 20px;
      margin-top: 20px;
    }

    .menu ul li a {
      text-decoration: none;
      color: black;
    }

    .menu ul li a:hover {
      text-decoration: underline;
      color: white;
    }

    .content {
      float: left;
      width: 80%;
      height: 75vh;
    }

    .content h3 {
      margin-top: 10px;
      margin-left: 10px;
    }

    .content p {
      margin-left: 10px;
      margin-right: 10px;
      text-align: justify;
    }

    .footer {
      background-color: turquoise;
      float: right;
      line-height: 10vh;
      text-align: center;
      width: 100%;
      height: 10vh;
    }
  </style>
</head>

<body>
  <div class="header">
    <h1>Necroplanetologi</h1>
  </div>
  <div class="menu">
    <ul>
      <li>
        <a href="index.php">Home</a>
      </li>
      <li>
        <a href="index.php?p=mhs">Mahasiswa</a>
      </li>
      <li>
        <a href="index.php?p=dosen">Dosen</a>
      </li>
      <li>
        <a href="logout.php">Log Out</a>
      </li>
    </ul>
  </div>
  <div class="content">
    <?php
    $p = isset($_GET['p']) ? $_GET['p'] : 'home';

    if ($p == 'home') include('home.php');
    if ($p == 'mhs') include('mahasiswa.php');
    if ($p == 'dosen') include('dosen.php');
    ?>
  </div>
  <div class="footer">
    <h4>National Geographic</h4>
  </div>
</body>

</html>