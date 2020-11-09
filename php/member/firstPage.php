<?php
    session_start();
    if(isset($_SESSION["MEM_ID"]) === true){
        require_once("../connectBooks.php");
        $sql = "select * from member";
        $member = $pdo->query($sql);
        $memRow = $member->fetchALL(PDO::FETCH_ASSOC);
        echo json_encode($member);
    }else{
        echo "{}";
    }
?>