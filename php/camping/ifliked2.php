<?php
try{
    session_start();
    require_once("../connectBooks.php");
    $sql = "SELECT *
    FROM campcolloection
    WHERE CAMPCO_CAMNO = :CAMPCO_CAMNO AND  CAMPCO_MEMNO =:CAMPCO_MEMNO"; 

  

    $campcolloection = $pdo->prepare($sql);
    $campcolloection->bindValue(":CAMPCO_MEMNO", $_SESSION["MEMNO"]);
    $campcolloection->bindValue(":CAMPCO_CAMNO", $_POST["CAM_NO"]);
    $campcolloection->execute();


    // $campcolloectionRow = $campcolloection->fetch(PDO::FETCH_ASSOC);


    if($campcolloection->rowConut()== 0){
        echo '沒收藏';
    }else{
        echo '有收藏';
    }
    
    // echo json_encode($campcolloectionRow);

    // var_dump($campcolloectionRow);
    //  die;


}catch(PDOException $e){
        echo "錯誤訊息:", $e->getLine(),"<br>";
        echo "錯誤訊息:", $e->getMessage(),"<br>";
}


?>