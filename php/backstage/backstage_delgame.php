<?
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    // var_dump($data);
    // die;
    $sql = "DELETE FROM `question` WHERE QUE_NO =:QUE_NO";
    $question = $pdo->prepare($sql);
    $question->bindValue(":QUE_NO", $data->QUE_NO);
    // $manager->bindValue(":MGR_ID", "bbb");
    $question->execute();
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
}
?>
