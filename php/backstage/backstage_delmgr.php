<?
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    var_dump($data);
    die;
    $sql = "DELETE FROM `manager` WHERE MGR_NO =:MGR_NO";
    $manager = $pdo->prepare($sql);
    $manager->bindValue(":MGR_NO", $data);
    $manager->execute();
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
}
?>
