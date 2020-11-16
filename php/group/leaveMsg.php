<?php
try{   
    require_once("../connectBooks.php");
    $sql = "INSERT INTO `GROUP_MES` (GROUP_MES_GROUPNO, GROUP_MES_MEMNO, GROUP_MES_TIME, GROUP_MES_CONTENT) 
    VALUES(:GROUP_MES_GROUPNO, :GROUP_MES_MEMNO, :GROUP_MES_TIME, :GROUP_MES_CONTENT);";
    $msg = $pdo->prepare($sql);
    $msg ->bindValue(":GROUP_MES_GROUPNO", $_POST["GROUP_MES_GROUPNO"]);
    $msg ->bindValue(":GROUP_MES_MEMNO", $_POST["GROUP_MES_MEMNO"]);
    $msg ->bindValue(":GROUP_MES_TIME", $_POST["GROUP_MES_TIME"]);
    $msg ->bindValue(":GROUP_MES_CONTENT", $_POST["GROUP_MES_CONTENT"]);
    // $groupRows ->bindValue(":GROUP_NO", 3);
    $msg->execute();
    echo json_encode("執行成功");
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>