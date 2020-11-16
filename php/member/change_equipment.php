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
            // // 下架設備
            $sql = "UPDATE `equipment` SET EQU_SWAPATATNO = '2' WHERE EQU_NO=:equ_no"; 
            $groups = $pdo->prepare($sql);
            $groups->bindValue(":equ_no", $data->EQU_NO);
            $groups->execute();
            echo '修改完成';
        }else{
            echo '{}';
        }
    }catch(PDOException $e){
        echo "錯誤";
    }
?>