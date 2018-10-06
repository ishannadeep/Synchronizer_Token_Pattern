<!DOCTYPE html>
<?php

function token($value, $sessionID) {

    return sha1($value . $sessionID);
}

function checktoken($token, $name, $sessionID) {
    return $token === token($name, $sessionID);
}

function onc() {
    if ($_POST['userName'] == "ishan" && $_POST['password'] == "ishan123") {
        echo 'session start';
        session_start();
        $sessionID = session_id();
        $cookie_name = "user";
        setcookie($cookie_name, $sessionID, 0, "/");
        $Token = token($sessionID, $sessionID);
        $_SESSION["token"] = $Token;
        header("Location: form.html"); /* Redirect browser */
    } else {
        echo '<script>alert("User name & Password Incorrect");</script>';
        header("Location: login.html"); /* Redirect browser */
    }
}

if (isset($_COOKIE["user"])) {
    echo 'session start' + $_COOKIE["user"];
    session_start();
    $sessionID = session_id();
    $value = $_COOKIE["user"];
    $Token = token($value, $sessionID);
    $_SESSION["token"] = $Token;
    header("Location: form.html"); /* Redirect browser */
} else {
    onc();
}
?>


