<?php
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $sql = "SELECT re.REP_OUT_NO, eq.EQU_NAME, m.MEM_NAME, re.REPOUP_RESON, re.REP_OUT_STATUS ,eq.EQU_SWAPATATNO,re.REEQU_DEAL,eq.EQU_NO
    FROM reportoutfit re 
    JOIN equipment eq ON (eq.EQU_NO = re.REP_OUT_EQUNO)
    JOIN member m ON (eq.EQU_MEMNO = m.MEMNO)"; 
    $reportequ = $pdo->prepare($sql);
    $reportequ->execute();

    $reportequs = $reportequ->fetchAll(PDO::FETCH_ASSOC);

    $arr=[];

    foreach($reportequs as $key => $val){
        if($val['REPOUP_RESON']==0){
            $val['REPOUP_RESON']='此設備與本網站不相關';
        }elseif($val['REPOUP_RESON']==1){
            $val['REPOUP_RESON']='此設備為危險物品';
        }elseif($val['REPOUP_RESON']==2){
            $val['REPOUP_RESON']='此設備為不雅物品';
        }

        if($val['EQU_SWAPATATNO']==0){
            $val['EQU_SWAPATATNO']='上架中';
        }else{
            $val['EQU_SWAPATATNO']='已下架';
        }
        if($val['REP_OUT_STATUS']==0){
            $val['REP_OUT_STATUS']='未處理';
        }else{
            $val['REP_OUT_STATUS']='已處理';
        }
        
        array_push($arr,$val);
    }
    echo json_encode($arr);
    
    // echo json_encode($reportequs);

}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
