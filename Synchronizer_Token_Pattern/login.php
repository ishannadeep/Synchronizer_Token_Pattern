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
        if($_POST['userName']=="ishan" && $_POST['password']=="ishan123")
        {
            session_start();
            $sessionID= session_id();
            echo '<form action="server.php" method="POST">';
            echo '<div><label>name</label><br><input type="text" name="name"> </div>';
            
        }
        ?>
    </body>
</html>

