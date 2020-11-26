<?php
    $dsn = "mysql:localhost;port=3306;dbname=ed103g3;charset=utf8";
    $user = "root";
    $password = "si832gn11d";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password ,$options);
?>