<?php 
require_once("../connectBooks.php");

// $cond1 = "MES_OBJECT_MEMNO={$_GET["MES_OBJECT_MEMNO"]}";
// $cond2 = "MES_SENDER_MEMNO={$_GET["MES_SENDER_MEMNO"]}";

// $sql = "select * from message where $cond1 and $cond2 ";

$sql = "SELECT mes.MES_CONTENT, m.MEM_NAME, m.MEMNO, m.MEM_IMG, mes.MES_NO
FROM message mes JOIN member m ON (mes.MES_OBJECT_MEMNO = m.MEMNO)
WHERE mes.MES_SENDER_MEMNO IN (SELECT mes1.MES_SENDER_MEMNO
                      FROM message mes1 JOIN  member m1 ON (mes1.MES_SENDER_MEMNO = m1.MEMNO)
                      WHERE m1.MEM_ID ='" . $_GET['memail'] . "')";
                     

$message = $pdo->query($sql);//執行sql
$mesRows = $message->fetchAll(PDO::FETCH_ASSOC);//撈執行完的結果
echo json_encode($mesRows);//回傳給.html
?>