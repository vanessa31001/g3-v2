<?php
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    // var_dump($data);
    // die;
    if(isset($data->REEQU_DEAL)){
        if($data->REEQU_DEAL =='unpass'){//判斷通過|未通過
            $Status = '0';               //Status    設備狀態 0是上架2是檢舉下架
            $repStatus = '2';            //repStatus 檢舉狀態 REP_OUT_STATUS 1是通過2是失敗
        }else{
            $Status = '2';
            $repStatus = '1';
        }
        if($data->REPOUP_RESON =='此設備與本網站不相關'){//判斷原因
            $RESON = '0';
        }else if($data->REPOUP_RESON =='販售違禁品'){
            $RESON = '1';
        }else{
            $RESON = '2';
        }
        
        $pdo->beginTransaction();
        $sql = "UPDATE equipment SET EQU_SWAPATATNO=:EQU_SWAPATATNO
        WHERE EQU_NO=:EQU_NO";
        $Equs = $pdo->prepare($sql);
        $Equs->bindValue(":EQU_SWAPATATNO", $Status);
        $Equs->bindValue(":EQU_NO", $data->EQU_NO);
        $Equs->execute();

        $sql1 = "UPDATE reportoutfit
        SET REP_OUT_STATUS=:REP_OUT_STATUS,REEQU_DEAL=:REEQU_DEAL,REPOUP_RESON=:REPOUP_RESON
        WHERE REP_OUT_NO=:REP_OUT_NO";
        $reportequs = $pdo->prepare($sql1);
        $reportequs->bindValue(":REP_OUT_STATUS", $repStatus);
        $reportequs->bindValue(":REEQU_DEAL", $data->REEQU_DEAL);
        $reportequs->bindValue(":REPOUP_RESON", $RESON);
        $reportequs->bindValue(":REP_OUT_NO", $data->REP_OUT_NO);
        $reportequs->execute();
        if($reportequs->execute() && $Equs->execute()){
            $pdo->commit();
        }else{
            $pdo->rollBack();
        }
    }else{
        echo '{}';
    }
    
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
