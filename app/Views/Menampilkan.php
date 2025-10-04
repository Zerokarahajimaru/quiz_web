<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard DPR_PRO</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
       background-image: url('<?= base_url('images/DPR_HD.jpg') ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        .table-container {
            background-color: rgba(255,255,255,0.95);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        h2 {
            margin-bottom: 15px;
        }

        a.back-btn {
            margin-top: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container py-5">

        <!-- Table Anggota -->
        <div class="table-container">
            <h2>Table Anggota</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Status Pernikahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pejabat as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['gelar_depan'] . " ". $row['nama_depan'] . " ". $row['nama_belakang'] ." ". $row['gelar_belakang']); ?></td>
                                <td><?= htmlspecialchars($row['jabatan']); ?></td>
                                <td><?= htmlspecialchars($row['status_pernikahan']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="/" class="back-btn btn btn-secondary">Back</a>
        </div>

        <!-- Table Penggajian -->
        <div class="table-container">
            <h2>Table Penggajian</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Kategori</th>
                            <th>Nominal</th>
                            <th>Diberikan Setiap</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($penggajian as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['gelar_depan'] . " ". $row['nama_depan'] . " ". $row['nama_belakang'] ." ". $row['gelar_belakang']); ?></td>
                                <td><?= htmlspecialchars($row['jabatan']); ?></td>
                                <td><?= htmlspecialchars($row['kategori']); ?></td>
                                <td><?= htmlspecialchars($row['nominal']); ?></td>
                                <td><?= htmlspecialchars($row['satuan']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="/" class="back-btn btn btn-secondary">Back</a>
        </div>

        <!-- Table Komponen Gaji -->
        <div class="table-container">
            <h2>Komponen Gaji</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Tunjangan</th>
                            <th>Kategori Tunjangan</th>
                            <th>Jabatan yang Berhak Menerima</th>
                            <th>Nominal</th>
                            <th>Waktu Tunjangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($komponen_gaji_pejabat as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['nama_komponen']); ?></td>
                                <td><?= htmlspecialchars($row['kategori']); ?></td>
                                <td><?= htmlspecialchars($row['jabatan']); ?></td>
                                <td><?= htmlspecialchars($row['nominal']); ?></td>
                                <td><?= htmlspecialchars($row['satuan']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="/" class="back-btn btn btn-secondary">Back</a>
        </div>

    </div>

    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
