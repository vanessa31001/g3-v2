<?php
// echo $_REQUEST['tent']; //對應html name
try{
    require_once("../connectBooks.php");
    $sql = "select EQU_NAME , EQU_PIC1 , MEM_NICKNAME , EQU_EQUSORT_NO from equipment
            join member on  member.MEMNO=equipment.EQU_MEMNO";

    // if($_REQUEST['tent']){
        // $sql.=' where EQU_EQUSORT_NO = :tent';
    // }

    $equipment = $pdo->prepare($sql);

    // if($_REQUEST['tent']){
    // $equipment-> bindValue(':tent',$_REQUEST['tent']);
    // }

    $equipment-> execute();
    $equipmentRows = $equipment->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($equipmentRows);
    
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
// header("location:./../../equipment.html");
?>