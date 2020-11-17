<?php

foreach($_FILES["upFile"]["error"] as $i => $error){
	switch($error){  //$error 形同 $_FILES["upFile"]["error"][$]
		case UPLOAD_ERR_OK :
			$dir = "images";
			//檢查資料夾是否己存在
			if(file_exists($dir)==false){
				mkdir($dir);//make directory
			}

			$from = $_FILES["upFile"]["tmp_name"][$i]; //暫存區中的路徑和檔名
			$fileName = $_FILES["upFile"]["name"][$i];;//原始檔案名稱
			$to = "{$dir}/{$fileName}";
			if(copy($from, $to)){
				echo "上傳成功<br>";
			}else{
				echo "上傳失敗<br>";
			}

			break;
		case UPLOAD_ERR_INI_SIZE :
			echo "上傳的檔案太大, 不得超過", ini_get("upload_max_filesize"), "<br>";
			break;
		case UPLOAD_ERR_FORM_SIZE :
			echo "上傳的檔案太大, 不得超過", $_POST["MAX_FILE_SIZE"], "位元組<br>";
			break;
		case UPLOAD_ERR_PARTIAL :
			echo "上傳檔案不完整", "<br>";
			break;
		case UPLOAD_ERR_NO_FILE :
			echo "未選檔案", "<br>";
			break;		
		default:
			echo "系統暫時發生問題，請聯絡網站維護人員~~<br>"	;		
	}
}

?>