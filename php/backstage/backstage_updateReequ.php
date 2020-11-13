<?php
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    // var_dump($data);
    // die;
    if(isset($data->REEQU_DEAL)){
        if($data->REEQU_DEAL =='unpass'){
            $groupStatus = '0';
        }else{
            $groupStatus = '1';
        }
        $sql1 = "UPDATE equipment e JOIN reportoutfit r 
        ON (e.EQU_NO = r.REP_OUT_NO ) 
        SET e.EQU_SWAPATATNO=:EQU_SWAPATATNO,r.REP_OUT_STATUS='1',r.REEQU_DEAL=:REEQU_DEAL
        WHERE REP_OUT_NO=:REP_OUT_NO";
        $reportequs = $pdo->prepare($sql1);
        $reportequs->bindValue(":REP_OUT_NO", $data->REP_OUT_NO);
        $reportequs->bindValue(":REEQU_DEAL", $data->REEQU_DEAL);
        $reportequs->bindValue(":EQU_SWAPATATNO", $groupStatus);
        $reportequs->execute();
    }else{
        echo '{}';
    }
    
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
