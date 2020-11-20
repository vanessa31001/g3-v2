<?php
try{
	session_start();
	require_once("../connectBooks.php");
	// $sql = "";




    $sql1 = "select * from `member` where MEM_ID=:memId"; 
    $member1 = $pdo->prepare($sql1);
    $member1->bindValue(":memId", $_POST["MEM_ID"]);
	$member1->execute();
	$memRow1 = $member1->fetch(PDO::FETCH_ASSOC);
	if($member1->rowCount()==0){
		echo '{ "err" : "帳號未被使用" }';
	}else{
		if(password_verify($_POST["MEM_PSW"], $memRow1["MEM_PSW"])){
			if(is_null($memRow1['MEM_BAN_DATE'])){
				$_SESSION["MEMNO"] = $memRow1["MEMNO"];
				$_SESSION["MEM_ID"] = $memRow1["MEM_ID"];
				$_SESSION["MEM_NAME"] = $memRow1["MEM_NAME"];
				$_SESSION["MEM_NICKNAME"] = $memRow1["MEM_NICKNAME"];
				$result = array("MEMNO"=>$memRow1["MEMNO"],"MEM_ID"=>$memRow1["MEM_ID"], "MEM_NAME"=>$memRow1["MEM_NAME"], "MEM_NICKNAME"=>$memRow1["MEM_NICKNAME"]);
				$json = json_encode($result);
				//送出登入者的相關資料
				echo $json;
			}else{
				$errMsg = '{ "err" : "您已被停權至 '.$memRow['MEM_BAN_DATE'].'"  }';
				echo $errMsg;
			}
		}else{
			echo '{ "err" : "密碼錯誤" }';
			var_dump($memRow1["MEM_PSW"]);
			die;
		}
	}
}catch(PDOException $e){
  $error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);//{"errorMsg":"......"}傳回錯誤訊息
  // echo $e->getMessage();
}
?>