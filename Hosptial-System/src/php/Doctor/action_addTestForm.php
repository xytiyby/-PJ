<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);$level = $_POST['level'];
$id = $_POST['id'];
$testId = $_POST['testId'];
$testDate = $_POST['testDate'];
$testResult = $_POST['testResult'];
$level =$_POST['level'];
$sql ="INSERT INTO `DetectionForm` VALUES( ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'sssss', $testId, $id, $testDate, $testResult, $level);
if ($id) {
    // 执行预处理（第1次执行）
    $result = mysqli_stmt_execute($stmt);
    //关闭连接
    mysqli_close($conn);
    if ($result) {
        //添加学生成功
        //跳转到首页
        header("Location:PatientManager.php");
    }else{
        exit('添加学生sql语句执行失败。错误信息：' . mysqli_error($conn));
    }
}

if ($testResult = "阳性") {
    mysqli_query($conn,"UPDATE OutHere SET positionTimes= positionTimes + 1 WHERE id = $id");
}

