<?php
session_start();
$errMsg = "";
try {
	require_once("../connectBooks.php");
	$pdo->beginTransaction();
	//.......確定是否上傳成功
	if( $_FILES["upFile"]["error"] == UPLOAD_ERR_OK){
        //先檢查images資料夾存不存在
        $dir = "../../pic/member";
        //檢查資料夾是否己存在
        if(file_exists($dir)==false){
            mkdir($dir,0777,true);//make directory
        }
		//將檔案copy到要放的路徑
		$fileInfoArr = pathinfo($_FILES["upFile"]["name"]); //先取得原始檔案名稱的副檔名
		$fileName = "{$_SESSION['MEMNO']}.{$fileInfoArr["extension"]}";  //8.gif

		$from = $_FILES["upFile"]["tmp_name"];
		$to = "{$dir}/$fileName";
		if(copy( $from, $to)===true){
			//將檔案名稱寫回資料庫
			$sql = "update `member` set MEM_IMG = :image where MEMNO = :MEMNO";
			$products = $pdo->prepare($sql);
			$products -> bindValue(":image", $fileName);
			$products -> bindValue(":MEMNO", $_SESSION['MEMNO']);
			$products -> execute();
			echo $fileName;
			$pdo->commit();			
		}else{
			$pdo->rollBack();
		}

	}else{
		echo "錯誤代碼 : {$_FILES["upFile"]["error"]} <br>";
		echo "新增失敗<br>";

	}
} catch (PDOException $e) {
	$pdo->rollBack();
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
}
echo $errMsg;
?>