<table>
<tr>
    <th>delete</th>
    <th>update</th>
    <th>id anggota</th>
    <th>nama_depan</th>
    <th>nama_belakang</th>
    <th>gelar_depan</th>
    <th>gelar_belakang</th>
    <th>jabatan</th>
    <th>status_pernikahan</th>
</tr>

<?php foreach($pejabat as $row): ?>
<tr data-id="<?= $row['id_anggota'] ?>"> 
    <td>
        <form class="deleteForm" data-id="<?= $row['id_anggota'] ?>">
            <button type="submit">Delete</button>
        </form>
    </td>

    <td>
        <button class="updateBtn">Update</button>
    </td>

    <!-- id_anggota tampil tapi gak bisa diedit -->
    <td><?= htmlspecialchars($row['id_anggota']); ?></td>  

    <td contenteditable="true" class="editable" data-field="nama_depan"><?= htmlspecialchars($row['nama_depan']); ?></td>
    <td contenteditable="true" class="editable" data-field="nama_belakang"><?= htmlspecialchars($row['nama_belakang']); ?></td>
    <td contenteditable="true" class="editable" data-field="gelar_depan"><?= htmlspecialchars($row['gelar_depan']); ?></td>
    <td contenteditable="true" class="editable" data-field="gelar_belakang"><?= htmlspecialchars($row['gelar_belakang']); ?></td>
    <td contenteditable="true" class="editable" data-field="jabatan"><?= htmlspecialchars($row['jabatan']); ?></td>
    <td contenteditable="true" class="editable" data-field="status_pernikahan"><?= htmlspecialchars($row['status_pernikahan']); ?></td>
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




document.querySelectorAll(".updateBtn").forEach(btn => {
    btn.addEventListener("click", function() {
        let row = this.closest("tr");
        let id = row.dataset.id; // ambil id dari tr

        let payload = { id_anggota: id }; // id tetap dikirim
        row.querySelectorAll(".editable").forEach(td => {
            payload[td.dataset.field] = td.innerText.trim();
        });

        fetch(`/admin/anggota/update`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            },
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(data => {
            alert(data.message || "Update berhasil!");
        })
        .catch(err => console.error(err));
    });
});




</script>

