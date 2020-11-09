<?
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $sql = "SELECT * FROM member "; 
    $member = $pdo->prepare($sql);
    $member->execute();

    $members = $member->fetchAll(PDO::FETCH_ASSOC);

    
    echo json_encode($members);

}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>