<?php
try{
  require_once("../connectBooks.php");
  // $sql = "SELECT a.GROUP_NO '揪團編號', a.GROUP_MEMNO '開團會員編號', b.MEM_NICKNAME '會員名字', a.GROUP_NAME '團名',
  // c.CAM_COUNTY '縣市', c.CAM_NAME '營區', a.GROUP_PEOPLE_LIMIT '人數限制', a.GROUP_PEOPLE_SIGNUP '已參加人數',
  //  (a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP) '剩餘名額', a.GROUP_START_DATE '發文日期',date(a.GROUP_DEPART_DATE) '出發日', date(a.GROUP_DEADLING) '結束日', 
  //  a.GROUP_STATUS '揪團狀態', a.GROUP_REASON '取消原因'
  // FROM campinggroups a JOIN member b  on a.GROUP_MEMNO = b.MEMNO
  //            JOIN camping c  on a.GROUP_CAM_NO = c.CAM_NO;"; 
  // $sql = "select a.GROUP_NO from campinggroups a";
  $sql = "SELECT a.GROUP_NO, a.GROUP_MEMNO , b.MEM_NICKNAME , a.GROUP_NAME ,
   c.CAM_COUNTY , c.CAM_NAME , a.GROUP_PEOPLE_LIMIT , a.GROUP_PEOPLE_SIGNUP,
    (a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP) , a.GROUP_START_DATE ,date(a.GROUP_DEPART_DATE), date(a.GROUP_DEADLING) , 
    a.GROUP_STATUS , a.GROUP_REASON 
   FROM campinggroups a JOIN member b  on a.GROUP_MEMNO = b.MEMNO
              JOIN camping c  on a.GROUP_CAM_NO = c.CAM_NO;";
	$products = $pdo->query($sql);
  while( $groupRow = $products->fetch(PDO::FETCH_ASSOC)){
    echo $groupRow["CAM_COUNTY"];
    echo "<br>";
  }
   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}