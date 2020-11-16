<?php
try{   
    require_once("../connectBooks.php");
    $sql = "INSERT INTO `REPORTGROUP` (REGROUP_GROUP_NO, REGROUP_MEMNO, REGROUP_RESON, REGROUP_DATE, REGROUP_DEAL)
    VALUES(:REGROUP_GROUP_NO, :REGROUP_MEMNO, :REGROUP_RESON , :REGROUP_DATE, 0)";
    $msg = $pdo->prepare($sql);
    // $msg ->bindValue(":REGROUP_MES_GROUP_NO", 2);
    // $msg ->bindValue(":REGROUP_MES_MEMNO", 2);
    // $msg ->bindValue(":REGROUP_RESON", 0);
    // $msg ->bindValue(":REGROUP_DATE", '2020-11-14 21:58:38');
    $msg ->bindValue(":REGROUP_GROUP_NO", $_POST["REGROUP_GROUP_NO"]);
    $msg ->bindValue(":REGROUP_MEMNO", $_POST["REGROUP_MEMNO"]);
    $msg ->bindValue(":REGROUP_RESON", $_POST["REGROUP_RESON"]);
    $msg ->bindValue(":REGROUP_DATE", $_POST["REGROUP_DATE"]);
    $msg->execute();
    echo "執行成功";

    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>