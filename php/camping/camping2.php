<?
try{
    require_once("../connectBooks.php");
    $sql = "select CAM_NAME from `camping`";
    $camping = $pdo->query($sql);
    print_r($camping);
    // $camping->bindValue(":CAM_NAME", $_POST['CAM_NAME']);
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>