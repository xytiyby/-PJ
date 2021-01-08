<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 获取修改后的学生信息
$id = $_POST['id'];
$level = $_POST['level'];
$state = $_POST['state'];
//编写预处理sql语句
mysqli_query($conn,"UPDATE `Case` SET `level` = '$level',`state` = '$state' WHERE id = $id");
mysqli_close($conn);

header("Location:PatientManager.php?id =$id");

?>

}
