
<h2>table anggota</h2>
<table>
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>aksi</th>
    </tr>
        <?php foreach($pejabat as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['gelar_depan'] . " ". $row['nama_depan'] . " ". $row['nama_belakang'] ." ". $row['gelar_belakang'] ) ; ?></td>
                <td><?= htmlspecialchars($row['jabatan']); ?></td>
                <td><?= htmlspecialchars($row['status_pernikahan']); ?></td>
              </tr>
        <?php endforeach;?>
</table>
<a href="/">back</a>




<h2>table penggajian</h2>
<table>
    <tr>
        <th>nama</th>
        <th>jabatan</th>
        <th>kategori</th>
        <th>nominal</th>
        <th>diberikan setiap</th>
    </tr>
        <?php foreach($penggajian as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['gelar_depan'] . " ". $row['nama_depan'] . " ". $row['nama_belakang'] ." ". $row['gelar_belakang'] ) ; ?></td>
                <td><?= htmlspecialchars($row['jabatan']); ?></td>
                <td><?= htmlspecialchars($row['kategori']); ?></td>
                <td><?= htmlspecialchars($row['nominal']); ?></td>
                <td><?= htmlspecialchars($row['satuan']); ?></td>
              </tr>
        <?php endforeach;?>
</table>
<a href="/">back</a>




<h2>komponen gaji</h2>
<table>
    <tr>
        <th>nama tunjangan</th>
        <th>kategori tunjangan</th>
        <th>jabatan yang berhak menerima</th>
        <th>nominal</th>
        <th>waktu tunjangan yang diterima</th>
    </tr>
        <?php foreach($komponen_gaji_pejabat as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['nama_komponen']); ?></td>
                <td><?= htmlspecialchars($row['kategori']); ?></td>
                <td><?= htmlspecialchars($row['jabatan']); ?></td>
                <td><?= htmlspecialchars($row['nominal']); ?></td>
                <td><?= htmlspecialchars($row['satuan']); ?></td>
              </tr>
        <?php endforeach;?>
</table>
<a href="/">back</a>


