<!-- Extends -->
<?= $this->extend('v_template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>
<center>
    <a href="/mahasiswa">Kembali</a>
    <h1>Edit Mahasiswa</h1>
    <?php
        foreach($mahasiswa as $row){
            $mahasiswa = [
                'nim' => $row['nim'],
                'nama' => $row['nama'],
                'umur' => $row['umur']
            ];
        }
    ?>
    <form action="/mahasiswa/update" method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" value="<?= $mahasiswa['nim']; ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= $mahasiswa['nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="text" name="umur" value="<?= $mahasiswa['umur']; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</center>
<?= $this->endSection(); ?>