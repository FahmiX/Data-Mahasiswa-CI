<!-- Extends -->
<?= $this->extend('v_bootstrap'); ?>

<!-- Section -->
<?= $this->section('bootstrap'); ?>
<?php
    // get username logged in
    if (session()->get('isLoggedIn') == true) {
        $session = session()->get('username');
    }
?>

<title><?= $title ?? "PPL" ?></title>
<body>
    <main>
        <table width="100%" height="920px">
            <tr>
                <th colspan="2" height="100px" bgcolor="#0275d8">
                    <center>
                        <h2>Selamat Datang <?= $session ?? "GUEST" ?></h2>
                    </center>
                </th>
            </tr>
            <tr bgcolor="#5bc0de" height="30px">
                <td>
                    <a href="/">HOME</a>
                    <a href="/info">INFO</a>
                    <a href="/mahasiswa">MAHASISWA</a>
                    <a href="/pegawai">PEGAWAI</a>
                    <?php
                        //cek login
                        if (session()->get('isLoggedIn') == true) {
                            echo "<a href='/logout' style='float:right'>LOGOUT</a>";
                        } else {
                            echo "<a href='/login' style='float:right'>LOGIN</a>";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" height="700px">
                    <center>
                        <?php
                            //check flashdata
                            if (session()->getFlashdata('success')) {
                                echo "<h3 style='color:green'>" . session()->getFlashdata('success') . "</h3>";
                            } else if (session()->getFlashdata('error')) {
                                echo "<h3 style='color:red'>" . session()->getFlashdata('error') . "</h3>";
                            }
                        ?>
                    </center>
                    <?= $this->renderSection('content') ?>
                </td>
            </tr>
            <tr bgcolor="#5cb85c">
                <td colspan="2">
                    <center>
                        <h5>CopyRight &copy; Fahmi.Inc 2023</h5>
                    </center>
                </td>
            </tr>
        </table>
    </main>
</body>

<?= $this->endSection(); ?>