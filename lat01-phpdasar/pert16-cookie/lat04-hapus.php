<?php 
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location : lat07-login.php");
        exit;
        // bila session login tidak ada, maka tendang user kembali ke halaman login

    }
    require 'lat02-function.php';
    // menghubungkan halaman

    $id = $_GET["id"];
    // mengambil data id di url yg dikirim dari lat01 pada <td>hapus</td> dan dimasukkan ke dalam variabel id
  
    if(hapus($id) > 0){
        // function hapus detailnya di lat-02, jika function hapus memiliki nilai lebih dari 0 maka berhasil menghapus data
        
        echo "
                <script>
                    alert('Data berhasil dihapus')
                    document.location.href = 'lat01-admin-page.php';
                </script>
                ";
            }else{
                echo " 
                <script>
                    alert('Gagal menghapus data');
                    document.location.href = 'lat01-admin-page.php';
                </script>
            ";
    }
    
?>