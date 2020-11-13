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
            $sql = 
            "UPDATE campinggroups SET GROUP_STATUS= '3'
            WHERE GROUP_NO=:groupNo"; 
            $groups = $pdo->prepare($sql);
            $groups->bindValue(":groupNo", $data->GROUP_NO);
            $groups->execute();
            echo '刪除完成';
        }else{
            echo "{}";
        }
    }catch(PDOException $e){
        echo "錯誤";
    }

?>