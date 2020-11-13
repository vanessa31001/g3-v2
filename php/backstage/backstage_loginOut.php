<?php
    //移除資訊
    session_start();
    unset($_SESSION["MGR_ID"]);
    unset($_SESSION["MGR_USER"]);


    // session_destroy();整個檔案砍掉


?>