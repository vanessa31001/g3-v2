<?php
try{   
    require_once("../connectBooks.php");
    $sql = "SELECT G_USE_EQU_NO `揪團使用設備編號`, GROUP_NO `揪團編號`, G_EQU_NO `揪團設備類別編號`, EQUSORT_EQUNAME `設備類別名稱`
    FROM G_USE_EQU a JOIN EQUSORT b ON b.EQUSORT_NO = a.G_EQU_NO
    where GROUP_NO = :GROUP_NO";
    $EQUsRows = $pdo->prepare($sql);
    $EQUsRows ->bindValue(":GROUP_NO", $_GET["GROUP_NO"]);
    // $groupRows ->bindValue(":GROUP_NO", 3);
    $EQUsRows->execute();
    if( $EQUsRows->rowCount() == 0 ){
        echo json_encode("沒資料");
    }else{
        $EQUsRow = $EQUsRows->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($EQUsRow);
    }
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>