<?
try{
    require_once("../connectBooks.php");
    $sql = "SELECT CAM_NO, CAM_NAME, IFNULL(收藏數,0) `收藏數`
    From CAMPING b 
    left join 
    (select CAMPCO_CAMNO , count(*) `收藏數` from campcolloection group by CAMPCO_CAMNO)
        c on b.cam_no=c.campco_camno
    order by 收藏數 desc
    limit 5"; 

    $camping = $pdo->query($sql);
    $allcamping=[];
    while($campingRow = $camping->fetch(PDO::FETCH_ASSOC)){
        $allcamping[] = array("like"=>$campingRow["收藏數"]);
    }
    
    echo json_encode($allcamping);

}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>