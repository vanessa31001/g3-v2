<?php
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $sql = "insert into manager set
    MGR_ID=:MGR_ID,MGR_USER=:MGR_USER,MGR_PSW=:MGR_PSW";
    
    $manager = $pdo->prepare($sql);
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $manager->bindValue(":MGR_ID", $data->MGR_ID);
    $manager->bindValue(":MGR_USER", $data->MGR_USER);
    $manager->bindValue(":MGR_PSW", $data->MGR_PSW);
    $manager->execute();
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
}
?>
