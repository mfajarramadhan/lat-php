<?php 
    session_start();
    if(isset($_SESSION["login"])){
        header("location: lat01-admin-page.php");
        exit;
    }
    // untuk menjalankan session di setiap file
    require 'lat02-function.php';

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Cek seluruh username dan dimasukkan kedalam variabel $result
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        // Cek username
        if(mysqli_num_rows($result) === 1){
            // Menghitung berapa baris yg dikembalikan dari $result, jika ada maka bernilai 1, jika tidak 0

            // cek password berdasarkan username
            $row = mysqli_fetch_assoc($result);
            // mengambil seluruh data dari username berupa id, username, password.hash() dan dimasukkan ke var $row
            
            
            if (password_verify($password, $row["password"])){
            // Kebalikan password.hash(yang sudah diacak)
            // Mengecek apakah string sama dengan hash yg sudah diacak tadi
            // jika sama passwordnya benar
            // parameter 1 dari inputan form user ($password)
            // parameter 2 dari database ($row(['password']))
            // jika keduanya sama, maka perbolehkan user masuk kedalam sistem

            $_SESSION["login"] = true;
            // membuat session login yg akan di cek di setiap file
            header("Location: lat01-admin-page.php");
            exit;
            // menghentikan kode ketika password tidak sesuai
            }
        }
        $error = true;
        // error diletakkan diluar if untuk di eksekusi ketika tidak ada baris yg dikembalikan didalam database
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
    <h1>Halaman Login</h1>

    <?php if(isset($error)) : ?>
         <p style="color:red; font-style:italic;">username/password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
    <p>username : admin <br>password : admin123</p>
</body>
</html>