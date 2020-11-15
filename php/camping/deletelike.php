<?php
try{
    session_start();
    require_once("../connectBooks.php");
    $sql = "DELETE FROM `campcolloection` WHERE (CAMPCO_MEMNO=:CAMPCO_MEMNO) AND (CAMPCO_CAMNO=:CAMPCO_CAMNO)"; 

        // var_dump($_SESSION["MEMNO"]);
        // die;
        $campcolloection = $pdo->prepare($sql); //先編譯好

        $campcolloection->bindValue(":CAMPCO_MEMNO", $_SESSION["MEMNO"]);
        $campcolloection->bindValue(":CAMPCO_CAMNO", $_POST["CAM_NO"]);
        $campcolloection->execute();//執行之


    }catch(PDOException $e){
            echo "錯誤訊息:", $e->getLine(),"<br>";
            echo "錯誤訊息:", $e->getMessage(),"<br>";
    }
?>