<?php
    include "db.php";
    $sql = "SELECT cars.id, cars.name, cars.images, category.name as category_name FROM cars
    inner join category on cars.categoryId = category.id";
    $data = $connect ->query($sql);
    $list = $data->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    tr th{
        border: 1px solid #ccc;
        padding: 5px;
        background-color: #fff;
        color: red;
    }
    tr td{
        border: 1px solid #ccc;
        padding: 5px;
       color: blue;
    }
</style>
<body>
    <div class="container">
        <h2>List Cars</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Category </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt=0;
                        foreach($list as $v)
                        {
                            $stt++;
                            extract($v);
                        
                ?>
                <tr>
                    <td><?=$stt?></td>
                    <td><?=$name?></td>
                    <td><img src="<?php echo $images?>" alt="" width="80"></td>
                    <td><?=$category_name ?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $id ?>" onclick =  "return confirm('Xác nhận xóa')"   >Xóa</a>
                        <a href="edit.php?id=<?php echo $id ?>" onclick =  "return confirm('Xác nhận sửa')"   >Sửa</a>
                    </td>
                </tr>
                <?php
                }
                ?>

            </tbody>
            <a href="add.php">Add</a>
        </table>
    </div>
</body>
</html>