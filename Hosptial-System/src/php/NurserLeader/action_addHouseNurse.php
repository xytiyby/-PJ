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
$number = $_POST['number'];
$area = $_POST['area'];
$position = $_POST['position'];

//编写预处理sql语句
$sql = "INSERT INTO `HouseNurse` VALUES( ?, ?, ?, ?, ?,?,?)";

//预处理SQL模板
$stmt = mysqli_prepare($conn, $sql);

// 参数绑定，并为已经绑定的变量赋值
mysqli_stmt_bind_param($stmt, 'sssssss', $id, $name, $sex, $age, $position,$area,$number);


if ($id) {
    // 执行预处理（第1次执行）
    $result = mysqli_stmt_execute($stmt);

    //关闭连接
    mysqli_close($conn);
    if ($result) {
        //添加学生成功
        //跳转到首页
        header("Location:NurseManager.php");
    }else{
        exit('添加学生sql语句执行失败。错误信息：' . mysqli_error($conn));
    }
}else{
    //添加学生失败
    //输出提示，跳转到首页
    echo "添加学生失败！<br><br>";
    header('Refresh: 3; url=Index.php');  //3s后跳转


}
