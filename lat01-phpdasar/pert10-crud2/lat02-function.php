<?php     
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "database_tpa");
    // (namaserver, username, pw, database)


    // Mengambil data
    function query($query){
        global $conn;
        // variabel $conn didalam function merupakan variabel lokal yg menampung nilai variabel global diatas
        $result = mysqli_query($conn, $query);
        // result itu ibarat lemari untuk menampung baju
        $rows = [];
        // rows ibarat kotak kosong untuk menampung baju
        while($row = mysqli_fetch_assoc($result)){
            // row ibarat baju yang akan diambil satu persatu (pengulangan) 
            $rows[] = $row;
            // memasukkan baju kedalam kotak 
        }
        return $rows;
    }
    

    // Menambahkan data
    function tambah($data){
        // $data menangkap data dari function tambah di lat03 yang dikirimkan oleh $_POST 
        global $conn;
        // koneksi ke database, sehingga di lat03 tadak memerlukan koneksi lagi
        // ambil data dari tiap elemen dalam form dan dimasukkan kedalam variabel
        $nama = htmlspecialchars($data["nama"]);
        $kelas = htmlspecialchars($data["kelas"]);                    
        $alamat = htmlspecialchars($data["alamat"]);  
        $gambar = htmlspecialchars($data["gambar"]);
        // tiap elemen dimasukkan kedalam variabel supaya tidak terlalu banyak tanda kutip (eror) ketika insert data dengan syntax mysql
        // htmlspecialchars berfungsi untuk mengamankan data

        // query insert data
        $query = "INSERT INTO siswa
                    VALUES
                    ('', '$nama', '$kelas', '$alamat', '$gambar')
                ";
                // Masukan rumus mysql untuk insert data ke dalam database
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    // Menghapus data
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
        return mysqli_affected_rows($conn);
    }


    function ubah($data){
        // $data menangkap data dari function ubah di lat05 yang dikirimkan oleh $_POST 
        global $conn;
        // koneksi ke database, sehingga di lat03 tadak memerlukan koneksi lagi
        // ambil data dari tiap elemen dalam form dan dimasukkan kedalam variabel
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $kelas = htmlspecialchars($data["kelas"]);                    
        $alamat = htmlspecialchars($data["alamat"]);  
        $gambar = htmlspecialchars($data["gambar"]);
        // tiap elemen dimasukkan kedalam variabel supaya tidak terlalu banyak tanda kutip (eror) ketika insert data dengan syntax mysql
        // htmlspecialchars berfungsi untuk mengamankan data
        // $_POST diubah menjadi $data sesuaikan dengan parameter

        // query insert data
        $query = "UPDATE siswa SET
                    nama = '$nama',
                    kelas = '$kelas',
                    alamat = '$alamat',
                    gambar = '$gambar'
                WHERE id = $id
                ";
                // Masukan rumus mysql untuk insert data ke dalam database
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
 ?>