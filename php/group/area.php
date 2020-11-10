<?php
try{
  require_once("../connectBooks.php");
  $sql = "select CAM_NO, CAM_NAME, CAM_AREA, CAM_COUNTY from camping";
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