<?php
class About extends Controller
{
    public function index($nama = "Fajar", $pekerjaan = "Programmer")
    {
        // ambil datanya datanya berupa, pake array associative
        // kosong juga gpp, karena defaultnya array kosong
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['judul'] = "About";
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $this->view("about/page");
    }
}
