<!-- Extends -->
<?= $this->extend('v_template'); ?>

<!-- Section -->
<?= $this->section('content'); ?>
    <center>
        <h1>Halaman Login</h1>
        <form action="/login" method="post">
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username" placeholder="Username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" value="Login"></td>
                </tr>
            </table>
        </form>
    </center>
<?= $this->endSection(); ?>