<?
try{
    require_once("../connectBooks.php");
    $sql = "select * from `camping`";
    $camping = $pdo->query($sql);
    $campRow = $camping->fetch(PDO::FETCH_ASSOC);
    $camping->execute();
    // print_r($campRow);

    $result = array("CAM_NO"=>$campRow["CAM_NO"], 
                    "CAM_NAME"=>$campRow["CAM_NAME"], 
                    "CAM_PIC1"=>$campRow["CAM_PIC1"],
                    "CAM_PIC2"=>$campRow["CAM_PIC2"],
                    "CAM_PIC3"=>$campRow["CAM_PIC3"],
                    "CAM_PIC4"=>$campRow["CAM_PIC4"],
                    "CAM_INTRODUCTION"=>$campRow["CAM_INTRODUCTION"],
                    "CAM_ALTITUDE"=>$campRow["CAM_ALTITUDE"],
                    "CAM_BATHROOM"=>$campRow["CAM_BATHROOM"], 
                    "CAM_PET"=>$campRow["CAM_PET"], 
                    "CAM_FACILITY"=>$campRow["CAM_FACILITY"], 
                    "CAM_ADDRESS"=>$campRow["CAM_ADDRESS"], 
                        "CAM_PRECAUTIONS"=>$campRow["CAM_PRECAUTIONS"]);
  	$json = json_encode($result);

    //送出登入者的相關資料
    echo $json;


}catch(PDOException $e){
    echo "錯誤訊息:", $e->getLine(),"<br>";
    echo "錯誤訊息:", $e->getMessage(),"<br>";
    // echo "系統發生不正常狀況,請通知維護人員~";
}
?>