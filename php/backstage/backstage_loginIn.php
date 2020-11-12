<?
try{
    session_start();
    require_once("../connectBooks.php");
    
    $sql = "SELECT * 
    FROM `manager` 
    WHERE MGR_ID=:adminId 
    and MGR_PSW=:adminPsw"; 
    $manager = $pdo->prepare($sql);
    $manager->bindValue(":adminId", $_POST["MGR_ID"]); 
	$manager->bindValue(":adminPsw", $_POST["MGR_PSW"]);
    $manager->execute(); 
    $managerRow = $manager->fetch(PDO::FETCH_ASSOC);


    if($manager->rowCount()==0){
        echo "{}";
    }else{
        $_SESSION["MGR_ID"] = $managerRow["MGR_ID"];
        $_SESSION["MGR_USER"] = $managerRow["MGR_USER"];
        $result=array("MGR_ID"=>$managerRow["MGR_ID"],
                    "MGR_USER"=>$managerRow["MGR_USER"]
        );
        $json = json_encode($result,true);

        echo $json;
    }

}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
