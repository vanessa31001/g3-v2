<?php
    try{
        session_start();
        if(isset($_SESSION["MEM_ID"]) === true){
            header("Access-Control-Allow-Origin: *");
            require_once("../connectBooks.php");
            $sql = 
            "SELECT GROUP_NAME,GROUP_INTRO,CAM_NAME,date_format(group_depart_date,'%Y-%m-%d') 'group_Date',GROUP_PEOPLE_SIGNUP,GROUP_PIC1,MEM_NAME 
            FROM campinggroups c join member m on c.GROUP_MEMNO=m.MEMNO
                                 join camping on c.GROUP_CAM_NO=camping.CAM_NO
            where m.MEM_ID=:memEmail"; 
            $member = $pdo->prepare($sql);
            $member->bindValue(':memEmail', $_SESSION["MEM_ID"]);
            $member->execute();
            $members = $member->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($members);
        }else{
            echo "{}";
        }
    }catch(PDOException $e){
        echo "錯誤";
    }

?>