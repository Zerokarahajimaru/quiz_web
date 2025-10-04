<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    /* Background DPR_HD */
    body {
        background: url('Images/DPR_HD.jpg') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        padding: 20px;
    }

    /* Container untuk blur dan contrast */
    table, .login-card, #insertModal, #updateModalGaji {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 10px;
        border-radius: 8px;
    }

    table {
        width: 100%;
    }

    th, td {
        padding: 8px 12px;
        vertical-align: middle;
    }

    h2 {
        margin-top: 20px;
        margin-bottom: 10px;
        color: #000;
    }

    button {
        cursor: pointer;
    }

    /* Tabel responsive */
    .table-responsive {
        overflow-x: auto;
    }

    /* Modal styling */
    #insertModal, #updateModalGaji {
        max-width: 500px;
        z-index: 1000;
    }

</style>

<div class="table-responsive">
    <!-- Table Anggota -->
    <table class="table table-bordered table-hover">
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
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>

            <td>
                <button class="btn btn-primary btn-sm updateBtn">Update</button>
            </td>

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
</div>

<!-- Tombol Insert -->
<button id="insertBtn" class="btn btn-success mb-3">Insert</button>

<!-- Modal Insert -->
<div id="insertModal" style="display:none; position:fixed; top:20%; left:50%; transform: translateX(-50%); background:#fff; border:1px solid #ccc; padding:20px; z-index:1000;">
    <h3>Insert Pejabat</h3>
    <form id="insertForm">
        <label>Nama Depan:</label><br>
        <input type="text" name="nama_depan" class="form-control" required><br><br>

        <label>Nama Belakang:</label><br>
        <input type="text" name="nama_belakang" class="form-control" required><br><br>

        <label>Gelar Depan:</label><br>
        <input type="text" name="gelar_depan" class="form-control"><br><br>

        <label>Gelar Belakang:</label><br>
        <input type="text" name="gelar_belakang" class="form-control"><br><br>

        <label>Jabatan:</label><br>
        <input type="text" name="jabatan" class="form-control" required><br><br>

        <label>Status Pernikahan:</label><br>
        <input type="text" name="status_pernikahan" class="form-control"><br><br>

        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="button" id="closeModal" class="btn btn-secondary">Batal</button>
    </form>
</div>

<h2>Komponen Gaji</h2>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Nama Tunjangan</th>
            <th>Kategori Tunjangan</th>
            <th>Jabatan yang Berhak Menerima</th>
            <th>Nominal</th>
            <th>Waktu Tunjangan</th>
            <th>Aksi</th>
        </tr>
        <?php foreach($komponen_gaji_pejabat as $row): ?>
            <tr data-id="<?= $row['id_komponen_gaji']; ?>">
                <td><?= htmlspecialchars($row['nama_komponen']); ?></td>
                <td><?= htmlspecialchars($row['kategori']); ?></td>
                <td><?= htmlspecialchars($row['jabatan']); ?></td>
                <td><?= htmlspecialchars($row['nominal']); ?></td>
                <td><?= htmlspecialchars($row['satuan']); ?></td>
                <td>
                    <button class="btn btn-primary btn-sm updateBtnGaji">Update</button>
                    <button class="btn btn-danger btn-sm deleteBtnGaji">Delete</button>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
</div>

<div id="updateModalGaji" style="display:none; position:fixed; top:20%; left:50%; transform: translateX(-50%); background:#fff; border:1px solid #ccc; padding:20px; z-index:1000;">
    <h3>Update Komponen Gaji</h3>
    <form id="updateFormGaji">
        <input type="hidden" name="id_komponen">

        <label>Nama Komponen:</label><br>
        <input type="text" name="nama_komponen" class="form-control" required><br><br>

        <label>Kategori:</label><br>
        <input type="text" name="kategori" class="form-control" required><br><br>

        <label>Jabatan:</label><br>
        <input type="text" name="jabatan" class="form-control" required><br><br>

        <label>Nominal:</label><br>
        <input type="number" name="nominal" class="form-control" required><br><br>

        <label>Satuan:</label><br>
        <input type="text" name="satuan" class="form-control" required><br><br>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <button type="button" id="closeUpdateModalGaji" class="btn btn-secondary">Batal</button>
    </form>
</div>




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


//delete
document.querySelectorAll(".deleteBtnGaji").forEach(btn => {
    btn.addEventListener("click", function () {
        let row = this.closest("tr");
        let id = row.getAttribute("data-id");

        if (confirm("Yakin mau hapus data ini?")) {
            fetch(`/admin/komponen_gaji/delete/${id}`, {
                method: "POST",
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message || "Berhasil dihapus!");
                if (data.status === "success") {
                    row.remove(); // langsung hapus row dari tabel
                }
            })
            .catch(err => console.error(err));
        }
    });
});

// UPDATE (open modal with data)
document.querySelectorAll(".updateBtnGaji").forEach(btn => {
    btn.addEventListener("click", function() {
        let row = this.closest("tr");
        let id = row.getAttribute("data-id");
        let cells = row.querySelectorAll("td");

        let form = document.querySelector("#updateFormGaji");
        form.id_komponen.value   = id;
        form.nama_komponen.value = cells[0].textContent.trim();
        form.kategori.value      = cells[1].textContent.trim();
        form.jabatan.value       = cells[2].textContent.trim();
        form.nominal.value       = cells[3].textContent.trim();
        form.satuan.value        = cells[4].textContent.trim();

        document.getElementById("updateModalGaji").style.display = "block";
    });
});

document.getElementById("closeUpdateModalGaji").addEventListener("click", () => {
    document.getElementById("updateModalGaji").style.display = "none";
});

// SUBMIT UPDATE
document.getElementById("updateFormGaji").addEventListener("submit", function(e) {
    e.preventDefault();
    let formData = {};
    new FormData(this).forEach((value, key) => {
        formData[key] = value.trim();
    });

    fetch("/admin/komponen_gaji/update", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        },
        body: JSON.stringify(formData)
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        if (data.status === "success") {
            location.reload();
        }
    })
    .catch(err => console.error(err));
});


</script>

