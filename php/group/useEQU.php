<?php
try{
  require_once("../connectBooks.php");

  $sql = "INSERT INTO `g_use_equ`( `GROUP_NO`, `G_EQU_NO`) VALUES (:GROUP_NO, :G_EQU_NO)";
  $msgRows = $pdo->prepare($sql);
  $msgRows ->bindValue(":GROUP_NO", $_POST["GROUP_NO"]);
  $msgRows ->bindValue(":G_EQU_NO", $_POST["G_EQU_NO"]);
  $msgRows->execute();
  echo json_encode("執行成功");   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>