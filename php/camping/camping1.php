<?php
session_start();
try{
    require_once("../connectBooks.php");
    // $sql = "SELECT CAM_NO, CAM_NAME,CAM_INTRODUCTION,CAM_PIC1,CAM_ADDRESS,CAM_FACILITY, IFNULL(收藏數,0) 收藏數
    // From CAMPING b 
    // left join 
    // (select CAMPCO_CAMNO , count(*) 收藏數 from campcolloection 
    // group by CAMPCO_CAMNO) c on b.cam_no=c.campco_camno
    // join  member m ON (m.MEMNO=c.CAMPCO_MEMNO)
    // WHERE m.MEMNO=$_SESSION["MEMNO"]
    // order by 收藏數 desc
    // limit 5;"; 
    $sql = "SELECT CAM_NO, CAM_NAME,CAM_INTRODUCTION,CAM_PIC1,CAM_ADDRESS,CAM_FACILITY, IFNULL(收藏數,0) 收藏數
    From CAMPING b 
    left join 
    (select CAMPCO_CAMNO , count(*) 收藏數 from campcolloection 
    group by CAMPCO_CAMNO)
        c on b.cam_no=c.campco_camno
    order by 收藏數 desc
    limit 5;"; 

    $camping = $pdo->query($sql);
    $allcamping=[];
    while($campingRow = $camping->fetch(PDO::FETCH_ASSOC)){
        $allcamping[] = array("CAM_NO"=>$campingRow["CAM_NO"],"CAM_NAME"=>$campingRow["CAM_NAME"],"CAM_INTRODUCTION"=>$campingRow["CAM_INTRODUCTION"],"CAM_PIC1"=>$campingRow["CAM_PIC1"],"CAM_ADDRESS"=>$campingRow["CAM_ADDRESS"],"CAM_FACILITY"=>$campingRow["CAM_FACILITY"],"收藏數"=>$campingRow["收藏數"]);
        
    }
    
    echo json_encode($allcamping);


}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
