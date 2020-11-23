<?php
$errMsg = "";
try {
	$json =  file_get_contents("php://input");
	$data = json_decode($json);
	// var_dump($data);
	// die;
	require_once("../connectBooks.php");
	$pdo->beginTransaction();
	
	// if( $_FILES["equpic"]["error"] == UPLOAD_ERR_OK){
		
		$sql = "INSERT INTO `message` (`MES_CONTENT`, `MES_OBJECT_MEMNO`, `MES_SENDER_MEMNO`  ,`MES_TIME`)  
        values(:MES_CONTENT, :MES_OBJECT_MEMNO, :MES_SENDER_MEMNO, now())";
		$message = $pdo->prepare( $sql );
		$message -> bindValue(":MES_CONTENT", $data->MES_CONTENT);
		$message -> bindValue(":MES_OBJECT_MEMNO", $data->MES_OBJECT_MEMNO);
		$message -> bindValue(":MES_SENDER_MEMNO", $data->MES_SENDER_MEMNO);
		// $message -> bindValue(":MES_READ", $data->equmessage);
		
		
		$message -> execute();

		
	
	$pdo->commit();			
	
} catch (PDOException $e) {
	$pdo->rollBack();
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
}

    
echo $errMsg;



?>    