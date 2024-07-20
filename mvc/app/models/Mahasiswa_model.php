<?php
class Mahasiswa_model
{
    //// array associative
    // private $mhs = [
    //     [
    //         "nama" => "Muhammad Fajar Ramadhan",
    //         "npm" => "43378572012203",
    //         "email" => "mfajarr@horizon.ac.id",
    //         "jurusan" => "Sistem Informasi"
    //     ],
    //     [
    //         "nama" => "Diva Destia Rohyadi",
    //         "npm" => "43378572012204",
    //         "email" => "mfajarr@horizon.ac.id",
    //         "jurusan" => "Sistem Informasi"
    //     ],
    //     [
    //         "nama" => "Muhammad Hanif Solatan",
    //         "npm" => "43378572012205",
    //         "email" => "mfajarr@horizon.ac.id",
    //         "jurusan" => "Sistem Informasi"
    //     ],
    //     [
    //         "nama" => "Muhammad Rakha Fadhilah",
    //         "npm" => "43378552012206",
    //         "email" => "mfajarr@horizon.ac.id",
    //         "jurusan" => "Informatika"
    //     ],
    // ];
    //     public function getAllMahasiswa()
    //     {
    //         return $this->mhs;
    //     }
    // }



    // Teknik PDO atau PHP data object 
    // $dbh = database handler
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }



    public function getAllMahasiswa()
    {

        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();

        //// Sudah tidak menggunakan syntax ini, karena sudah digunakan di Database Wrapper pada core/Database.php
        // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        // $this->stmt->execute();
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id =:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES('', :nama, :npm , :email, :jurusan)";
        // pake : (binding) agar bersih string querynya
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET 
                    nama = :nama,
                    npm = :npm,
                    email = :email,
                    jurusan= :jurusan
                WHERE id = :id";
        // pake : (binding) agar bersih string querynya
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();

        //// Sudah tidak menggunakan syntax ini, karena sudah digunakan di Database Wrapper pada core/Database.php
        // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        // $this->stmt->execute();
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
