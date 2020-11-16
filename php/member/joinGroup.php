<?php
    try{
        session_start();
        if(isset($_SESSION["MEMNO"]) === true){
            header("Access-Control-Allow-Origin: *");
            require_once("../connectBooks.php");
            $sql = 
            "SELECT G_DEATIL_NO,GROUP_PIC1,GROUP_NAME,GROUP_DEPART_DATE,CAM_NAME,date_format(group_depart_date,'%Y-%m-%d') 'group_Date',GROUP_INTRO,GROUP_PEOPLE_SIGNUP,G_DATEIL_PARTNUM,G_DEATIL_GROUP_NO
            FROM group_detail d join campinggroups c on C.GROUP_NO = D.G_DEATIL_GROUP_NO
                                JOIN camping cam ON c.GROUP_CAM_NO = cam.CAM_NO
            where G_DETAIL_MEMNO=:memId and GROUP_STATUS = '0'"; 
            $member = $pdo->prepare($sql);
            $member->bindValue(':memId', $_SESSION["MEMNO"]);
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