<?php     
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "database_tpa");
    // (namaserver, username, pw, database)


    function query($query){
        global $conn;
        // variabel $conn didalam function merupakan variabel lokal yg menampung nilai variabel global diatas
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
 ?>