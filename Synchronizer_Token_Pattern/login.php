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
        <h1>Login Authentication</h1>
        <?php
        if ($_POST['userName'] == "ishan" && $_POST['password'] == "ishan123") {
            $Name = $_POST['userName'];
            echo 'session start';
            session_start();
            $sessionID = session_id();
            $cookie_name = "admin";
            $cookie_value = $Name;
            $cookie = setcookie($cookie_name, $cookie_value, time() + (86400 ), "/"); // 86400 = 1 day

            if (isset($_COOKIE[$cookie_name])) {
                echo 'cookie is set';
                echo $_COOKIE[$cookie_name];

                function token($name, $cookie_name) {
                    if (!session_id()) {
                        session_start();
                    }
                    $sessionID = session_id();
                    return sha1($name . $sessionID);
                }

                echo '<form action="server.php" method="POST">';
                echo '<div><label>name</label><br><input type="text" name="name"> </div>';
                echo '<div><label>phone number</label><br><input type="text" name="phonenum"> </div>';
                echo '<div><label>address</label><br><input type="text" name="address"> </div>';
                echo '<div><br><input type="hidden" value=';
                echo token($Name, $cookie);
                echo ' name="csrf_token"> </div>';
                echo '<div><br><input type="hidden" value=';
                echo $Name;
                echo ' name="form_name"> </div>';
                echo '<div><br><input type="hidden" value=';
                echo $cookie_name;
                echo ' name="cookie_name"> </div>';
                echo '<div><br><input type="submit" > </div>';
                echo '<div><br><input type="hidden" value=';
                echo $sessionID;
                echo ' name="sessionID"> </div>';
                echo '</form>';
            } else {
                echo 'cookie is not set';
            }
        } else {
            echo '<script>alert("User name & Password Incorrect");</script>';
        }
        ?>
    </body>
</html>

