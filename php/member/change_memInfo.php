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
            "UPDATE member SET MEM_PSW= :memPsw,MEM_NAME=:memName,MEM_NICKNAME=:memNick WHERE memno=:memNo";
            $equipment = $pdo->prepare($sql);
            $equipment->bindValue(':memPsw', $data->MEM_PSW);
            $equipment->bindValue(':memName', $data->MEM_NAME);
            $equipment->bindValue(':memNick', $data->MEM_NICKNAME);
            $equipment->bindValue(':memNo', $_SESSION["MEMNO"]);
            $equipment->execute();
            $equipments = $equipment->fetch(PDO::FETCH_ASSOC);
            echo '修改完成';
        }else{
            echo "{}";
        }
    }catch(PDOException $e){
        echo "錯誤";
    }

?>