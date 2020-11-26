<?php
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    // var_dump($data);
    // die;
    if(isset($data->REGROUP_DEAL)){
        $sql = "UPDATE group_mes
        SET GROUP_MES_STATUS=:GROUP_MES_STATUS
        WHERE REGROUP_MES_NO=:REGROUP_MES_NO";
        $group_mes = $pdo->prepare($sql);
        $group_mes->bindValue(":GROUP_MES_STATUS", $data->REGROUP_DEAL);
        $group_mes->bindValue(":REGROUP_MES_NO", $data->REGROUP_MES_NO);
        $group_mes->execute();

        $sql1 = "UPDATE reportgroup_mes
        SET REGROUP_MES_STATUS='1',REGROUP_DEAL=:REGROUP_DEAL
        WHERE REGROUP_MES_NO=:REGROUP_MES_NO";
        $group_mes = $pdo->prepare($sql1);
        $group_mes->bindValue(":REGROUP_MES_NO", $data->REGROUP_MES_NO);
        $group_mes->bindValue(":REGROUP_DEAL", $data->REGROUP_DEAL);
        $group_mes->bindValue(":GROUP_MES_STATUS", $data->REGROUP_DEAL);
        $group_mes->execute();
    }else{
        echo '{}';
    }
    
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
