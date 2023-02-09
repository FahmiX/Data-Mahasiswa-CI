<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "PPL" ?></title>
</head>

<body>
    <main>

        <table width="100%" height="920px">
            <tr>
                <th colspan="2" height="40px" bgcolor="#0275d8">
                    <h1>SELAMAT DATANG DI <?= $title ?? "Tugas web PPL" ?></h1>
                </th>
            </tr>
            <tr bgcolor="#5bc0de" height="30px">
                <td>
                    <a href="/">HOME</a>
                    <a href="/info">INFO</a>
                    <a href="/mahasiswa">MAHASISWA</a>
                </td>
            </tr>
            <tr bgcolor="#a4c6fc">
                <td colspan="2" height="700px">
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