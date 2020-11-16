<?php
    try{
        session_start();
        if(isset($_SESSION["MEM_ID"]) === true){
            header("Access-Control-Allow-Origin: *");
            require_once("../connectBooks.php");
            $sql = 
            "SELECT MEMNO,MEM_ID,MEM_NAME,MEM_NICKNAME,MEM_IMG,MEM_STATUS FROM member WHERE MEMNO = :memNo";
            $equipment = $pdo->prepare($sql);
            $equipment->bindValue(':memNo', $_SESSION["MEMNO"]);
            $equipment->execute();
            $equipments = $equipment->fetch(PDO::FETCH_ASSOC);
            echo json_encode($equipments);
        }else{
            echo "{}";
        }
    }catch(PDOException $e){
        echo "錯誤";
    }

?>