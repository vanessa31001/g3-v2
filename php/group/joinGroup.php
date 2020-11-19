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
        // echo json_encode("您已報名參加，\n請別忘了於出團時間去露營呦!");
        echo json_encode("您已報名參加，\n請別忘了於出團時間去露營呦!");
        
    }else{
        //查看是否有名額
        $sql = "SELECT GROUP_PEOPLE_LIMIT, GROUP_PEOPLE_SIGNUP FROM `campinggroups` WHERE GROUP_NO = $GROUPNO";
        $Rows = $pdo->query($sql);
        $Row = $Rows->fetch(PDO::FETCH_ASSOC);
        // echo ($Row["GROUP_PEOPLE_LIMIT"]." ".$Row["GROUP_PEOPLE_SIGNUP"]);
        $LIMIT=$Row["GROUP_PEOPLE_LIMIT"];
        $SIGNUP=$Row["GROUP_PEOPLE_SIGNUP"];
        if(($LIMIT-$SIGNUP) > 0){//還沒額滿
            $sql = "INSERT INTO `group_detail`(G_DEATIL_GROUP_NO, G_DETAIL_MEMNO) VALUES ($GROUPNO,$MEMNO)";
            $Rows = $pdo->query($sql);
            $SIGNUP = $SIGNUP+1;
            $sql = "UPDATE `campinggroups` SET GROUP_PEOPLE_SIGNUP=$SIGNUP WHERE GROUP_NO=$GROUPNO";
            $Rows = $pdo->query($sql);
            // echo("報名成功");
            echo json_encode("報名成功，\n歡迎參加更多揪團。");
        }else{
            echo json_encode("此團已額滿，請參考其他揪團");
        }
    }
   
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>