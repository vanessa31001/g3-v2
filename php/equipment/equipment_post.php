<?php
$errMsg = "";
try {
	require_once("../connectBooks.php");
	$pdo->beginTransaction();
	//.......確定是否上傳成功
	if( $_FILES["equpic"]["error"] == UPLOAD_ERR_OK){
		
		$sql = "INSERT INTO `equipment` (`EQU_NO` , `EQU_NAME`, `EQU_EQUSORT_NO`, `EQU_EQUSORT_NO1`, `EQU_EQUSORT_NO2`, `EQU_EQUSORT_NO3`, `EQU_DESCR` , `EQU_PIC1` , `EQU_PIC2` , `EQU_PIC3
        `) 
        values(null, :EQU_NAME, :EQU_DESCR, :EQU_EQUSORT_NO2, :EQU_EQUSORT_NO3, :EQU_EQUSORT_NO3, :EQU_PIC1, :EQU_PIC2, :EQU_PIC3, '' )";
		$equipment = $pdo->prepare( $sql );
		$equipment -> bindValue(":equname", $_POST["equname"]);
		$equipment -> bindValue(":EQU_EQUSORT_NO", $_POST["equ_info_sort_sel"]);
		$equipment -> bindValue(":EQU_EQUSORT_NO1", $_POST["equ_info_sort_sel1"]);
		$equipment -> bindValue(":EQU_EQUSORT_NO2", $_POST["equ_info_sort_sel2"]);
		$equipment -> bindValue(":EQU_EQUSORT_NO3", $_POST["equ_info_sort_sel3"]);
		$equipment -> bindValue(":EQU_DESCR", $_POST["equ_desc"]);
		$equipment -> bindValue(":EQU_PIC1", $_FILES["equpic"]);
		$equipment -> bindValue(":EQU_PIC2", $_FILES["equpic"]);
		$equipment -> bindValue(":EQU_PIC3", $_FILES["equpic"]);
		$equipment -> execute();

		//取得自動創號的key值
		$EQU_NO = $pdo->lastInsertId();

		//先檢查images資料夾存不存在
		if( file_exists("images") === false){
			mkdir("images");
		}
		//將檔案copy到要放的路徑
		$fileInfoArr = pathinfo($_FILES["equpic"]["name"]); //先取得原始檔案名稱的副檔名
		$fileName = "{$EQU_NO}.{$fileInfoArr["extension"]}";  //8.gif

		$from = $_FILES["equpic"]["tmp_name"];
		$to = "images/$fileName";
		if(copy( $from, $to)===true){
			//將檔案名稱寫回資料庫
			$sql = "update equipment set image = :image where EQU_NO = $EQU_NO";
			$equipment = $pdo->prepare($sql);
			$equipment -> bindValue(":image", $fileName);
			$equipment -> execute();
			echo "新增成功";
			$pdo->commit();			
		}else{
			$pdo->rollBack();
		}

	}else{
		echo "錯誤代碼 : {$_FILES["equpic"]["error"]} <br>";
		echo "新增失敗<br>";

	}
} catch (PDOException $e) {
	$pdo->rollBack();
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
}
echo $errMsg;

?>    