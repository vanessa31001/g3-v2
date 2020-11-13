<?php
try{
  require_once("../connectBooks.php");
  $GROUP_NO = $_GET["GROUP_NO"];
  $sql = "select * FROM campinggroups a JOIN member b ON a.GROUP_MEMNO = b.MEMNO where GROUP_NO = $GROUP_NO;";
  $groupRows = $pdo->query($sql);
  $groupRow[0] = $groupRows->fetch(PDO::FETCH_ASSOC);

  $sql = "select * from GROUP_MES a JOIN member b on a.GROUP_MES_MEMNO = b.MEMNO where GROUP_MES_GROUPNO = $GROUP_NO;";
  $groupRows = $pdo->query($sql);
  $groupRow[1] = $groupRows->fetchAll(PDO::FETCH_ASSOC);

  $sql = "SELECT * FROM GROUP_DETAIL a JOIN member b on G_DETAIL_MEMNO = b.MEMNO where G_DEATIL_GROUP_NO = 1;";
  $groupRows = $pdo->query($sql);
  $groupRow[2] = $groupRows->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($groupRow);   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>