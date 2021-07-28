<?php
require_once("checkLogin.php");
require_once("dbhelp.php");
session_start();
$user = checkLoggedUser();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <h2 class="text-center">Quản lý sản phẩm</h2>
            <form method = "GET" action="" enctype="multipart/form-data">
                <div style="display: flex;"; class="form-group">
                    <input value="<?=isset($_GET["name"]) ? $_GET["name"] : "" ?>" name = "name" style="flex:1;border: 1px solid #ced4da;outline:none;border-radius :2px;"type="text" placeholder="Nhập tên sản phẩm cần tìm">
                    <button style="margin-left: 8px" class="btn btn-info">Tìm kiếm</button>
                </div>
            </form>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Xuất xứ</th>
                            <th>Loại</th>
                            <th width = "60px"></th>
                            <th width = "60px"></th>                            
                        </tr>
                    </thead>
                    <tbody>
<?php
$query = "";

if (isset($_GET["name"]) && $_GET["name"] != "") {
    global $name;
    $name = $_GET["name"];
    $query = 'select * from product as p,category as c where name like "%'.$name.'%" and p.TYPE = c.TYPE';

} 
else
{
    global $name;
    $query = 'select * from product as p,category as c where p.TYPE = c.TYPE';
    $name = '';
}

$productList = executeResult($query);
$number = 0;

foreach ($productList as $item) {
    $picture = $item['PICTURE'];
    $picture_src = "../assets/img/".$picture;
    $number++;

    echo '<tr>
            <td>'.$number.'</td>
            <td> <img width = 80px src = '.$picture_src.'></td>
            <td>'.$item['NAME'].'</td>
            <td>'.$item['PRICE'].'</td>
            <td>'.$item['ORIGIN'].'</td>
            <td>'.$item['C_NAME'].'</td>
            <td><button onclick=\'window.open("input.php?id='.$item['ID'].'","_self")\' class="btn btn-warning">Sửa</button></td>
            <td><button onclick="deleteProduct('.$item['ID'].')" class="btn btn-danger">Xóa</button></td>
        </tr>';
}

?>

                    </tbody>
                </table>
                <button style="float: right;margin-bottom: 16px" onclick="window.open('input.php', '_self')" class="btn btn-success">Thêm sản phẩm</button>
            </div>
        </div>
    </div>

    <script>
        function deleteProduct(id) {
            option = confirm("Bạn có chắc chắn xóa sản phẩm này không?")
            if (!option) {
                return;
            }
            $.post('deleteProduct.php', {
                // duu lieu day len
                'id' : id
            }, function(data) {
                alert(data);
                location.reload();
            } )
        }
    </script>
</body>
</html>