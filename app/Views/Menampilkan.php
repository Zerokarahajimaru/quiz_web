<table>
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>aksi</th>
    </tr>
        <?php foreach($pejabat as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['nama_depan'] . $row['nama_belakang']); ?></td>
                <td><?= htmlspecialchars($row['gelar_depan'] . $row['gelar_belakang']); ?></td>
                <td><?= htmlspecialchars($row['status_pernikahan']); ?></td>
              </tr>
        <?php endforeach;?>
</table>
<a href="/">back</a>
