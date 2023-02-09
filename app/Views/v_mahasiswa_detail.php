<!-- Extends -->
<?= $this->extend('v_template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>
<center>
    <a href="/mahasiswa">Kembali</a>
    <h1>Detail Mahasiswa</h1>
        <?php foreach($mahasiswa as $row): ?>
            <h3>NIM</h3>
            <table border="1" cellpadding="5" cellspacing="0" width="12%">
                <td><?= $row['nim']; ?></td>
            </table>
            <h3>Nama</h3>
            <table border="1" cellpadding="5" cellspacing="0" width="12%">
                <td><?= $row['nama']; ?></td>
            </table>
            <h3>Umur</h3>
            <table border="1" cellpadding="5" cellspacing="0" width="12%">
                <td><?= $row['umur']; ?></td>
            </table>
        <?php endforeach; ?>
</center>
<?= $this->endSection(); ?>