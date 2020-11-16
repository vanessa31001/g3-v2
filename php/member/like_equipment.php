<?php
    try{
        session_start();
        if(isset($_SESSION["MEM_ID"]) === true){
            header("Access-Control-Allow-Origin: *");
            require_once("../connectBooks.php");
            $sql = 
            "SELECT eq.EQU_NO,EQU_PIC1,equ_name,eq.EQU_SWAPATATNO FROM equcollection ec join equipment eq on ec.EQUCOL_EQUNO=eq.EQU_NO where ec.EQUCOL_MEMNO=:memId";
            $likeEqu = $pdo->prepare($sql);
            $likeEqu->bindValue(':memId', $_SESSION["MEMNO"]);
            $likeEqu->execute();
            $likeEqus = $likeEqu->fetchAll(PDO::FETCH_ASSOC);
            
            $arr =[];
            foreach($likeEqus as $key => $val){
                if($likeEqus[$key]['EQU_SWAPATATNO']==0){
                    $val['status'] = '尚可交換';
                }else{
                    $val['status'] = '已下架';
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