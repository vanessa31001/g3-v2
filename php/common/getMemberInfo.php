<?php
    session_start();
    if(isset($_SESSION["MEM_ID"]) === true){
        $result = array("MEM_ID"=>$_SESSION["MEM_ID"],"MEM_NAME"=>$_SESSION["MEM_NAME"],"MEM_NICKNAME"=>$_SESSION["MEM_NICKNAME"]);
        echo json_encode($result);
    }else{
        echo "{}";
    }
?>