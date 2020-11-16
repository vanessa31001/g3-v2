<?php
    try{
        session_start();
        if(isset($_SESSION["MEM_ID"]) === true){
            header("Access-Control-Allow-Origin: *");
            require_once("../connectBooks.php");
            $sql = 
            "SELECT * FROM equipment where equ_swap_ano is not null and EQU_MEMNO=:memId and EQU_SWAPATATNO='1' order by equ_no";
            $equipment = $pdo->prepare($sql);
            $equipment->bindValue(':memId', $_SESSION["MEMNO"]);
            $equipment->execute();
            $equipments = $equipment->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($equipments);
        }else{
            echo "{}";
        }
    }catch(PDOException $e){
        echo "錯誤";
    }

?>