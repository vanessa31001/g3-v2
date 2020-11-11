<?php
$errMsg = "";
try {
	require_once("../connectBooks.php");
	$pdo->beginTransaction();
	
	// if( $_FILES["equpic"]["error"] == UPLOAD_ERR_OK){
		
		$sql = "INSERT INTO `equipment` (`EQU_NAME`, `EQU_EQUSORT_NO`, `EQU_EQUSORT_NO1`, `EQU_EQUSORT_NO2`, `EQU_EQUSORT_NO3`, `EQU_DESCR` , `EQU_PIC1` , `EQU_PIC2` , `EQU_PIC3`,`EQU_MEMNO` ,`EQU_POSTDATE`)  
        values(:EQU_NAME, :EQU_EQUSORT_NO, :EQU_EQUSORT_NO1 , :EQU_EQUSORT_NO2, :EQU_EQUSORT_NO3, :EQU_DESCR,  :EQU_PIC1, :EQU_PIC2, :EQU_PIC3, :EQU_MEMNO, now())";
		$equipment = $pdo->prepare( $sql );
		$equipment -> bindValue(":EQU_NAME", $_POST["equname"]);
		$equipment -> bindValue(":EQU_EQUSORT_NO", $_POST["equ_info_sort_sel"]);
		$equipment -> bindValue(":EQU_EQUSORT_NO1", $_POST["equ_info_sort_sel1"]);
		$equipment -> bindValue(":EQU_EQUSORT_NO2", $_POST["equ_info_sort_sel2"]);
		$equipment -> bindValue(":EQU_EQUSORT_NO3", $_POST["equ_info_sort_sel3"]);
		$equipment -> bindValue(":EQU_DESCR", $_POST["equ_desc"]);
		$equipment -> bindValue(":EQU_MEMNO", $_POST["mempost"]);
		$equipment -> bindValue(":EQU_PIC1", $_FILES["equpic"]["name"][0]);
		$equipment -> bindValue(":EQU_PIC2", $_FILES["equpic"]["name"][1]);
		$equipment -> bindValue(":EQU_PIC3", $_FILES["equpic"]["name"][2]);
		
		$equipment -> execute();


		echo $_FILES["equpic"][0];
		
		$fileInfoArr = pathinfo($_FILES["equpic"]["name"]); 
		$fileName = "{$EQU_NO}.{$fileInfoArr["extension"]}";  

		$from = $_FILES["equpic"]["tmp_name"];
		$to = "pic/equipment/$fileName";
		if(copy( $from, $to)===true){
			
			$equipment = $pdo->prepare($sql);
			$equipment -> bindValue(":pic/equipment", $fileName);
			$equipment -> execute();
			echo "新增成功";
			$pdo->commit();			
		}else{
			$pdo->rollBack();
		}

	// }else{
	// 	// echo "錯誤代碼 : {$_FILES["equpic"]["error"]} <br>";
	// 	echo "新增失敗<br>";
	// 	print_r($_FILES["equpic"]["tmp_name"][0]);

	// }
} catch (PDOException $e) {
	$pdo->rollBack();
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
}

    // foreach($_FILES["equpic"]["error"] as $i => $error){
    //     switch($error){  
    //         case UPLOAD_ERR_OK :
    //             $dir = "pic/equipment";
            
    //             if(file_exists($dir)==false){
    //                 mkdir($dir);
    //             }

    //             $from = $_FILES["equpic"]["tmp_name"][$i]; 
    //             $fileName = $_FILES["equpic"]["name"][$i];;
    //             $to = "{$dir}/{$fileName}";
    //             if(copy($from, $to)){
    //                 echo "上傳成功<br>";
    //             }else{
    //                 echo "上傳失敗<br>";
    //             }

    //             break;
    //         case UPLOAD_ERR_INI_SIZE :
    //             echo "上傳的檔案太大, 不得超過", ini_get("upload_max_filesize"), "<br>";
    //             break;
    //         case UPLOAD_ERR_FORM_SIZE :
    //             echo "上傳的檔案太大, 不得超過", $_POST["MAX_FILE_SIZE"], "位元組<br>";
    //             break;
    //         case UPLOAD_ERR_PARTIAL :
    //             echo "上傳檔案不完整", "<br>";
    //             break;
    //         case UPLOAD_ERR_NO_FILE :
    //             echo "未選檔案", "<br>";
    //             break;		
    //         default:
    //             echo "系統暫時發生問題，請聯絡網站維護人員。<br>";		
    //     }
    // }
echo $errMsg;



?>    