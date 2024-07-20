<?php 
    session_start();

    $_SESSION = [];
    // mengisi session dengan array kosong
    session_unset();
    // remove semua session
    session_destroy();
    // menghancurkan/menghapus semua session
    // dilakukan 3 pencegahan untuk memastikan bahwa session telah terhenti/bersih/clear 
    

    // menghapus cookie
    setcookie('id', '', time()- 3600);
    setcookie('key', '', time()- 3600);
    // set cookie id dan key dengan nilai kosong

    header("location: lat07-login.php");
    exit;
?>