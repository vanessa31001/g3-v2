<?
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    var_dump($data);
    die;
    $sql = "DELETE FROM `manager` WHERE MGR_ID =:MGR_ID";
    $manager = $pdo->prepare($sql);
    $manager->bindValue(":MGR_ID", $data->MGR_ID);
    // $manager->bindValue(":MGR_ID", "bbb");
    $manager->execute();
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
}
?>
