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
        // tiap elemen dimasukkan kedalam variabel supaya tidak terlalu banyak tanda kutip (eror) ketika insert data dengan syntax mysql
        // htmlspecialchars berfungsi untuk mengamankan data


        // upload gambar
        $gambar = upload();
        if(!$gambar){
            return false;
            // jika gambar belum di upload, maka function upload akan false dan kode dibawah tidak akan dijalankan
        }
        // if($gambar === false)
        // bisa juga dengan cara diatas


        // query insert data
        $query = "INSERT INTO siswa
                    VALUES
                    ('', '$nama', '$kelas', '$alamat', '$gambar')
                ";
                // Masukan rumus mysql untuk insert data ke dalam database
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }


    // Upload Gambar
    function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        // ambil namafile,ukuran,pesaneror,dan directorynya kemudian dimasukkan kedalam variable

        // cek apakah ada gambar yg di upload atau tidak
        if($error === 4){
            echo "<script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>";
            return false;
            // 4 merupakan feedback yg menandakan tidak ada gambar yg di upload
            // jika tidak ada, maka kembalikan false agar tidak mengeksekusi kode dibawah
        }

        // Cek apakah yang di upload adalah gambar
        // Taro kedalam array agar mudah ceknya
        $ekstensiGambarValid = ['jpg','jpeg','png']; 
        // ekstensi file yg diinginkan
        $ekstensiGambar = explode('.', $namaFile);
        // Explode memecah string menjadi array
        // Contoh : sandhika.galih.jpg menjadi ['sandhika', 'galih', 'jpg']; 
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        // end mengambil elemen array yang terakhir berupa jpg/JPG/png 
        // strtolower memaksa semua huruf menjadi kecil
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
                    alert('Yang anda upload bukan gambar!');
                </script>";
            return false;
        }
        // in_array berfungsi seperti mengambil jarum dalam jerami
        // jarumnya ekstensi file inputan user, jeraminya esktensi file yg diinginkan
        // kembalikan false jika ekstensi yg di inout user tidak sesuai yg diinginkan

        // jika memilih gambar baru
        if($ukuranFile > 1000000){
        echo "<script>
                    alert('Ukuran terlalu besar, max 1mb!');
                </script>";
            return false;
        }
        // Lolos pengecekan, siap upload

        $namaFileRandom = uniqid();
        $namaFileRandom .= '.';
        $namaFileRandom .= $ekstensiGambar;
        move_uploaded_file($tmpName, 'img/' . $namaFileRandom);
        // uniqid() berfungsi untuk membuatkan string random agar namafile gambar tidak ada yg sama dan tidak tertimpa
        // tambahkan . dan juga $ekstensiGambar agar nama file menjadi 34782kf34.jpg atau 34782kf34.jpeg atau 34782kf34.png
        // move_uploaded_file() berfungsi memindahkan file yg sudah di upload di tmpName ke penyimpanan yg kita tuju yaitu folder img
        // kemudian masukkan namafile nya yaitu $namaFileRandom jangan $namaFile untuk mencegah nama file yg sama tertimpa  

        return $namaFileRandom;
    }


    // Menghapus data
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
        return mysqli_affected_rows($conn);
    }


    // Merubah data
    function ubah($data){
        // $data menangkap data dari function ubah di lat05 yang dikirimkan oleh $_POST 
        global $conn;
        // koneksi ke database, sehingga di lat03 tadak memerlukan koneksi lagi
        // ambil data dari tiap elemen dalam form dan dimasukkan kedalam variabel
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $kelas = htmlspecialchars($data["kelas"]);                    
        $alamat = htmlspecialchars($data["alamat"]);  
        $gambarlama = htmlspecialchars($data["gambarlama"]); 

        // cek apakah user memilih gambar baru atau tidak
        // jika tidak memilih gambar baru, maka $gambar tetap berisi gambar lama
        if($_FILES['gambar']['error'] === 4){
            $gambar = $gambarlama;
        }else{
            $gambar = upload();
        // jika memilih gambar baru, maka fungsi upload akan dijalankan
        }

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


    // Membaca data
    function cari($search){
        $query = "SELECT * FROM siswa
                    WHERE
                nama LIKE '%$search%' OR
                kelas LIKE '%$search%' OR
                alamat LIKE '%$search%' 
                -- Like berfungsi untuk pencarian secara flexsibel
                -- % sebelum dan sesudah variabel berfungsi sebagai while card
                -- while card : tidak peduli apapun sebelum dan sesudah yang diketikkan
                -- misal user mengetik riski, semua nama yang ada riskinya akan muncul, ntah m.riski, riski a, riski b, dll
                ";

        // contoh : misal $search di parameter berisi nama Riski yang diketik oleh user, 
        // kemudian string query dirangkai dengan rumus mysql, 
        // lalu hasilnya dikembalikan dengan function baru yaitu function query() berupa array associative 
        // lalu hasilnnya dimasukkan ke variabel $siswa di lat01
        return query($query);
    }


    function registrasi($data){
        global $conn;
        // mengubah paksa username menjadi huruf kecil dan menghilangkan slash (/)
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        // mysqli_real_escape_string() menambahkan tanda kutip saat user memasukkan password dan mengamankan di database


        // cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if(mysqli_fetch_assoc($result)){
            echo "<script>
                    alert('Username sudah terdaftar, buat username lain!');
                </script>";
                return false;
        }
        


        // cek konfirmasi password 
        if($password !== $password2){
            echo "<script>
                    alert('Konfirmasi password tidak sesuai!');
                </script>";
            return false;
            // gunakan return false agar memasukan data false ke lat06-signup di function register() bahwa mysqli_error 

        }
        // return 1;
        // gunakan return 1 agar memasukan data true ke lat06-signup di function register() dan munculkan alert  


        // Enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Tambahkan userbaru ke database
        mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

        return mysqli_affected_rows($conn);
        // Tambshksn user baru ke database
    }
 ?>