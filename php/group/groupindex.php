<?php
try{
  require_once("../connectBooks.php");

  $sql = "SELECT GROUP_NAME, date(GROUP_START_DATE) startdate, IFNULL(收藏數,0) `收藏數`
  FROM campinggroups a JOIN CAMPING b on a.GROUP_CAM_NO = b.CAM_NO
                       left join 
(select CAMPCO_CAMNO , count(*) `收藏數` from campcolloection group by CAMPCO_CAMNO) c on b.cam_no=c.campco_camno
order by 收藏數 desc;";
  $products = $pdo->query($sql);
  while( $groupRow = $products->fetch(PDO::FETCH_ASSOC)){
    echo $groupRow["GROUP_NAME"] . $groupRow["startdate"] . $groupRow["收藏數"];
    // echo "<br>";
    $result = array("團名"=>$groupRow["GROUP_NAME"],"開團日期"=>$groupRow["startdate"],"收藏人數"=>$groupRow["收藏數"]);
    echo json_encode($result);
  }
   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);
}
?>