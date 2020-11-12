<?php
    try{
        session_start();
        if(isset($_SESSION["MEM_ID"]) === true){
            header("Access-Control-Allow-Origin: *");
            require_once("../connectBooks.php");
            $sql = 
            "SELECT GROUP_NO,GROUP_NAME,GROUP_INTRO,CAM_NAME,date_format(group_depart_date,'%Y-%m-%d') 'group_Date',GROUP_PEOPLE_SIGNUP,GROUP_PIC1,MEM_NAME 
            FROM campinggroups c join member m on c.GROUP_MEMNO=m.MEMNO
                                 join camping on c.GROUP_CAM_NO=camping.CAM_NO
            where m.MEM_ID=:memEmail and GROUP_STATUS = '0'"; 
            $member = $pdo->prepare($sql);
            $member->bindValue(':memEmail', $_SESSION["MEM_ID"]);
            $member->execute();
            $members = $member->fetchAll(PDO::FETCH_ASSOC);
            $arr =[];
            foreach($members as $key => $val){
                $nowTime = time();
                $groupTime = strtotime($members[$key]['group_Date']);
                if($nowTime < $groupTime){
                    $val['status'] = '0';
                }else{
                    $val['status'] = '1';
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