<?php

function token($name, $sessionID) {
    return sha1($name . $sessionID);
}

function checktoken($token, $value, $sessionID) {
    return $token === token($value, $sessionID);
}

session_start();
if ($_POST["token"] != "") {
    if (checktoken($_POST["token"], $_COOKIE["user"], session_id())) {
        echo '<h1>Succeefuly authenticated</h1>';
    } else {
        echo '</h1>Failed to authenticate</h1>';
    }
} else {
    echo '</h1>No Token to authenticate</h1>';
}
?>