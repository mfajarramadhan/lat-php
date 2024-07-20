<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?= Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary btnTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="cari mahasiswa" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="btnCari" autocomplete="off">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-6">

            <h3>Daftar Mahasiswa</h3>

            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) :  ?>
                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge text-bg-danger float-end ms-2" onclick="return confirm('yakin menghapus <?= $mhs['nama']; ?>?');">hapus</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge text-bg-success float-end ms-2 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>">ubah</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge text-bg-primary float-end ms-2">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                        <input type="number" class="form-control" id="npm" name="npm">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="from-group">
                        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                        <select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
                            <option value="Informatika">Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Manajemen">Manajemen</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>