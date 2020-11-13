<?php
try{
    session_start();
    require_once("../connectBooks.php");
    $sql = "SELECT *
    FROM member m
    join campcolloection c
    ON (m.MEMNO=c.CAMPCO_MEMNO)
    WHERE m.MEMNO = :CAMPCO_MEMNO"; 

    

    // var_dump( $_SESSION["MEMNO"]);
    // die;
    $campcolloection = $pdo->prepare($sql);
    // $campcolloection->bindValue(":CAMPCO_MEMNO", $_SESSION["MEMNO"]);
    $campcolloection->bindValue(":CAMPCO_MEMNO", $_SESSION["MEMNO"]);
    $campcolloection->execute();
    // $arr ='';
    if($campcolloection->rowCount() == 0 ){
        // $arr = './pic/icon/like.png';//灰色愛心
        echo '沒收藏';
    }else{
        // $arr = './pic/icon/like_check.png';//紅色愛心
        echo '有收藏';
    }
    
    $campcolloectionRow = $campcolloection->fetch(PDO::FETCH_ASSOC);
    // array_push($campcolloectionRow,$arr);
    // var_dump($campcolloectionRow);
    // die;
    // echo json_encode ($campcolloectionRow);

}catch(PDOException $e){
        echo "錯誤訊息:", $e->getLine(),"<br>";
        echo "錯誤訊息:", $e->getMessage(),"<br>";
}


?>