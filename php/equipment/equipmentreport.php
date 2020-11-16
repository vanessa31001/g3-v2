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
		
		$sql = "INSERT INTO `reportoutfit` (`REP_OUT_EQUNO`, `REP_OUT_MEMNO`,  `REPOUP_RESON` ,`REPOUT_DATE` ,`REP_OUT_STATUS`,`REEQU_DEAL`)  
        values(:REP_OUT_EQUNO, :REP_OUT_MEMNO,  :REPOUP_RESON, now() ,'0',' ')";
		$reportoutfit = $pdo->prepare( $sql );
		$reportoutfit -> bindValue(":REPOUP_RESON", $data->REPOUP_RESON);//檢舉原因
		$reportoutfit -> bindValue(":REP_OUT_EQUNO", $data->EQU_NO);//設備編號
		// $reportoutfit -> bindValue(":EQU_MEMNO", $data->EQU_MEMNO); //會員編號
		$reportoutfit -> bindValue(":REP_OUT_MEMNO", $data->REP_OUT_MEMNO);

		
		
		
		// echo $data->REPOUP_RESON;
		$reportoutfit -> execute();

	
	$pdo->commit();			
	
} catch (PDOException $e) {
	$pdo->rollBack();
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
}

    
echo $errMsg;



?>    