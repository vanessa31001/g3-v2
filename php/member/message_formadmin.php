<?php 
    try{
        session_start();
        require_once("../connectBooks.php");

        $sql = "SELECT mes.MES_CONTENT, m.MEM_NAME, m.MEMNO, m.MEM_IMG, mes.MES_NO
        FROM message mes JOIN member m ON (mes.MES_OBJECT_MEMNO = m.MEMNO)
        WHERE mes.MES_SENDER_MEMNO = :memId order by mes.MES_TIME";
        $message = $pdo->prepare($sql);
        $message->bindValue(':memId', $_SESSION["MEMNO"]);
        $message->execute();
        $mesRows = $message->fetchAll(PDO::FETCH_ASSOC);//撈執行完的結果
        echo json_encode($mesRows);//回傳給.html
    }catch(PDOException $e){
        echo "錯誤";
    }
    
?>