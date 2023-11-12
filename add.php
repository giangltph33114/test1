<?php
    require "db.php";
    
    $sql = "SELECT * FROM `category` ";
    $data = $connect->query($sql);
    $list = $data->fetchAll();

    if (isset($_POST['btn_add'])){
        $name = $_POST['name'];
        $op = $_POST['category'];
        $dir = "upfile/" ;
        $image_name = basename($_FILES['image']['name']);
        $up = $dir . $image_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $up)){
            $sql = "INSERT INTO `cars`(`name`, `images`, `categoryId`) VALUES ('$name', '$up', '$op')";
            $connect -> exec($sql);

            header("Location:index.php");
            exit;

        }else{
            echo "Error";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Add</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Name</label><br>
        <input type="text" name="name" require id = ""><br>
        <label for="">Image</label><br>
        <input type="file" name="image" require id=""><br>
        <select name="category" id="">
            <?php
            foreach($list as $row){
                echo "<option value = '".$row['id']."'>".$row['name']."</option>";
            }
            ?>
        </select><br>
        <input type="submit" name="btn_add" id="" value= "Add">
    </form>
</body>
</html>