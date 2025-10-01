<?php

namespace App\Controllers;

class Get_ujian extends BaseController
{
    public function home_page()
    {
        
        return view('Home_page');
    }
}
/*
    $data['kurir'] = $kurirModel
        ->select('kurir.id_kurir, kurir.nama, harga.barang, harga.harga')
        ->join('harga', 'harga.id_harga = kurir.id_harga')
        ->findAll();

    return view('kurir_view', $data);
*/



/*

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Saat tombol dengan class .deleteBtn diklik
$(document).on('click', '.deleteBtn', function() {
    let id = $(this).data('id'); // ambil data-id dari tombol
    let confirmDelete = confirm("Yakin ingin menghapus data ini?"); 

    if (confirmDelete) {
        // Kirim request AJAX ke controller
        $.ajax({
            url: "/kurir/delete/" + id,  // endpoint di controller
            type: "POST",                // method POST (lebih aman daripada GET)
            data: { id_kurir: id },      // data yang dikirim
            dataType: "json",            // tipe respon dari server
            success: function(response) {
                if (response.success) {
                    // hapus baris dari tabel tanpa reload halaman
                    $("#row-" + id).remove();
                    alert("Data berhasil dihapus!");
                } else {
                    alert("Gagal menghapus data!");
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert("Terjadi error: " + error);
            }
        });
    }
});
</script>

*/

?>