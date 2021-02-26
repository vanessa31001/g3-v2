<?php
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    // var_dump($data);
    // die;
    if(isset($data->REGROUP_DEAL)){
        if($data->REGROUP_DEAL =='unpass'){
            $Status = '0';
            $repStatus = '2';
        }else{
            $Status = '1';
            $repStatus = '1';
        }
        
        if($data->REGROUP_RESON =='此留言與露營不相關'){//判斷原因 
            $RESON = '0';
        }else if($data->REGROUP_RESON =='此留言為不當發言'){
            $RESON = '1';
        }else{
            $RESON = '2';
        }
        $pdo->beginTransaction();
        $sql = "UPDATE group_mes set group_mes_status = :mes_status where group_mes_no = :GROUP_MES_NO";
        $Gmsg = $pdo->prepare($sql);
        $Gmsg->bindValue(":mes_status",(int)$Status);
        $Gmsg->bindValue(":GROUP_MES_NO",(int)$data->REGROUP_MES_NO);
        $Gmsg->execute();

        $sql1 ="UPDATE reportgroup_mes
        SET REGROUP_MES_STATUS=:REGROUP_MES_STATUS,REGROUP_DEAL=:REGROUP_DEAL,REGROUP_RESON=:REGROUP_RESON
        WHERE REGROUP_MES_NO=:REGROUP_MES_NO";

        $reportmsg = $pdo->prepare($sql1);
        $reportmsg->bindValue(":REGROUP_MES_STATUS", $repStatus);
        $reportmsg->bindValue(":REGROUP_DEAL", $data->REGROUP_DEAL);
        $reportmsg->bindValue(":REGROUP_RESON", $RESON);
        $reportmsg->bindValue(":REGROUP_MES_NO", $data->REGROUP_MES_NO);
        $reportmsg->execute();
        if($Gmsg->execute() && $reportmsg->execute()){
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
