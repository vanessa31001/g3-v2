<?php
try{
    require_once("../connectBooks.php");
    $sql = "select EQU_NAME , EQU_PIC1 , MEM_NICKNAME from equipment
            join member on  member.MEMNO=equipment.EQU_MEMNO";
    $equipment = $pdo->query($sql);
    $equipmentRows = $equipment->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($equipmentRows);
    

    
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>