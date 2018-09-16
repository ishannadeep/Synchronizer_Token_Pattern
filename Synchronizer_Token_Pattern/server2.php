<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function token($name, $sessionID) {

    return sha1($name . $sessionID);
}

function checktoken($token, $name, $sessionID) {
    return $token === token($name, $sessionID);
}

session_start();

if ($_POST["token"] != "") {
    if (checktoken($_POST["token"], $_COOKIE["user"], session_id())) {
        echo '<h1>Succeefuly authenticated</h1>';
    } else {
        echo '</h1>Failed to authenticate</h1>';
    }
}
?>