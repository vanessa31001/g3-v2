<?php
session_start();
try{   
    require_once("../connectBooks.php");
    $member = $_SESSION["MEMNO"];
    $sql = "INSERT INTO `campinggroups`(`GROUP_PEOPLE_SIGNUP`,`GROUP_MEMNO`, `GROUP_NAME`, `GROUP_INTRO`, `GROUP_CAM_NO`, `GROUP_PEOPLE_LIMIT`, `GROUP_START_DATE`, `GROUP_DEADLINE`, `GROUP_DEPART_DATE`, `GROUP_PIC1`, `GROUP_PIC2`, `GROUP_PIC3`) 
    VALUES (1,:GROUP_MEMNO, :GROUP_NAME,:GROUP_INTRO, :GROUP_CAM_NO, :GROUP_PEOPLE_LIMIT, :GROUP_START_DATE, :GROUP_DEADLINE, :GROUP_DEPART_DATE, :GROUP_PIC1, :GROUP_PIC2, :GROUP_PIC1)";
    $msg = $pdo->prepare($sql);
    $msg ->bindValue(":GROUP_MEMNO", $member);
    $msg ->bindValue(":GROUP_NAME", $_POST["GROUP_NAME"]);
    $msg ->bindValue(":GROUP_INTRO", $_POST["GROUP_INTRO"]);
    $msg ->bindValue(":GROUP_CAM_NO", $_POST["GROUP_CAM_NO"]);
    $msg ->bindValue(":GROUP_PEOPLE_LIMIT", $_POST["GROUP_PEOPLE_LIMIT"]);
    $msg ->bindValue(":GROUP_START_DATE", $_POST["GROUP_START_DATE"]);
    $msg ->bindValue(":GROUP_DEADLINE", $_POST["GROUP_DEADLINE"]);
    $msg ->bindValue(":GROUP_DEPART_DATE", $_POST["GROUP_DEPART_DATE"]);
    $msg ->bindValue(":GROUP_PIC1", $_POST["GROUP_PIC1"]);
    $msg ->bindValue(":GROUP_PIC2", $_POST["GROUP_PIC2"]);
    $msg ->bindValue(":GROUP_PIC3", $_POST["GROUP_PIC3"]);
    $msg->execute();


    $sql = "select GROUP_NO FROM campinggroups WHERE GROUP_MEMNO=:GROUP_MEMNO && GROUP_NAME=:GROUP_NAME && GROUP_INTRO=:GROUP_INTRO";
    $row = $pdo->prepare($sql);
    $row ->bindValue(":GROUP_MEMNO", $_SESSION["MEMNO"]);
    $row ->bindValue(":GROUP_NAME", $_POST["GROUP_NAME"]);
    $row ->bindValue(":GROUP_INTRO", $_POST["GROUP_INTRO"]);
    $row->execute();
    $group = $row->fetch(PDO::FETCH_ASSOC);
    $result = $group["GROUP_NO"];

    $sql ="INSERT INTO `group_detail`(`G_DEATIL_GROUP_NO`, `G_DETAIL_MEMNO`) VALUES ($result,$member)";
    $row = $pdo->query($sql);

  	echo json_encode($result);
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>