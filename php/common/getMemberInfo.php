<?php
    session_start();
    if(isset($_SESSION["MEMNO"]) === true){
        $result = array("MEMNO"=>$_SESSION["MEMNO"],"MEM_ID"=>$_SESSION["MEM_ID"],"MEM_NAME"=>$_SESSION["MEM_NAME"],"MEM_NICKNAME"=>$_SESSION["MEM_NICKNAME"]);
        echo json_encode($result);
    }else{
        echo "{}";
    }
?>