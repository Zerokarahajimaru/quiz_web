<table>
    <tr>
        <th>delete</th>
        <!-- <th>update</th> -->
        <th>id anggota</th>
        <th>nama_depan</th>
        <th>nama_belakang</th>
        <th>gelar_depan</th>
        <th>gelar_belakang</th>
        <th>jabatan</th>
        <th>status status_pernikahan</th>
    </tr>
        <?php foreach($pejabat as $row): ?>
                     <tr>
                <td>
                    <form class="deleteForm" data-id="<?= $row['id_anggota'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>





                <td><?= htmlspecialchars($row['id_anggota']); ?></td>
                <td><?= htmlspecialchars($row['nama_depan']); ?></td>
                <td><?= htmlspecialchars($row['nama_belakang']); ?></td>
                <td><?= htmlspecialchars($row['gelar_depan']); ?></td>
                <td><?= htmlspecialchars($row['gelar_belakang']); ?></td>
                <td><?= htmlspecialchars($row['jabatan']); ?></td>
                <td><?= htmlspecialchars($row['status_pernikahan']); ?></td>       
        </tr>
        <?php endforeach;?>

</table>
<a href="/">back</a>




<script>
document.querySelectorAll(".deleteForm").forEach(form => {
    form.addEventListener("submit", function(e) {
        e.preventDefault(); // cegah refresh

        var id = this.getAttribute("data-id");

        if(confirm("Yakin mau hapus data ini?")) {
            fetch(`/admin/anggota/delete/${id}`, {
                method: "POST", // atau DELETE kalau pakai spoofing
                headers: {

                    "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message || "Berhasil dihapus!");
                // contoh: hapus baris dari tabel langsung
                this.closest("tr").remove();
            })
            .catch(err => console.error(err));
        }
    });
});
</script>

