<?php
  require_once("../connectBooks.php");
  $sql = "INSERT INTO dept(cc.CAMPCO_MEMNO, cc.CAMPCO_CAMNO)
  SELECT cc.CAMPCO_MEMNO, cc.CAMPCO_CAMNO
  FROM campcolloection cc JOIN camping c ON (cc.CAMPCO_CAMNO = c.CAM_NO)
                          JOIN member m ON (m.MEMNO = cc.CAMPCO_MEMNO)
  WHERE m.MEM_ID = ':MEMID'
  "; 
  $member = $pdo->prepare($sql); //先編譯好
  
  $member->bindValue(":memId", $_POST["MEM_ID"]); //代入資料
	$member->bindValue(":memPsw", $_POST["MEM_PSW"]);
	$member->execute();//執行之
  if( $member->rowCount()==0){ //查無此人
	  echo "{}";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetch(PDO::FETCH_ASSOC);
    //--------------將登入者的資料寫入session
    session_start();
    $_SESSION["MEM_ID"] = $memRow["MEM_ID"];
    $_SESSION["MEM_NAME"] = $memRow["MEM_NAME"];
    $_SESSION["MEM_NICKNAME"] = $memRow["MEM_NICKNAME"];

  	$result = array("MEM_ID"=>$memRow["MEM_ID"], "MEM_NAME"=>$memRow["MEM_NAME"], "MEM_NICKNAME"=>$memRow["MEM_NICKNAME"]);
  	$json = json_encode($result);

    //送出登入者的相關資料
    echo $json;
    }catch(PDOException $e){
        echo "錯誤訊息:", $e->getLine(),"<br>";
        echo "錯誤訊息:", $e->getMessage(),"<br>";
}
?>