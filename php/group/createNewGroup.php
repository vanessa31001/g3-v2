<?php
$errMsg = "";
try {
	require_once("../connectBooks.php");
	$pdo->beginTransaction();
	//.......確定是否上傳成功
	if( $_FILES["upFile"]["error"] == UPLOAD_ERR_OK){
		
		// $sql = "INSERT INTO `products` (`psn`, `pname`, `price`, `author`, `pages`, `image`) values(null, :pname, :price, :author, :pages, '' )";
		// $products = $pdo->prepare( $sql );
		// $products -> bindValue(":pname", $_POST["pname"]);
		// $products -> bindValue(":price", $_POST["price"]);
		// $products -> bindValue(":author", $_POST["author"]);
		// $products -> bindValue(":pages", $_POST["pages"]);
		// $products -> execute();

		// //取得自動創號的key值
		// $psn = $pdo->lastInsertId();

		// //先檢查images資料夾存不存在
		// if( file_exists("images") === false){
		// 	mkdir("images");
		// }
		// //將檔案copy到要放的路徑
		// $fileInfoArr = pathinfo($_FILES["upFile"]["name"]); //先取得原始檔案名稱的副檔名
		// $fileName = "{$psn}.{$fileInfoArr["extension"]}";  //8.gif

		// $from = $_FILES["upFile"]["tmp_name"];
		// $to = "images/$fileName";
		// if(copy( $from, $to)===true){
		// 	//將檔案名稱寫回資料庫
		// 	$sql = "update products set image = :image where psn = $psn";
		// 	$products = $pdo->prepare($sql);
		// 	$products -> bindValue(":image", $fileName);
		// 	$products -> execute();
		// 	echo "新增成功~";
		// 	$pdo->commit();			
		// }else{
		// 	$pdo->rollBack();
		// }

	}else{
		echo "錯誤代碼 : {$_FILES["upFile"]["error"]} <br>";
		echo "新增失敗<br>";

	}
} catch (PDOException $e) {
	$pdo->rollBack();
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
}
echo $errMsg;

?>    