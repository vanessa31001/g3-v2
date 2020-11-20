<?php
try{   
    require_once("../connectBooks.php");
    $GROUPNO=$_GET["GROUP_NO"];
    $MEMNO = $_GET["MEMNO"];
    $sql = "SELECT G_DEATIL_NO FROM GROUP_DETAIL  WHERE G_DEATIL_GROUP_NO=$GROUPNO AND G_DETAIL_MEMNO=$MEMNO;";
    $Rows = $pdo->query($sql);
    $Row =$Rows->fetchAll(PDO::FETCH_ASSOC);
    if($Row){
        //  判斷已參加
        echo json_encode("您已報名參加，\n請別忘了於出團時間去露營呦!");
        
    }else{
        //新增參團人員
        
        $sql = "INSERT INTO `group_detail`(G_DEATIL_GROUP_NO, G_DETAIL_MEMNO) VALUES ($GROUPNO,$MEMNO)";
        $Rows = $pdo->query($sql);
        echo json_encode("報名成功，\n歡迎參加更多揪團。");
    }
   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>