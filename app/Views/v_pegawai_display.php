<!-- Extends -->
<?= $this->extend('v_template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>
<center>
    <a href="/pegawai/create">Create</a>
    <h1>Data Pegawai</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Pendidikan</th>
        </tr>
        <?php foreach($pegawai as $row): ?>
            <tr>
                <td><?= $row['nim']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['gender']; ?></td>
                <td><?= $row['telp']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['pendidikan']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</center>
<?= $this->endSection(); ?>