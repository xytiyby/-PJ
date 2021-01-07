<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];
//删除指定数据  
//编写删除sql语句
$sql = "DELETE FROM HouseNurse WHERE id={$id}";
//执行查询操作、处理结果集
$result = mysqli_query($conn, $sql);
if (!$result) {
    exit('sql语句执行失败。错误信息：'.mysqli_error($conn));  // 获取错误信息
}

// 删除完跳转到首页
header("Location:NurseManager.php");


