<?php
try{
    session_start();
    require_once("../connectBooks.php");
    
    // var_dump($_POST["CAM_NO"]);
    // die;
    $sql1 = "SELECT *
    FROM member m
    join campcolloection c
    ON (m.MEMNO=c.CAMPCO_MEMNO)
    WHERE m.MEMNO = :CAMPCO_MEMNO AND c.CAMPCO_CAMNO = :CAMPCO_CAMNO ";

    $campcolloection = $pdo->prepare($sql1);
    $campcolloection->bindValue(":CAMPCO_MEMNO", $_SESSION["MEMNO"]);
    $campcolloection->bindValue(":CAMPCO_CAMNO", $_POST["CAM_NO"]);
    $campcolloection->execute();

    if($campcolloection->rowCount() == 0 ){
        $sql = "INSERT INTO campcolloection (CAMPCO_MEMNO,CAMPCO_CAMNO) VALUES (:CAMPCO_MEMNO,:CAMPCO_CAMNO)"; 
        $campcolloection = $pdo->prepare($sql); //先編譯好

        $campcolloection->bindValue(":CAMPCO_MEMNO", $_SESSION["MEMNO"]);
        $campcolloection->bindValue(":CAMPCO_CAMNO", $_POST["CAM_NO"]);
        $campcolloection->execute();//執行之
        echo '有收藏';
    }else{
        $sql = "DELETE FROM `campcolloection` WHERE (CAMPCO_MEMNO=:CAMPCO_MEMNO) AND (CAMPCO_CAMNO=:CAMPCO_CAMNO)"; 
        $campcolloection = $pdo->prepare($sql); //先編譯好

        $campcolloection->bindValue(":CAMPCO_MEMNO", $_SESSION["MEMNO"]);
        $campcolloection->bindValue(":CAMPCO_CAMNO", $_POST["CAM_NO"]);
        $campcolloection->execute();//執行之
        echo '沒收藏';
    }

   




    }catch(PDOException $e){
            echo "錯誤訊息:", $e->getLine(),"<br>";
            echo "錯誤訊息:", $e->getMessage(),"<br>";
    }
?>