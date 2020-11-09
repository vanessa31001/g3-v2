`<?php
try{
  require_once("../connectBooks.php");
  // $sql = "select * from campinggroups";
  $area = 
  $sql = "select cam_no, cam_name, cam_area from camping where cam_area = :area;";
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