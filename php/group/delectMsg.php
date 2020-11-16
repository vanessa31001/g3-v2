<?php
try{   
    require_once("../connectBooks.php");
    $sql = "update GROUP_MES set GROUP_MES_STATUS = 1 where GROUP_MES_NO = :GROUP_MES_NO;";
    $msg = $pdo->prepare($sql);
    $msg ->bindValue(":GROUP_MES_NO", $_POST["GROUP_MES_NO"]);
    // $groupRows ->bindValue(":GROUP_NO", 3);
    $msg->execute();
    echo json_encode("執行成功");
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>