<center>
</br>
</br>
</br>
</br>
</br>
    <?php
        //check flashdata
        if (session()->getFlashdata('success')) {
            echo "<h3 style='color:green'>" . session()->getFlashdata('success') . "</h3>";
        } else if (session()->getFlashdata('error')) {
            echo "<h3 style='color:red'>" . session()->getFlashdata('error') . "</h3>";
        }
    ?>
    <h1>Login</h1>
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