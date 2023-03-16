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
    <div class="table-responsive container">
        <table class="table table-primary table-bordered table-striped table-hover align-middle">
            <thead class="table-dark align-middle">
                <th class="text-center">NIM</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Umur</th>
                <th class="text-center">Aksi</th>
            </thead>
            <tbody>
                <tr>
                    <?php foreach($mahasiswa as $row): ?>
                    <td class="text-center"><?= $row['nim']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td class="text-center"><?= $row['umur']; ?></td>
                    <td class="text-center">
                        <a href="/mahasiswa/detail/<?= $row['nim']; ?>" class="btn btn-primary">Detail</a>
                        <a href="/mahasiswa/edit/<?= $row['nim']; ?>" class="btn btn-warning">Edit</a>
                        <a href="/mahasiswa/delete/<?= $row['nim']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</center>
<?= $this->endSection(); ?>