<?php
try{
  require_once("../connectBooks.php");

  $sql = "SELECT a.GROUP_NO `團編號`, a.GROUP_MEMNO `會員編號`, b.MEM_NICKNAME `會員名`, a.GROUP_NAME `團名`, c.CAM_AREA  `地區`, c.CAM_COUNTY `縣市` , c.CAM_NAME  `營地`,
  a.GROUP_PEOPLE_LIMIT  `人數上限`, a.GROUP_PEOPLE_SIGNUP  `參團人數`, (a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP)  `剩餘名額`, a.GROUP_START_DATE  `開團日`,
  date(a.GROUP_DEPART_DATE)  `出發日`, date(a.GROUP_DEADLINE)  `回程日`, a.GROUP_STATUS  `團目前狀態`, a.GROUP_REASON , IFNULL(收藏數,0) `收藏數`
  FROM campinggroups a JOIN member b  on a.GROUP_MEMNO = b.MEMNO
  JOIN camping c  on a.GROUP_CAM_NO = c.CAM_NO
  left join (select CAMPCO_CAMNO , count(*) `收藏數` from campcolloection group by CAMPCO_CAMNO) d on c.cam_no=d.campco_camno              
  WHERE a.GROUP_STATUS = 0
  order by GROUP_START_DATE desc;";
  $products = $pdo->query($sql);
  // $products = $pdo->bindValue(":memId", $memId);
  $result=[];
  while( $groupRow = $products->fetch(PDO::FETCH_ASSOC)){
    $result[] = array("GROUP_NO"=>$groupRow["團編號"],"GROUP_MEMNO"=>$groupRow["會員編號"],"MEM_NICKNAME"=>$groupRow["會員名"],"GROUP_NAME"=>$groupRow["團名"],
    "CAM_AREA"=>$groupRow["地區"],"CAM_COUNTY"=>$groupRow["縣市"],"CAM_NAME"=>$groupRow["營地"],"GROUP_PEOPLE_LIMIT"=>$groupRow["人數上限"], "GROUP_PEOPLE_SIGNUP"=>$groupRow["參團人數"],
    "GROUP_PEOPLE_LEFT"=>$groupRow["剩餘名額"],"GROUP_START_DATE"=>$groupRow["開團日"],"GROUP_DEPART_DATE"=>$groupRow["出發日"],"GROUP_DEADLINE"=>$groupRow["回程日"],
    "GROUP_STATUS"=>$groupRow["團目前狀態"],"Like_NUM"=>$groupRow["收藏數"] );

  }
  echo json_encode($result);
   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>