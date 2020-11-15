<?php
    try{
        session_start();
        if(isset($_SESSION["MEM_ID"]) === true){
            header("Access-Control-Allow-Origin: *");
            require_once("../connectBooks.php");
            $sql = 
            "SELECT EQU_NO,EQU_NAME,EQU_PIC1,EQU_SWAPATATNO FROM `equipment` where EQU_MEMNO=:memId";
            $equipment = $pdo->prepare($sql);
            $equipment->bindValue(':memId', $_SESSION["MEMNO"]);
            $equipment->execute();
            $equipments = $equipment->fetchAll(PDO::FETCH_ASSOC);
            $arr =[];
            foreach($equipments as $key => $val){
                $groupTime = strtotime($equipments[$key]['EQU_SWAPATATNO']);
                if($equipments[$key]['EQU_SWAPATATNO']==0){
                    $val['EQU_SWAPATATNO'] = '進行中';
                }else if($equipments[$key]['EQU_SWAPATATNO']===1){
                    $val['EQU_SWAPATATNO'] = '已被交換';
                }else{
                    $val['EQU_SWAPATATNO'] = '已下架';
                }
                array_push($arr,$val);
            }
            echo json_encode($arr);
        }else{
            echo "{}";
        }
    }catch(PDOException $e){
        echo "錯誤";
    }

?>