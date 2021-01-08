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
$name = $_POST['name'];
$area = $_POST['area'];
$level = $_POST['level'];
$bed = $_POST['bed'];
$housenurse = $_POST['housenurse'];
$inDate = $_POST['inDate'];
$state = $_POST['state'];
$outDate = $_POST['outDate'];
//编写预处理sql语句
$sql = "UPDATE `Case` 
			SET 
				`name`= ?, 
				`inDate`= ?, 
				`level`= ?, 
			     `state`= ?, 
				`area`= ?
			 `bed`= ?, 
			 `housenurse`= ?, 
			 `outDate`= ?, 
          WHERE `id`= ?";
//预处理SQL模板
$stmt = mysqli_prepare($conn, $sql);
// 参数绑定，并为已经绑定的变量赋值
mysqli_stmt_bind_param($stmt, 'sssssssss', $name, $inDate, $level, $state, $area, $bed,$housenurse,$outDate,$id);


if ($name) {
    // 执行预处理（第1次执行）
    $result = mysqli_stmt_execute($stmt);
    //关闭连接
    mysqli_close($conn);

    if ($result) {
        //修改急诊护士成功
        //跳转到修改好的页面
        header("Location:PatientManager.php");
    }else{
        exit('修改护士信息sql语句执行失败。错误信息：' . mysqli_error($conn));
    }
}else{
    //修改学生失败
    //输出提示，跳转到首页
    echo "修改急诊护士失败！<br><br>";
    header('Refresh: 3; url=index.php');  //3s后跳转


}
