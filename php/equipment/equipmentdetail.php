<?php
// echo $_REQUEST['tent']; //對應html name
try{
    $json =  file_get_contents("php://input");
    $data = json_decode($json);
    require_once("../connectBooks.php");
    $pdo->beginTransaction();
    $sql = "select EQU_NO , EQU_NAME , EQU_PIC1 , MEM_NICKNAME , EQUSORT ,EQU_DESCR,EQU_PIC2,EQU_PIC3,EQU_MEMNO ,MEM_IMG from equipment
            join member on  member.MEMNO=equipment.EQU_MEMNO where EQU_NO=:EQU_NO";

    $equipment = $pdo->prepare($sql);
    $equipment-> bindValue(":EQU_NO", $data->EQU_NO);

    $equipment-> execute();
    $equipmentRows = $equipment->fetch(PDO::FETCH_ASSOC);
    echo json_encode($equipmentRows);
    $pdo->commit();
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>