<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Server</h1>
        <?php
        $cookie_Name = $_POST['cookie_name'];

//         include 'login.php';
        function token($name, $cookie_name) {

            return sha1($name . $_POST['sessionID']);
        }

        function checktoken($token, $name, $cookie_namE) {
            return $token === token($name, $cookie_namE);
        }

        if (isset($_COOKIE[$cookie_Name])) {
            if (!empty($_POST['csrf_token'])) {
                if (checktoken($_POST['csrf_token'], $_POST['form_name'], $cookie_Name)) {
                    echo '<h1>Form is Succesfully Authenticated</h1>';
                    echo $_COOKIE[$cookie_Name];
                } else {
                    echo '<h1>Form is  Authentication is faild</h1>';
                }
            } else {
                echo '<h1>token is empty</h1>';
            }
        } else {
            echo 'cookie is not set';
        }
        ?>
    </body>
</html>
