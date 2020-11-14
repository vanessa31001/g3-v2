<?php 
$mesginback=$_GET["mesginback"];
// $errMsg = "";
try {
  require_once("../connectBooks.php");
  $pdo->beginTransaction();
  
  $sql = "INSERT INTO `replymessage`(RE_MES_CONTENT) 
  values (:RE_MES_CONTENT);";	
  $replymessage = $pdo->prepare($sql);
    //GET上一頁的'psn'....放入未知數':psn'
  $replymessage->bindValue(":mesginback", $RE_MES_CONTENT);


  $replymessage->execute();
  $msg = "新增成功";
} catch (PDOException $e) {
  $msg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
  $msg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
}
?>


