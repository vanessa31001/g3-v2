<?php
    $dsn = "mysql:host=localhost;port=3306;dbname=ed103_g3;charset=utf8";
    $user = "root";
    $password = "K98c3A46";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password ,$options);
?>