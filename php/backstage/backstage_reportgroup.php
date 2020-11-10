<?
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $sql = "SELECT re.REGROUP_NO, c.GROUP_NAME, m.MEM_NAME, re.REGROUP_STATUS, re.REGROUP_RESON, c.GROUP_STATUS
    FROM reportgroup re JOIN member m ON (re.REGROUP_MEMNO = m.MEMNO)
                        JOIN campinggroups c ON (c.GROUP_NO = re.REGROUP_GROUP_NO)"; 
    $reportgroup = $pdo->prepare($sql);
    $reportgroup->execute();

    $reportgroups = $reportgroup->fetchAll(PDO::FETCH_ASSOC);

    
    echo json_encode($reportgroups);

}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
