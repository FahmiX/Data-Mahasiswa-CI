<!-- Extends -->
<?= $this->extend('v_template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>
<center>
    <a href="/mahasiswa/create">Create</a>
    <h1>Data Mahasiswa</h1>
    <form action="/mahasiswa/search" method="post">
        <input type="text" name="keyword" placeholder="Search">
        <button type="submit" name="submit">Search</button>
    </form>
    </br>
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
                <a href="/mahasiswa/edit/<?= $row['nim']; ?>">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</center>
<?= $this->endSection(); ?>