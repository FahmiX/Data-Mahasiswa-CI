<!-- Extends -->
<?= $this->extend('v_template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>
<center>
    <a href="/mahasiswa">Kembali</a>
    <h1>Create Mahasiswa</h1>
    <form action="/mahasiswa/store" method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="text" name="umur" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</center>
<?= $this->endSection(); ?>