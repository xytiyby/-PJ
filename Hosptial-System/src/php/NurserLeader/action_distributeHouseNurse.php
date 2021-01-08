<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 获取增加的学生信息
$nurseId = $_POST['nurseId'];
$number = $_POST['number'];
$id = $_POST['id'];
//编写预处理sql语句

mysqli_query($conn,"UPDATE `Case` SET `housenurse` = '$nurseId'  WHERE id = $id");
mysqli_query($conn,"UPDATE `HouseNurse` SET `number` = '$number' WHERE nurseId = $nurseId");
mysqli_close($conn);
header("Location:PatientManager.php?id =$id");
?>
