<?php
try{
  require_once("../connectBooks.php");

  $sql = "SELECT a.GROUP_NO, a.GROUP_MEMNO , b.MEM_NICKNAME , a.GROUP_NAME , c.CAM_AREA,
   c.CAM_COUNTY , c.CAM_NAME , a.GROUP_PEOPLE_LIMIT , a.GROUP_PEOPLE_SIGNUP,
    (a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP) , a.GROUP_START_DATE ,date(a.GROUP_DEPART_DATE), date(a.GROUP_DEADLINE) , 
    a.GROUP_STATUS , a.GROUP_REASON 
   FROM campinggroups a JOIN member b  on a.GROUP_MEMNO = b.MEMNO
              JOIN camping c  on a.GROUP_CAM_NO = c.CAM_NO
              WHERE a.GROUP_STATUS = 0";
  $products = $pdo->prepare($sql);
  $products = $pdo->bindValue(":memId", $memId);
  while( $groupRow = $products->fetch(PDO::FETCH_ASSOC)){
    echo $groupRow["GROUP_NO"];
    echo "<br>";
  }
   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>