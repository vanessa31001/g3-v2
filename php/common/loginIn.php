<?php
try{
  require_once("../connectBooks.php");
  $sql = "select * from `member` where MEM_ID=:memId and MEM_PSW=:memPsw"; 
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
    $_SESSION["MEMNO"] = $memRow["MEMNO"];
    $_SESSION["MEM_ID"] = $memRow["MEM_ID"];
    $_SESSION["MEM_NAME"] = $memRow["MEM_NAME"];
    $_SESSION["MEM_NICKNAME"] = $memRow["MEM_NICKNAME"];

  	$result = array("MEMNO"=>$memRow["MEMNO"],"MEM_ID"=>$memRow["MEM_ID"], "MEM_NAME"=>$memRow["MEM_NAME"], "MEM_NICKNAME"=>$memRow["MEM_NICKNAME"]);
  	$json = json_encode($result);

    //送出登入者的相關資料
    echo $json;
  }
}catch(PDOException $e){
  $error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);//{"errorMsg":"......"}傳回錯誤訊息
  // echo $e->getMessage();
}
?>