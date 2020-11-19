<?php
session_start();
try{
  require_once("../connectBooks.php");
  
  $people = $_GET["people"];
  $date = $_GET["date"];
  switch($_GET["loca"]){
    case "1":
      $cond1 = "c.CAM_AREA='北部'";
      break; 
    case "2":
      $cond1 = "c.CAM_AREA='中部'";
      break; 
    case "3":
      $cond1 = "c.CAM_AREA='南區'";
      break; 
    case "4":
      $cond1 = "c.CAM_AREA='東區'";
      break; 
    default:
      $cond1 = 1;
  }

  switch($people){
    case "0":
      $cond2 = "(a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP) between 1 and 10";
      break; 
    case "1":
      $cond2 = "(a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP) between 11 and 20";
      break;
    case "2":
      $cond2 = "(a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP) > 20";
      break;
    case "0,1":
      $cond2= "(a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP) between 1 and 20";
      break; 
    case "0,2":
      $cond2 = "((a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP) > 20 OR (a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP) between 1 and 10)";
      break; 
    case "1,2":
      $cond2 = "(a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP) > 11";
      break; 
    default:
      $cond2 = 1;
  }

  switch($date){
    case "0":
      $cond3 = "date(a.GROUP_DEADLINE) <= date(adddate(now(),interval 7 day))";
      break; 
    case "1":
      $cond3 = "date(a.GROUP_DEADLINE) <= date(adddate(now(),interval 1 Month))";
      break;
    case "2":
      $cond3 = "date(a.GROUP_DEADLINE) > date(adddate(now(),interval 1 Month))";
      break;
    case "0,1":
      $cond3 = "date(a.GROUP_DEADLINE) <= date(adddate(now(),interval 1 Month))";
      break; 
    case "0,2":
      $cond3 = "(date(a.GROUP_DEADLINE) <= date(adddate(now(),interval 7 day)) OR date(a.GROUP_DEADLINE) > date(adddate(now(),interval 1 Month))";
      break;  
    default:
      $cond3 = 1;
  }

   if(isset($_SESSION["MEMNO"])){
    $member = $_SESSION["MEMNO"];
    $sql = "SELECT a.GROUP_NO `團編號`, a.GROUP_MEMNO `會員編號`, b.MEM_NICKNAME `會員名`,b.MEM_IMG `會員照片`, a.GROUP_PIC1 `圖片1`, a.GROUP_NAME `團名`, a.GROUP_INTRO `揪團介紹`, c.CAM_NO  `營區編號`, c.CAM_COUNTY `縣市` , c.CAM_NAME  `營地`,
    a.GROUP_PEOPLE_LIMIT  `人數上限`, a.GROUP_PEOPLE_SIGNUP  `參團人數`, (a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP)  `剩餘名額`, a.GROUP_START_DATE  `開團日`,
    date(a.GROUP_DEPART_DATE)  `出發日`, date(a.GROUP_DEADLINE)  `回程日`, a.GROUP_STATUS  `團目前狀態`, a.GROUP_REASON , IFNULL(收藏數,0) `收藏數`, REGROUP_NO `檢舉揪團編號`
    FROM campinggroups a JOIN member b  on a.GROUP_MEMNO = b.MEMNO
    JOIN camping c  on a.GROUP_CAM_NO = c.CAM_NO
    left join (select CAMPCO_CAMNO , count(*) `收藏數` from campcolloection group by CAMPCO_CAMNO) d on c.cam_no=d.campco_camno             
    left JOIN (select * from REPORTGROUP a join MEMBER b on b.MEMNO = a.REGROUP_MEMNO where REGROUP_MEMNO = $member) e on e.REGROUP_GROUP_NO = a.GROUP_NO
    WHERE a.GROUP_STATUS = 0 AND $cond1 AND $cond2 AND $cond3
    order by GROUP_START_DATE desc;";
  }else{
    $sql = "SELECT a.GROUP_NO `團編號`, a.GROUP_MEMNO `會員編號`, b.MEM_NICKNAME `會員名`,b.MEM_IMG `會員照片`, a.GROUP_PIC1 `圖片1`, a.GROUP_NAME `團名`, a.GROUP_INTRO `揪團介紹`, c.CAM_NO  `營區編號`, c.CAM_COUNTY `縣市` , c.CAM_NAME  `營地`,
    a.GROUP_PEOPLE_LIMIT  `人數上限`, a.GROUP_PEOPLE_SIGNUP  `參團人數`, (a.GROUP_PEOPLE_LIMIT - a.GROUP_PEOPLE_SIGNUP)  `剩餘名額`, a.GROUP_START_DATE  `開團日`,
    date(a.GROUP_DEPART_DATE)  `出發日`, date(a.GROUP_DEADLINE)  `回程日`, a.GROUP_STATUS  `團目前狀態`, a.GROUP_REASON , IFNULL(收藏數,0) `收藏數`
    FROM campinggroups a JOIN member b  on a.GROUP_MEMNO = b.MEMNO
    JOIN camping c  on a.GROUP_CAM_NO = c.CAM_NO
    left join (select CAMPCO_CAMNO , count(*) `收藏數` from campcolloection group by CAMPCO_CAMNO) d on c.cam_no=d.campco_camno              
    WHERE a.GROUP_STATUS = 0 AND $cond1 AND $cond2 AND $cond3
    order by GROUP_START_DATE desc;";
 
  }
  $groupRows = $pdo->query($sql);
  $groupRow = $groupRows->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($groupRow);

  
     
    
}catch(PDOException $e){
	$error = array("errorMsg"=>$e->getMessage());
  	echo json_encode($error);//{"errorMsg":"......."}
}
?>