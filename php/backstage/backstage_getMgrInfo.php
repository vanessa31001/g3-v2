

<?php
    session_start();
    if(isset($_SESSION["MGR_ID"]) === true){
        $result = array("MGR_ID"=>$_SESSION["MGR_ID"],"MGR_USER"=>$_SESSION["MGR_USER"]);
        
        echo json_encode($result);
    }else{
        echo "{}";
    }
?>
