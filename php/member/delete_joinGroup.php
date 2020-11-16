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
            $sql = "DELETE FROM `group_detail` WHERE G_DEATIL_NO=:deatil_no"; 
            $groups = $pdo->prepare($sql);
            $groups->bindValue(":deatil_no", $data->G_DEATIL_NO);
            $groups->execute();

            // 修改揪團以參加人數
            $nowGroup = (int)$data->GROUP_PEOPLE_SIGNUP;
            $joinGroup = (int)$data->G_DATEIL_PARTNUM;
            $realPeople = $nowGroup - $joinGroup;
            $sql1 = 
            "UPDATE campinggroups SET GROUP_PEOPLE_SIGNUP = :people
            WHERE GROUP_NO=:groupNo"; 
            $groups_1 = $pdo->prepare($sql1);
            $groups_1->bindValue(":people", $realPeople);
            $groups_1->bindValue(":groupNo", $data->G_DEATIL_GROUP_NO);
            $groups_1->execute();
            echo '修改完成';
        }else{
            echo '{}';
        }
    }catch(PDOException $e){
        echo "錯誤";
    }
?>