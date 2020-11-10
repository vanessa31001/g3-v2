<?php
try{
  require_once("../connectBooks.php");

  // $sql = "select * from campinggroups";
  $sql = "SELECT a.GROUP_NO `團編號`, a.GROUP_MEMNO `會員編號`, b.MEM_NICKNAME `會員名`, a.GROUP_NAME `團名`, c.CAM_AREA  `地區`, c.CAM_COUNTY `縣市` , c.CAM_NAME  `營地`,
  a.GROUP_PEOPLE_LIMIT  `人數上限`, a.GROUP_PEOPLE_SIGNUP  `參團人數`, (a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP)  `剩餘名額`, a.GROUP_START_DATE  `開團日`,
  date(a.GROUP_DEPART_DATE)  `出發日`, date(a.GROUP_DEADLINE)  `回程日`, a.GROUP_STATUS  `團目前狀態`, a.GROUP_REASON , IFNULL(收藏數,0) `收藏數`
  FROM campinggroups a JOIN member b  on a.GROUP_MEMNO = b.MEMNO
  JOIN camping c  on a.GROUP_CAM_NO = c.CAM_NO
  left join (select CAMPCO_CAMNO , count(*) `收藏數` from campcolloection group by CAMPCO_CAMNO) d on c.cam_no=d.campco_camno              
  WHERE a.GROUP_STATUS = 0;";
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