<?php
try{
    session_start();
    require_once("../connectBooks.php");
    $sql = "SELECT *
    FROM member m
    join campcolloection c
    ON (m.MEMNO=c.CAMPCO_MEMNO)
    WHERE m.MEMNO = :CAMPCO_MEMNO AND c.CAMPCO_CAMNO = :CAMPCO_CAMNO "; 

    
    $campcolloection = $pdo->prepare($sql);
    $campcolloection->bindValue(":CAMPCO_MEMNO", $_SESSION["MEMNO"]);
    $campcolloection->bindValue(":CAMPCO_CAMNO", $_POST["CAM_NO"]);
    $campcolloection->execute();

    if($campcolloection->rowCount() == 0 ){
        echo '沒收藏';
    }else{
        echo '有收藏';
    }
    // var_dump($campcolloection);
    // die;
    // $campcolloectionRow = $campcolloection->fetch(PDO::FETCH_ASSOC);


}catch(PDOException $e){
        echo "錯誤訊息:", $e->getLine(),"<br>";
        echo "錯誤訊息:", $e->getMessage(),"<br>";
}


?>