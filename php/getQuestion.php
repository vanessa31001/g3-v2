<?php
try{
    require_once("connectBooks.php");
    //QUE_NO
// 
// 
// 
// 
// 
// QUE_STATUS
// ["Q5:哪些是夜間照明工具?", "菜籃", "反光板", "旗子"]

    $sql = "select QUE_TITLE, QUE_OPT1, QUE_OPT2, QUE_OPT3, QUE_ANS from `question` 
     where QUE_STATUS=0 ORDER BY RAND() limit 0, 5";
    $question = $pdo->query($sql);
    $questionRows = $question->fetchAll(PDO::FETCH_NUM);
    echo json_encode($questionRows);
    // print_r($mem);

    // $camping->bindValue(":CAM_NAME", $_POST['CAM_NAME']);
}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>