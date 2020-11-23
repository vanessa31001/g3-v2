<?php
// echo $_REQUEST['tent']; //對應html name
try{
    require_once("../connectBooks.php");
    $sql = "select EQU_NO , EQU_NAME , EQU_PIC1 , MEM_NICKNAME , EQUSORT ,EQU_DESCR,EQU_PIC2,EQU_PIC3,EQU_MEMNO ,MEM_IMG 
    from equipment
    join member on  member.MEMNO=equipment.EQU_MEMNO 
    WHERE EQU_SWAPATATNO = '0'
    order by EQU_POSTDATE desc";

    $equipment = $pdo->prepare($sql);

    $equipment-> execute();
    $equipmentRows = $equipment->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($equipmentRows);
    
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>