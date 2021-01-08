<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 获取增加的学生信息

$bedId = $_POST['bedId'];
$id = $_POST['id'];

mysqli_query($conn,"UPDATE `Bed` SET id = $id  WHERE bedId = $bedId");
mysqli_query($conn,"UPDATE `Case` SET bed = $bedId  WHERE id = $id");
mysqli_close($conn);
header("Location:PatientManager.php?id = $id");
?>