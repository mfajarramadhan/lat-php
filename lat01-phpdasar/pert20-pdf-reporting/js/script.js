// Jquery
$(document).ready(function () {
    // sembunyikan tombol cari
    $('#tombol-cari').hide();

    $('#keyword').on('keyup', function () {
        // munculkan loading
        $('.loader').show();

        $.get('ajax/siswa.php?keyword=' + $('#keyword').val(), function (data) {
            // parameter data menggantikan xhr.responseText di dalam container.innerHTML
            $('#container').html(data);
            $('.loader').hide();
        });
    });
});
// $ itu = jQuery
// $(document) = jquery, tolong ambilkan document
// $('tombol-cari') = jquery, tolong ambilkan id yg bernama tombol cari
// .ready() = jika sudah siap/ada, maka tampilkan/jalankan functionnya