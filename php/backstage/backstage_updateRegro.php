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
            $groupStatus = '0';
        }else{
            $groupStatus = '1';
        }
        $sql1 = "UPDATE campinggroups g JOIN reportgroup r 
        ON (g.GROUP_NO = r.REGROUP_GROUP_NO ) 
        SET g.GROUP_STATUS=:GROUP_STATUS,r.REGROUP_STATUS='1',r.REGROUP_DEAL=:REGROUP_DEAL
        WHERE REGROUP_NO=:REGROUP_NO";
        $campinggroups = $pdo->prepare($sql1);
        $campinggroups->bindValue(":REGROUP_NO", $data->REGROUP_NO);
        $campinggroups->bindValue(":REGROUP_DEAL", $data->REGROUP_DEAL);
        $campinggroups->bindValue(":GROUP_STATUS", $groupStatus);
        $campinggroups->execute();
    }else{
        echo '{}';
    }
    
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
