<?php
$judul = "Daftar Anggota";
ob_start(); ?>

<div class="container">
    <h1>Daftar Anggota</h1>
    <a href="http://localhost/lat-php/oopmvc/index.php/anggota/create">
        <button class="btn btn-success" type="" name="btn">Tambah Anggota</button>
    </a>
    <table border="1" cellpadding="10" cellspacing="0" class="table">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Detail</th>
        </tr>
        <?php
        foreach ($anggota as $row) :
        ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['tanggal_lahir']; ?></td>
                <td><a href="anggota/detail?id=<?= $row['id']; ?>" class="btn btn-primary">View</a>
                    <a href="anggota/edit?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="anggota/delete?id=<?= $row['id']; ?>" class="btn btn-danger delete-button">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php $isi = ob_get_clean(); ?>
<?php include 'view/template.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                var confirmDelete = confirm('Apakah anda yakin ingin menghapus anggota ini?');
                if (!confirmDelete) {
                    event.preventDefault();
                }
            });
        });
    });
</script>