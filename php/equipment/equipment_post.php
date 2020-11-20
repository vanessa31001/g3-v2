<?php
$errMsg = "";
try {
	require_once("../connectBooks.php");
	$pdo->beginTransaction();
	// if( $_FILES["equpic"]["error"] == UPLOAD_ERR_OK){
		
		$sql = "INSERT INTO `equipment` (`EQU_NO`,`EQU_NAME`, `EQUSORT`,  `EQU_DESCR` , `EQU_PIC1` , `EQU_PIC2` , `EQU_PIC3`,`EQU_MEMNO` ,`EQU_POSTDATE`)  
        values(null ,:EQU_NAME, :EQUSORT, :EQU_DESCR,  :EQU_PIC1, :EQU_PIC2, :EQU_PIC3, :EQU_MEMNO, now())";
		$equipment = $pdo->prepare( $sql );
		$equipment -> bindValue(":EQU_NAME", $_POST["equname"]);
		$equipment -> bindValue(":EQUSORT", $_POST["equ_info_sort_sel"]);
		$equipment -> bindValue(":EQU_DESCR", $_POST["equ_desc"]);
		$equipment -> bindValue(":EQU_MEMNO", $_POST["mempost"]);
		$equipment -> bindValue(":EQU_PIC1", $_FILES["equpic"]["name"][0]);
		$equipment -> bindValue(":EQU_PIC2", $_FILES["equpic"]["name"][1]);
		$equipment -> bindValue(":EQU_PIC3", $_FILES["equpic"]["name"][2]);
		
		$equipment -> execute();

		$EQU_NO = $pdo->lastInsertId();
	foreach($_FILES["equpic"]["error"] as $i => $error){

        switch($error){  
            case UPLOAD_ERR_OK :
                $dir = "../../pic/equipment";
            
                $from = $_FILES["equpic"]["tmp_name"][$i]; 
                $fileName = $_FILES["equpic"]["name"][$i];
                $to = "{$dir}/{$fileName}";
                if(copy($from, $to)){
                    echo "上傳成功<br>";
                    header("location:../../equipment.html");
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
                echo "系統暫時發生問題，請聯絡網站維護人員。<br>";		
        }
	}
	$pdo->commit();			
	
} catch (PDOException $e) {
	$pdo->rollBack();
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
}

    
echo $errMsg;




?>    