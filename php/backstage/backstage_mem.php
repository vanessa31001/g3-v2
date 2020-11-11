
<?
try{
    header("Access-Control-Allow-Origin: *");
    require_once("../connectBooks.php");
    $sql = "SELECT * FROM member "; 
    $member = $pdo->prepare($sql);
    $member->execute();

    $members = $member->fetchAll(PDO::FETCH_ASSOC);

    $arr=[];

    foreach($members as $key => $val){
        if($val['MEM_STATUS']==0){
            $val['MEM_STATUS']='正常';
        }else{
            $val['MEM_STATUS']='停權';
        }

        
        array_push($arr,$val);
    }
    echo json_encode($arr);

}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>
