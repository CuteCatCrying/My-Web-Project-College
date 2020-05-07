<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    include("koneksi.php");

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $check_user = $mysqli->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
    $data_user = mysqli_fetch_array($check_user);
    $result_user = mysqli_num_rows($check_user);

    if ($result_user == 1) {
        session_start();
        $_SESSION['user'] = $data_user['username'];
        $_SESSION['level'] = $data_user['level'];

        header('location:index.php');
    } else {
        echo "<script>alert('Username and password invalid')</script>";
    }
}
?>