<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

function token($name, $sessionID) {

    return sha1($name . $sessionID);
}

function checktoken($token, $name, $sessionID) {
    return $token === token($name, $sessionID);
}

if (isset($_COOKIE["user"])) {
    echo 'session start' + $_COOKIE["user"];
    session_start();
    $sessionID = session_id();
    $Name = $_COOKIE["user"];
    $Token = token($Name, $sessionID);
    $_SESSION["token"] = $Token;
    header("Location: form.html"); /* Redirect browser */
} else {

    function onc() {
        if ($_POST['userName'] == "ishan" && $_POST['password'] == "ishan123") {
            $Name = $_POST['userName'];
            echo 'session start';
            session_start();
            $sessionID = session_id();
            $cookie_name = "user";
            $cookie_value = $Name;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

            $Token = token($Name, $sessionID);
            $_SESSION["token"] = $Token;
            header("Location: form.html"); /* Redirect browser */
        } else {
            echo '<script>alert("User name & Password Incorrect");</script>';
            header("Location: index.html"); /* Redirect browser */
        }
    }

}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <form action="http://localhost:8080/Synchronizer_Token_Pattern/Synchronizer_Token_Pattern/login.php" method="post" onsubmit="<?php onc() ?>">
                <label>user name</label>
                <input type="text" name="userName" style="width: 100px;"><br>
                <label>Password</label>
                <input type="password" name="password" style="width: 100px;"><br>
                <input type="submit" value="go" >

            </form><br>

        </div>
    </body>
</html>

