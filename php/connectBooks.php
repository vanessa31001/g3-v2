<?
    $dsn = "mysql:host=localhost;port=3306;dbname=ed103g3;charset=utf8";
    $user = "root";
    $password = "放自己的密碼，謝謝";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password ,$options);
?>