<?
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $sql = "SELECT * FROM question ORDER by QUE_NO"; 
    $question = $pdo->prepare($sql);
    $question->execute();

    $questions = $question->fetchAll(PDO::FETCH_ASSOC);

    
    echo json_encode($questions);

}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
