<?
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $sql = "SELECT * FROM manager "; 
    $manager = $pdo->prepare($sql);
    $manager->execute();

    $managers = $manager->fetchAll(PDO::FETCH_ASSOC);

    
    echo json_encode($managers);

}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
