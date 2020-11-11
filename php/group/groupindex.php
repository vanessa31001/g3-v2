<?php
try{
  require_once("../connectBooks.php");

  // $sql = "select * from campinggroups";
  $sql = "SELECT GROUP_NO `GROUP_NO`,GROUP_NAME, date(GROUP_START_DATE) `開團日期`, IFNULL(收藏數,0) `收藏數`, GROUP_PIC1 pic
  FROM campinggroups a JOIN CAMPING b on a.GROUP_CAM_NO = b.CAM_NO
  left join 
  (select CAMPCO_CAMNO , count(*) 收藏數 from campcolloection group by CAMPCO_CAMNO)
   c on b.cam_no=c.campco_camno
  where GROUP_STATUS = 0
  order by 收藏數 desc";
  $products = $pdo->query($sql);
  $result=[];
  while( $groupRow = $products->fetch(PDO::FETCH_ASSOC)){
    $result[] = array("GROUP_NO"=>$groupRow["GROUP_NO"],"GROUP_NAME"=>$groupRow["GROUP_NAME"],"GROUP_START_DATE"=>$groupRow["開團日期"],"likeNum"=>$groupRow["收藏數"], "GROUP_PIC1"=>$groupRow["pic"]);
  }
  echo json_encode($result);
   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);
}
?>