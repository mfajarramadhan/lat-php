<?php

$request = isset($_SERVER['PATH_INFO']) ? preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']) : '';
$uri = explode('/', $request);

// form
if ($uri[1] === 'edit' && isset($_GET['id'])) {
    $judul = 'Edit Anggota';
    $form_action = "http://localhost/lat-php/oopmvc/index.php/anggota/edit?id=" . $_GET['id'];
} else {
    $judul = "Tambah Anggota";
    $form_action = "http://localhost/lat-php/oopmvc/index.php/anggota/create";
}

// form value
$valNama = isset($anggota['nama']) ? $anggota['nama'] : '';
$valTanggal_lahir = isset($anggota['tanggal_lahir']) ? $anggota['tanggal_lahir'] : '';
$valKota_lahir = isset($anggota['kota_lahir']) ? $anggota['kota_lahir'] : '';
$valID = isset($anggota['id']) ? $anggota['id'] : '';
?>

<?php ob_start() ?>
<div class="container">
    <h1><?= $judul; ?></h1>
    <a class="btn btn-success" href="http://localhost/lat-php/oopmvc/index.php/anggota">Kembali</a>
    <form action="<?= $form_action; ?>" method="post">
        <?php if ($valID) : ?>
            <input type="hidden" name="id" value="<?= $valID; ?>">
        <?php endif; ?>
        <div class="form-group">
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" value="<?= $valNama; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal lahir :</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= $valTanggal_lahir; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kota_lahir">Kota Lahir :</label>
            <input type="text" name="kota_lahir" id="kota_lahir" value="<?= $valKota_lahir; ?>" class="form-control" required>
        </div>
        <button type="submit" name="" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?php $isi = ob_get_clean(); ?>
<?php include "view/template.php" ?>