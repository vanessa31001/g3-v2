<?php
try{
  require_once("../connectBooks.php");
  //揪團
  $GROUP_NO = $_GET["GROUP_NO"];
  $sql = "select GROUP_NO,GROUP_NAME,GROUP_PIC1,GROUP_PIC2,GROUP_PIC3,CAM_COUNTY,CAM_NAME, date(GROUP_START_DATE) `GROUP_START_DATE`,GROUP_MEMNO,MEM_IMG,MEM_NICKNAME,GROUP_INTRO,date(GROUP_DEPART_DATE) `GROUP_DEPART_DATE`,date(GROUP_DEADLINE) `GROUP_DEADLINE`,GROUP_PEOPLE_LIMIT,(GROUP_PEOPLE_LIMIT-GROUP_PEOPLE_SIGNUP) `REMAIN_PEOPLE` FROM campinggroups a JOIN member b ON a.GROUP_MEMNO = b.MEMNO JOIN CAMPING c on c.CAM_NO = a.GROUP_CAM_NO where GROUP_NO = $GROUP_NO;";
  $groupRows = $pdo->query($sql);
  $groupRow[0] = $groupRows->fetch(PDO::FETCH_ASSOC);
  //留言
  $sql = "select * from GROUP_MES a JOIN member b on a.GROUP_MES_MEMNO = b.MEMNO where GROUP_MES_GROUPNO = $GROUP_NO;";
  $groupRows = $pdo->query($sql);
  $groupRow[1] = $groupRows->fetchAll(PDO::FETCH_ASSOC);
  
  // //參團
  $sql = "SELECT G_DEATIL_NO, G_DETAIL_MEMNO, MEM_NICKNAME FROM GROUP_DETAIL a JOIN member b on G_DETAIL_MEMNO = b.MEMNO where G_DEATIL_GROUP_NO = $GROUP_NO;";
  $groupRows = $pdo->query($sql);
  $groupRow[2] = $groupRows->fetchAll(PDO::FETCH_ASSOC);

  //設備
  $sql = "SELECT G_USE_EQU_NO, GROUP_NO , G_EQU_NO , EQUSORT_EQUNAME  FROM G_USE_EQU a JOIN EQUSORT b ON b.EQUSORT_NO = a.G_EQU_NO
    where GROUP_NO = $GROUP_NO";
  $EQUsRows = $pdo->query($sql);
  if( $EQUsRows->rowCount() == 0 ){
    $groupRow[3] = "沒資料";
  }else{
    $groupRow[3] = $EQUsRows->fetchAll(PDO::FETCH_ASSOC);
  }

  echo json_encode($groupRow);   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>