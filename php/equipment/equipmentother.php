<?php
// echo $_REQUEST['tent']; //對應html name
try{
    require_once("../connectBooks.php");
    $sql = "select MAX(EQU_NO) from equipment";

    $equipment = $pdo->query($sql);
    $result = $equipment->fetchAll(PDO::FETCH_ASSOC);
    // print_r($result[0]['MAX(EQU_NO)']);
    // $maxnumber = 0;
    $other =range(1,$result[0]['MAX(EQU_NO)']);
    shuffle($other);
    for($i=0;$i<3;$i++){
    
    $oterequsss[$i] = $other[$i];
    }
    // for($i=1;$i<){

    // }

    // $equipment-> execute();
    // $equipmentRows = $equipment->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($oterequsss);
    
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員";
}
?>