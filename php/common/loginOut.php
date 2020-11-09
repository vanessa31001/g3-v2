<?
    //移除資訊
    session_start();
    unset($_SESSION["MEM_ID"]);
    unset($_SESSION["MEM_NAME"]);
    unset($_SESSION["MEM_NICKNAME"]);

    // session_destroy();整個檔案砍掉


?>