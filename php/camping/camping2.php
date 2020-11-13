<?php
try{
    require_once("../connectBooks.php");
    $sql = "SELECT * 
    FROM camping 
    where CAM_NO = :CAM_NO"; 

    $camping = $pdo->prepare($sql);
    $camping->bindValue(":CAM_NO", $_GET["cam_no"]);
    $camping->execute();
    $campingRow = $camping->fetch(PDO::FETCH_ASSOC);

    echo json_encode($campingRow);

}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>