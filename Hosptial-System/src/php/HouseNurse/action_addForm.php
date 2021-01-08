<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);


// 获取增加的学生信息

$registerId = $_POST['registerId'];
$id = $_POST['id'];
$date = $_POST['date'];
$state = $_POST['state'];
$temperature =$_POST['temperature'];
$symptoms = $_POST['symptoms'];

$sql1 = "SELECT * FROM `Case` WHERE `id`=$id";
//执行查询操作、处理结果集
$result = mysqli_query($conn, $sql1);
if (!$result) {
    exit('查询sql语句执行失败。错误信息：'.mysqli_error($conn));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//将二维数数组转化为一维数组
foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
        $arr[$k]=$v;
    }
}
$normalTimes =  2;
//编写预处理sql语句
$sql = "INSERT INTO `RegisterForm` VALUES( ?, ?, ?, ?, ?,?)";
//预处理SQL模板
$stmt = mysqli_prepare($conn, $sql);
// 参数绑定，并为已经绑定的变量赋值
mysqli_stmt_bind_param($stmt, 'ssssss', $registerId, $id, $date, $temperature,$symptoms, $state);
mysqli_query($conn,"UPDATE `Case` SET state = '$state' WHERE id = $id");
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
if($temperature <= 37.3) {
    mysqli_query($conn, "UPDATE OutHere SET normalTimes = $normalTimes  WHERE id = $id");
}

?>
