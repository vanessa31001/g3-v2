<?php
    try{
        session_start();
        require_once("../connectBooks.php");
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        if(isset($_SESSION["MEMNO"]) === true){
            if($data->MEM_PSW == ''){
                $sql = 
                "UPDATE member SET MEM_NAME=:memName,MEM_NICKNAME=:memNick WHERE memno=:memNo";
                $equipment = $pdo->prepare($sql);
                $equipment->bindValue(':memName', $data->MEM_NAME);
                $equipment->bindValue(':memNick', $data->MEM_NICKNAME);
                $equipment->bindValue(':memNo', $_SESSION["MEMNO"]);
                $equipment->execute();
                $equipments = $equipment->fetch(PDO::FETCH_ASSOC);
                echo '修改完成';
            }else{
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
            }
        }else{
            echo '請登入';
        }
        
    }catch(PDOException $e){
        echo "錯誤";
    }

?>