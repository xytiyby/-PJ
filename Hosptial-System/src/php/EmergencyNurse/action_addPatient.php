<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 获取增加的学生信息
$name = $_POST['name'];
$sex = $_POST['sex'];
$age = $_POST['age'];
$id = $_POST['id'];
$num = $_POST['num'];
$level = $_POST['level'];
$testId = $_POST['testId'];
$testDate = $_POST['testDate'];
$testResult = $_POST['testResult'];
$inDate = $_POST['testDate'];
$state = "待添加";
$area = $_POST['level'];
$bed = "待分配";
$housenurse = "待分配";
$outDate = "未出院";
//编写预处理sql语句
$sql = "INSERT INTO `Patient` VALUES( ?, ?, ?, ?, ?)";
$sql1 ="INSERT INTO `DetectionForm` VALUES( ?, ?, ?, ?, ?)";
$sql2 = "INSERT INTO `Case` VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?)";
//预处理SQL模板
$stmt = mysqli_prepare($conn, $sql);
$stmt1 = mysqli_prepare($conn, $sql1);
$stmt2 = mysqli_prepare($conn, $sql2);
// 参数绑定，并为已经绑定的变量赋值
mysqli_stmt_bind_param($stmt, 'sssss', $id, $name, $sex, $age, $num);
mysqli_stmt_bind_param($stmt1, 'sssss', $testId, $id, $testDate, $testResult, $level);
mysqli_stmt_bind_param($stmt2, 'sssssssss', $id, $name, $inDate,$level,$state,$area,$bed,$housenurse,$outDate);
if ($id) {
    // 执行预处理（第1次执行）
    $result = mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_execute($stmt1);
    $result = mysqli_stmt_execute($stmt2);
    //关闭连接
    mysqli_close($conn);
    if ($result) {
        //添加学生成功
        //跳转到首页
        header("Location:EmergencyNurseCheckPatient.php");
    }else{
        exit('添加学生sql语句执行失败。错误信息：' . mysqli_error($conn));
    }
}else{
    //添加学生失败
    //输出提示，跳转到首页
    echo "添加学生失败！<br><br>";
    header('Refresh: 3; url=Index.php');  //3s后跳转


}
