
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
try{   
session_start();
require_once("../connectBooks.php");
$groupName= $_POST["groupName"];
$groupIntro= $_POST["groupIntro"];
$camName = $_POST["camName"];
$peopleLimit = $_POST["peopleLimit"];
$startdate = $_POST["startdate"];
$enddate = $_POST["enddate"];
$nowdate = $_POST["date"];



//上傳圖片
foreach($_FILES["upFile"]["error"] as $i => $error){
	switch($error){  //$error 形同 $_FILES["upFile"]["error"][$]
		case UPLOAD_ERR_OK :
			$dir = "../../pic/group";
			//檢查資料夾是否己存在
			if(file_exists($dir)==false){
				mkdir($dir);//make directory
			}

			$from = $_FILES["upFile"]["tmp_name"][$i]; //暫存區中的路徑和檔名
      $fileName = $_FILES["upFile"]["name"][$i];//原始檔案名稱
			$to = "{$dir}/{$fileName}";
      // if(copy($from, $to)){
      //   echo "上傳成功<br>";
      // }else{
      //   echo "上傳失敗<br>";
      // }
      $img[$i]= $fileName;
			break;
		case UPLOAD_ERR_INI_SIZE :
			echo "上傳的檔案太大, 不得超過", ini_get("upload_max_filesize"), "<br>";
			break;
		case UPLOAD_ERR_FORM_SIZE :
			echo "上傳的檔案太大, 不得超過", $_POST["MAX_FILE_SIZE"], "位元組<br>";
			break;
		case UPLOAD_ERR_PARTIAL :
			echo "上傳檔案不完整", "<br>";
			break;
		case UPLOAD_ERR_NO_FILE :
			echo "未選檔案", "<br>";
			break;		
		default:
			echo "系統暫時發生問題，請聯絡網站維護人員~~<br>"	;		
	}
}

if(isset($_SESSION["MEMNO"])){
  $member = $_SESSION["MEMNO"];

  //建團
    $sql = "INSERT INTO `campinggroups`(`GROUP_PEOPLE_SIGNUP`,`GROUP_MEMNO`, `GROUP_NAME`, `GROUP_INTRO`, `GROUP_CAM_NO`, `GROUP_PEOPLE_LIMIT`, `GROUP_START_DATE`, `GROUP_DEADLINE`, `GROUP_DEPART_DATE`, `GROUP_PIC1`, `GROUP_PIC2`, `GROUP_PIC3`) 
    VALUES (1,:GROUP_MEMNO, :GROUP_NAME,:GROUP_INTRO, :GROUP_CAM_NO, :GROUP_PEOPLE_LIMIT, :GROUP_START_DATE, :GROUP_DEADLINE, :GROUP_DEPART_DATE, :GROUP_PIC1, :GROUP_PIC2, :GROUP_PIC3)";
    $msg = $pdo->prepare($sql);
    $msg ->bindValue(":GROUP_MEMNO", $member);
    $msg ->bindValue(":GROUP_NAME", $groupName);
    $msg ->bindValue(":GROUP_INTRO", $groupIntro);
    $msg ->bindValue(":GROUP_CAM_NO", $camName);
    $msg ->bindValue(":GROUP_PEOPLE_LIMIT", $peopleLimit);
    $msg ->bindValue(":GROUP_START_DATE", $nowdate);
    $msg ->bindValue(":GROUP_DEADLINE", $enddate);
    $msg ->bindValue(":GROUP_DEPART_DATE", $startdate);
    $msg ->bindValue(":GROUP_PIC1", $img[0]);
    $msg ->bindValue(":GROUP_PIC2", $img[1]);
    $msg ->bindValue(":GROUP_PIC3", $img[2]);
    $msg->execute();

    $sql = "select GROUP_NO FROM campinggroups WHERE GROUP_MEMNO=:GROUP_MEMNO && GROUP_NAME=:GROUP_NAME && GROUP_INTRO=:GROUP_INTRO && GROUP_CAM_NO=:GROUP_CAM_NO ";
    $row = $pdo->prepare($sql);
    $row ->bindValue(":GROUP_MEMNO", $member);
    $row ->bindValue(":GROUP_NAME", $groupName);
    $row ->bindValue(":GROUP_INTRO", $groupIntro);
    $row ->bindValue(":GROUP_CAM_NO", $camName);
    $row->execute();
    $group = $row->fetch(PDO::FETCH_ASSOC);
    $groupNO = $group["GROUP_NO"];

}

//INSERT設備
if(isset($_POST["equSort"]) === true){
  foreach( $_POST["equSort"] as $i=>$data){
    echo $data."<br>";
    $sql = "INSERT INTO `g_use_equ`( `GROUP_NO`, `G_EQU_NO`) VALUES (:GROUP_NO, :G_EQU_NO)";
    $msgRows = $pdo->prepare($sql);
    $msgRows ->bindValue(":GROUP_NO", $groupNO);
    $msgRows ->bindValue(":G_EQU_NO",$data);
    $msgRows->execute();
	}	
}

// 幫自己參團
$sql ="INSERT INTO `group_detail`(`G_DEATIL_GROUP_NO`, `G_DETAIL_MEMNO`) VALUES ($groupNO,$member)";
$row = $pdo->query($sql);

}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}



