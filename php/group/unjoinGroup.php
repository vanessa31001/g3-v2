<?php
try{   
    require_once("../connectBooks.php");
    $GROUPNO=$_GET["GROUP_NO"];
    $MEMNO = $_GET["MEMNO"];
    $sql = "DELETE FROM `group_detail` WHERE G_DEATIL_GROUP_NO=$GROUPNO AND G_DETAIL_MEMNO=$MEMNO;";
    $Rows = $pdo->query($sql);
    echo json_encode("退團成功");
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>