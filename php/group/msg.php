<?php
try{
  require_once("../connectBooks.php");

  $sql = "SELECT GROUP_NO `GROUP_NO`, GROUP_MES_NO `留言編號`,GROUP_MES_MEMNO `會員編號`, MEM_NICKNAME `會員暱稱`,MEM_IMG `會員頭貼`,GROUP_MES_TIME `留言時間`, GROUP_MES_CONTENT `留言內容`, IFNULL(多少留言,0) `多少留言`
  FROM GROUP_MES a 
  JOIN (select max(GROUP_MES_TIME) `maxTime`, count(*) `多少留言` FROM GROUP_MES group by GROUP_MES_GROUPNO) b on a.GROUP_MES_TIME = b.maxTime
  RIGHT JOIN campinggroups c on a.GROUP_MES_GROUPNO = c.GROUP_NO
  left JOIN member d on a.GROUP_MES_MEMNO = d.MEMNO
  where GROUP_STATUS = 0 and GROUP_NO = :GROUP_NO;";
  $msgRows = $pdo->prepare($sql);
  $msgRows ->bindValue(":GROUP_NO", $_GET["GROUP_NO"]);
//   $msgRows ->bindValue(":GROUP_NO", 1);
  $msgRows->execute();
  $msgRow = $msgRows -> fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($msgRow);   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>