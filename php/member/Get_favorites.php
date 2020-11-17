<?php
    try{
        session_start();
        if(isset($_SESSION["MEM_ID"]) === true){
            header("Access-Control-Allow-Origin: *");
            require_once("../connectBooks.php");
            $sql = 
            "SELECT CAM_NO,CAMPCO_NO,CAM_NAME,CAM_PIC1 FROM campcolloection c1 join camping c2 on c1.CAMPCO_CAMNO=c2.CAM_NO where CAMPCO_MEMNO=:memId";
            $camping = $pdo->prepare($sql);
            $camping->bindValue(':memId', $_SESSION["MEMNO"]);
            $camping->execute();
            $campings = $camping->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($campings);
        }else{
            echo "{}";
        }
    }catch(PDOException $e){
        echo "錯誤";
    }

?>