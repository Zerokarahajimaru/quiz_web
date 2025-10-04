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



<!-- Tombol Insert -->
<button id="insertBtn">Insert</button>

<!-- Popup Modal Insert -->
<div id="insertModal" style="display:none; position:fixed; top:20%; left:30%; background:#fff; border:1px solid #ccc; padding:20px; z-index:1000;">
    <h3>Insert Pejabat</h3>
    <form id="insertForm">
        <label>Nama Depan:</label><br>
        <input type="text" name="nama_depan" required><br><br>

        <label>Nama Belakang:</label><br>
        <input type="text" name="nama_belakang" required><br><br>

        <label>Gelar Depan:</label><br>
        <input type="text" name="gelar_depan"><br><br>

        <label>Gelar Belakang:</label><br>
        <input type="text" name="gelar_belakang"><br><br>

        <label>Jabatan:</label><br>
        <input type="text" name="jabatan" required><br><br>

        <label>Status Pernikahan:</label><br>
        <input type="text" name="status_pernikahan"><br><br>

        <button type="submit">Simpan</button>
        <button type="button" id="closeModal">Batal</button>
    </form>
</div>

















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


//untuk inser pejabat

document.getElementById("insertBtn").addEventListener("click", () => {
    document.getElementById("insertModal").style.display = "block";
});

document.getElementById("closeModal").addEventListener("click", () => {
    document.getElementById("insertModal").style.display = "none";
});

document.getElementById("insertForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let formData = {};
    new FormData(this).forEach((value, key) => {
        formData[key] = value.trim();
    });

    fetch(`/admin/anggota/insert`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        },
        body: JSON.stringify(formData)
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message || "Insert berhasil!");
        if (data.status === "success") {
            location.reload(); // reload biar tabel update
        }
    })
    .catch(err => console.error(err));
});



</script>

