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
            $sql = "DELETE FROM equcollection where EQUCOL_MEMNO=:memId AND EQUCOL_EQUNO = :equId"; 
            $groups = $pdo->prepare($sql);
            $groups->bindValue(":memId", $_SESSION['MEMNO']);
            $groups->bindValue(":equId", $data->EQU_NO);
            $groups->execute();
            echo '刪除完成';
        }else{
            echo '{}';
        }
    }catch(PDOException $e){
        echo "錯誤";
    }
?>