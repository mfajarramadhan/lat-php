
$(function () {

    $('.btnTambahData').on('click', function () {
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#npm').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');

    })
    $('.tampilModalUbah').on('click', function () {
        // $('#judulModal').html('Ubah Data Mahasiswa');
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/lat-php/mvc/public/mahasiswa/ubah');

        // this adalah tombol yg kita klik
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/lat-php/mvc/public/mahasiswa/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#npm').val(data.npm);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
                // di javascript menggunakan titik untuk menangkap object, di php pakai ->
                // data.nama || data->nama
            }
        });
    });
});