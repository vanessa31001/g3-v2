<?php
try{
    require_once("../connectBooks.php");
    $sql = "select * from `member` where MEM_ID=:MEM_ID"; 
    $member = $pdo->prepare($sql); //先編譯好
    $member->bindValue(":MEM_ID", $_POST['MEM_ID']);
    $member->execute();//執行之
    if($member->rowCount()==0){ 
        //mail尚未被使用
        $sql2 = "insert member set MEM_ID=:MEM_ID,MEM_PSW=:MEM_PSW,MEM_NAME=:MEM_NAME,MEM_NICKNAME=:MEM_NICKNAME";
        $member2 = $pdo->prepare($sql2); //先編譯好
        $member2->bindValue(":MEM_ID", $_POST["MEM_ID"]);
        $member2->bindValue(":MEM_PSW", $_POST["MEM_PSW"]);
        $member2->bindValue(":MEM_NAME", $_POST["MEM_NAME"]);
        $member2->bindValue(":MEM_NICKNAME", $_POST["MEM_NICKNAME"]);
        $member2->execute();//執行之

        $sql3 = "select * from `member` where MEM_ID=:MEM_ID";
        $member3 = $pdo->prepare($sql3); //先編譯好
        $member3->bindValue(":MEM_ID", $_POST['MEM_ID']);
        $member3->execute();//執行之
        $memRow = $member3->fetch(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION["MEMNO"] = $memRow["MEMNO"];
        $_SESSION["MEM_ID"] = $_POST["MEM_ID"];
        $_SESSION["MEM_NAME"] = $_POST["MEM_NAME"];
        $_SESSION["MEM_NICKNAME"] = $_POST["MEM_NICKNAME"];

        $result = array("MEM_ID"=>$_POST["MEM_ID"], "MEM_NAME"=>$_POST["MEM_NAME"], "MEM_NICKNAME"=>$_POST["MEM_NICKNAME"]);
        $json = json_encode($result);
        echo $json;

    }else{ 
        //mail已被使用
        echo "{}";
    }
}catch(PDOException $e){
  $error = array("errorMsg"=>$e->getMessage());
  echo json_encode($error);//{"errorMsg":"......"}傳回錯誤訊息
  // echo $e->getMessage();
}
?>