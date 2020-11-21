<?php
session_start();
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    // var_dump($data);
    // die;

    $sql1 = "UPDATE member  
        SET MEM_BAN_DATE=:MEM_BAN_DATE,MEM_STATUS='1'
        WHERE MEMNO=:MEMNO";
        $ban = time()+(24*60*60*5);
        $bantime =date('Y-m-d',$ban);
        $members = $pdo->prepare($sql1);
        $members->bindValue(":MEMNO", $data->MEMNO);
        $members->bindValue(":MEM_BAN_DATE", $bantime);
        $members->execute();

        // echo date('Y-m-d',$bantime);
    
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
