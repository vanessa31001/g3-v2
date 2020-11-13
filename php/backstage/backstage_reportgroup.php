<?php
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $sql = "SELECT re.REGROUP_NO, c.GROUP_NO, c.GROUP_NAME, m.MEM_NAME, re.REGROUP_RESON, c.GROUP_STATUS, re.REGROUP_STATUS, re.REGROUP_DEAL
    FROM reportgroup re JOIN member m ON (re.REGROUP_MEMNO = m.MEMNO)
                        JOIN campinggroups c ON (c.GROUP_NO = re.REGROUP_GROUP_NO)"; 
    $reportgroup = $pdo->prepare($sql);
    $reportgroup->execute();

    $reportgroups = $reportgroup->fetchAll(PDO::FETCH_ASSOC);

    $arr=[];

    foreach($reportgroups as $key => $val){
        if($val['REGROUP_RESON']==1){
            $val['REGROUP_RESON']='此揪團與露營不相關';
        }elseif($val['REGROUP_RESON']==2){
            $val['REGROUP_RESON']='此揪團含有色情內容';
        }elseif($val['REGROUP_RESON']==3){
            $val['REGROUP_RESON']='此揪團含違法內容';
        }
        if($val['GROUP_STATUS']==0){
            $val['GROUP_STATUS']='上架中';
        }else{
            $val['GROUP_STATUS']='已下架';
        }
        if($val['REGROUP_STATUS']==0){
            $val['REGROUP_STATUS']='未處理';
        }else{
            $val['REGROUP_STATUS']='已處理';
        }
        
        
        array_push($arr,$val);
    }
    echo json_encode($arr);
    
    // echo json_encode($reportgroups);

}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
