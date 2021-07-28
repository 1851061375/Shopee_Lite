<?php

use function PHPSTORM_META\type;

require_once("dbhelp.php");

$id = $picture = $name = $price = $origin = $type = $picture_tmp= '';

$title = "Thêm sản phẩm";
if (!empty($_GET)) {
	$id = isset($_GET["id"]) ? $_GET["id"] : "";
	$title = "Sửa sản phẩm";
    $query = "select* from product where id = ".$id;
    $productList = executeResult($query);

    if ($productList != null && count($productList) > 0) {
		global $type;
		$product = $productList[0];
		$picture_tmp = $product["PICTURE"];
        $name = $product["NAME"];
        $price = $product["PRICE"];
		$origin = $product["ORIGIN"]; 
		$type = $product["TYPE"]; 
		//print $type; exit();
    }
	else $id = '';

}


if (isset($_POST["submit"])) {
	
	$id = isset($_POST["id"]) ? $_POST["id"] : "";
	if ($_FILES["picture"]["name"] != null) {
		$picture = $_FILES["picture"]["name"];
	} else {
		$picture = $picture_tmp;
	}
	$name = isset($_POST["name"]) ? $_POST["name"] : "";
	$price = isset($_POST["price"]) ? $_POST["price"] : "";
	$origin = isset($_POST["origin"]) ? $_POST["origin"] : "";
	$type = isset($_POST["type"]) ? $_POST["type"] : "";
	//print $type; exit;
	
	if ($id != '') {
		//update
		$query = 'update product set picture = "'.$picture.'", name = "'.$name.'", price = "'.$price.'",
		 		  origin = "'.$origin.'", type = "'.$type.'" where id ='.$id;
	} 
	else {
		//insert
		$query = 'insert into product(picture, name, price, origin,type) values("'.$picture.'", "'.$name.'",
				 "'.$price.'", "'.$origin.'","'.$type.'")';
	}
	execute($query);
	header("Location: admin.php");
	die();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center"><?php echo $title; ?></h2>
			</div>
			<div class="panel-body">
				<form method="post" action="" enctype="multipart/form-data">
					<div style="display: none;" class="form-group">
					  <label for="id" >ID:</label>
					  <input class="form-control" type="text" name="id" value="<?=$id?>">
					</div>
                    <div class="form-group">
					  <label for="picture" >Hình ảnh:</label>
<?php
if($picture_tmp) {
	echo '<lable for="picture" >'.$picture_tmp.'</lable>
	<input id="picture" class="form-control" type="file" name="picture">';
}
else {
	echo '<input id="picture" class="form-control" type="file" name="picture">';
}

?>
					</div>
					<div class="form-group">
					  <label for="name" >Tên sản phẩm:</label>
					  <input class="form-control" type="text" name="name" value="<?=$name?>">
                    </div>
                    <div class="form-group">
					  <label for="picture" >Giá:</label>
					  <input class="form-control" type="text" name="price" value="<?=$price?>">
                    </div>
                    <div class="form-group">
					  <label for="origin">Xuất xứ:</label>
					  <input class="form-control" type="text" name="origin" value="<?=$origin?>">
					</div>
					<div class="form-group">
					  <label for="type">Loại:</label>
					  <select name="type" class="form-control">
<?php 
$query = 'select * from category limit 1,100';
$type_tmp = 1;
$categoryList = executeResult($query);

foreach ($categoryList as $item) {
	$selected = '';
	if (isset($_GET) && $type_tmp==$type){
		$selected = 'selected';
	}
	echo '<option '.$selected.' value="'.$type_tmp.'">'.$item["C_NAME"].'</option>';
	$type_tmp++;
}
?>

					  </select>
					</div>
					<button type="submit" name="submit" class="btn btn-success">Lưu</button>
				</form>
			</div>
</body>
</html>