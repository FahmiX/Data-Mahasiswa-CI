<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "PPL" ?></title>
</head>

<?php
    // get username logged in
    if (session()->get('isLoggedIn') == true) {
        $session = session()->get('username');
    }
?>

<body>
    <main>
        <table width="100%" height="920px">
            <tr>
                <th colspan="2" height="40px" bgcolor="#0275d8">
                    <h1>Selamat Datang <?= $session ?? "GUEST" ?></h1>
                </th>
            </tr>
            <tr bgcolor="#5bc0de" height="30px">
                <td>
                    <a href="/">HOME</a>
                    <a href="/info">INFO</a>
                    <a href="/mahasiswa">MAHASISWA</a>
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
            <tr bgcolor="#a4c6fc">
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
                        <h3>CopyRight &copy; Fahmi.Inc 2023</h3>
                    </center>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>