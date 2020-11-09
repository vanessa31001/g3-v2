<?php
try{
  require_once("../connectBooks.php");
  // $sql = "select * from campinggroups";
  if($_GET["CAM_AREA"]==1){
    $cond = 1;
  }else{
    $AREA=$_GET["CAM_AREA"];
    $cond = "CAM_AREA = '{$_GET["CAM_AREA"]}'";
    // echo ($cond); 
  }
  // $area = $_GET["CAM_AREA"];
  $sql = "select CAM_NO, CAM_NAME, CAM_AREA, CAM_COUNTY from camping where $cond";
  $products = $pdo->query($sql);
  $result=[];
  while( $groupRow = $products->fetch(PDO::FETCH_ASSOC)){
    $result[] = array("CAM_NO"=>$groupRow["CAM_NO"],"CAM_NAME"=>$groupRow["CAM_NAME"],"CAM_AREA"=>$groupRow["CAM_AREA"],"CAM_COUNTY"=>$groupRow["CAM_COUNTY"]);
  }
  echo json_encode($result);
   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error); 
}
?>