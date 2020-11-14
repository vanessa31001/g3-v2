<?php 
require_once("../connectBooks.php");

$sql = "SELECT mes.MES_CONTENT, m.MEM_NAME, m.MEMNO, m.MEM_IMG, mes.MES_NO
FROM message mes JOIN member m ON (mes.MES_OBJECT_MEMNO = m.MEMNO)
WHERE mes.MES_SENDER_MEMNO IN (SELECT mes1.MES_SENDER_MEMNO
                      FROM message mes1 JOIN  member m1 ON (mes1.MES_SENDER_MEMNO = m1.MEMNO)
                      WHERE m1.MEM_ID ='" . $_GET['memail'] . "')";
                     

$message = $pdo->query($sql);//執行sql
$mesRows = $message->fetchAll(PDO::FETCH_ASSOC);//撈執行完的結果
echo json_encode($mesRows);//回傳給.html
?>