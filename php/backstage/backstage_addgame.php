<?
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $sql = "insert into question set
    QUE_TITLE=:QUE_TITLE,QUE_OPT1=:QUE_OPT1,QUE_OPT2=:QUE_OPT2,QUE_OPT3=:QUE_OPT3,QUE_ANS=:QUE_ANS";
    
    $question = $pdo->prepare($sql);
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $question->bindValue(":QUE_TITLE", $data->QUE_TITLE);
    $question->bindValue(":QUE_OPT1", $data->QUE_OPT1);
    $question->bindValue(":QUE_OPT2", $data->QUE_OPT2);
    $question->bindValue(":QUE_OPT3", $data->QUE_OPT3);
    $question->bindValue(":QUE_ANS", $data->QUE_ANS);
    $question->execute();
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
}
?>
