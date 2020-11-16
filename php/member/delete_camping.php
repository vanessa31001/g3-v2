<?php
    try{
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        // var_dump($data);
        // die();
        session_start();
        if(isset($_SESSION["MEMNO"]) === true){
            header("Access-Control-Allow-Origin: *");
            require_once("../connectBooks.php");
            // // 刪除揪團報名明細
            $sql = "delete from `campcolloection` where CAMPCO_NO=:campco"; 
            $groups = $pdo->prepare($sql);
            $groups->bindValue(":campco", $data->CAMPCO_NO);
            $groups->execute();
            echo '刪除完成';
        }else{
            echo '{}';
        }
    }catch(PDOException $e){
        echo "錯誤";
    }
?>