// try{   
//     require_once("../connectBooks.php");
//     $member = $_SESSION["MEMNO"];
//     $sql = "INSERT INTO `campinggroups`(`GROUP_PEOPLE_SIGNUP`,`GROUP_MEMNO`, `GROUP_NAME`, `GROUP_INTRO`, `GROUP_CAM_NO`, `GROUP_PEOPLE_LIMIT`, `GROUP_START_DATE`, `GROUP_DEADLINE`, `GROUP_DEPART_DATE`, `GROUP_PIC1`, `GROUP_PIC2`, `GROUP_PIC3`) 
//     VALUES (1,:GROUP_MEMNO, :GROUP_NAME,:GROUP_INTRO, :GROUP_CAM_NO, :GROUP_PEOPLE_LIMIT, :GROUP_START_DATE, :GROUP_DEADLINE, :GROUP_DEPART_DATE, :GROUP_PIC1, :GROUP_PIC2, :GROUP_PIC1)";
//     $msg = $pdo->prepare($sql);
//     $msg ->bindValue(":GROUP_MEMNO", $member);
//     $msg ->bindValue(":GROUP_NAME", $_POST["GROUP_NAME"]);
//     $msg ->bindValue(":GROUP_INTRO", $_POST["GROUP_INTRO"]);
//     $msg ->bindValue(":GROUP_CAM_NO", $_POST["GROUP_CAM_NO"]);
//     $msg ->bindValue(":GROUP_PEOPLE_LIMIT", $_POST["GROUP_PEOPLE_LIMIT"]);
//     $msg ->bindValue(":GROUP_START_DATE", $_POST["GROUP_START_DATE"]);
//     $msg ->bindValue(":GROUP_DEADLINE", $_POST["GROUP_DEADLINE"]);
//     $msg ->bindValue(":GROUP_DEPART_DATE", $_POST["GROUP_DEPART_DATE"]);
//     $msg ->bindValue(":GROUP_PIC1", "G1.jpg");
//     $msg ->bindValue(":GROUP_PIC2", "G2.jpg");
//     $msg ->bindValue(":GROUP_PIC3", "G3.jpg");
//     $msg->execute();


//     $sql = "select GROUP_NO FROM campinggroups WHERE GROUP_MEMNO=:GROUP_MEMNO && GROUP_NAME=:GROUP_NAME && GROUP_INTRO=:GROUP_INTRO";
//     $row = $pdo->prepare($sql);
//     $row ->bindValue(":GROUP_MEMNO", $_SESSION["MEMNO"]);
//     $row ->bindValue(":GROUP_NAME", $_POST["GROUP_NAME"]);
//     $row ->bindValue(":GROUP_INTRO", $_POST["GROUP_INTRO"]);
//     $row->execute();
//     $group = $row->fetch(PDO::FETCH_ASSOC);
//     $result = $group["GROUP_NO"];

//     $sql ="INSERT INTO `group_detail`(`G_DEATIL_GROUP_NO`, `G_DETAIL_MEMNO`) VALUES ($result,$member)";
//     $row = $pdo->query($sql);

//   	echo json_encode($result);
    
// }catch(PDOException $e){
// 	$error = array("errorMsg"=>$e->getMessage());
//   	echo json_encode($error);//{"errorMsg":"......."}
// }
?>
<script>
  function doFirst(){
    location.href="../../group.html";
  }
  window.addEventListener('load',doFirst);
</script>
</body>
</html>