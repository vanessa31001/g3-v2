<?
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $sql = "SELECT re.REGROUP_MES_NO, m.MEM_NAME, gm.GROUP_MES_CONTENT, re.REGROUP_RESON, re.REGROUP_MES_status,gm.GROUP_MES_STATUS
    FROM reportgroup_mes re 
    JOIN member m ON (re.REGROUP_MES_MEMNO = m.MEMNO) 
    JOIN group_mes gm ON (gm.GROUP_MES_NO = re.REGROUP_MES_NO)"; 
    $reportmsg = $pdo->prepare($sql);
    $reportmsg->execute();

    $reportmsgs = $reportmsg->fetchAll(PDO::FETCH_ASSOC);

    $arr=[];

    foreach($reportmsgs as $key => $val){
        if($val['REGROUP_RESON']==1){
            $val['REGROUP_RESON']='此留言與露營不相關';
        }elseif($val['REGROUP_RESON']==2){
            $val['REGROUP_RESON']='此留言含有色情內容';
        }elseif($val['REGROUP_RESON']==3){
            $val['REGROUP_RESON']='此留言含違法內容';
        }
        if($val['GROUP_MES_STATUS']==0){
            $val['GROUP_MES_STATUS']='上架中';
        }else{
            $val['GROUP_MES_STATUS']='已下架';
        }
        
        array_push($arr,$val);
    }
    echo json_encode($arr);

    
    // echo json_encode($reportmsgs);

}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
