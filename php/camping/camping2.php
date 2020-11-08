<?
try{
    require_once("../connectBooks.php");
    $sql = "select * from member";
    $members = $pdo->query($sql);
    $mem = $members->fetch(PDO::FETCH_ASSOC);
    print_r($mem);
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>