<?php 
// Apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])){
    // cek username $ password
    if($_POST["username"] == "admin" && $_POST["password"] == "123"){
        // Jika benar, redirect ke halaman admin
        header("Location: lat02-admin.php");
        exit;
    }else{
        // Jika salah, tampilan pesan kesalahan
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h1>Login Admin</h1>
<?php if(isset($error)) : ?>
<?php echo "<script>alert('Username atau password salah')</script>" ?>
<?php endif; ?>

    <ul>
    <form action="" method="post">
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <button type="submit" name="submit">Login</button>
        </li>
    </ul>
        </form>
</body>
</html>
