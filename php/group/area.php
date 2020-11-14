<?php
try{
  require_once("../connectBooks.php");
  $sql = "select CAM_NO, CAM_NAME, CAM_AREA, CAM_COUNTY from camping";
  $area = $pdo->query($sql);
  $area = $pdo->query($sql);
  $result[0] = $area->fetchAll(PDO::FETCH_ASSOC);
  $sql = "select * from EQUSORT";
  $EQU = $pdo->query($sql);
  $EQU = $pdo->query($sql);
  $result[1] = $EQU->fetchAll(PDO::FETCH_ASSOC);


  echo json_encode($result);
   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error); 
}
?>