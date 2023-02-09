<!-- Extends -->
<?= $this->extend('v_template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>
<center>
    <h1>Data Mahasiswa</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Aksi</th>
        </tr>
        <?php foreach($mahasiswa as $row): ?>
        <tr>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['umur']; ?></td>
            <td>
                <a href="/mahasiswa/delete/<?= $row['nim']; ?>">Delete</a>
                <a href="/mahasiswa/detail/<?= $row['nim']; ?>">Detail</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</center>
<?= $this->endSection(); ?>