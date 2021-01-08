<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>个人信息</title>
</head>
<style>
    th, td{
        border: 1px solid black;
        text-align: center;
        font-family: 微软雅黑;
    }
    /*鼠标移入到tr以后，改变颜色*/
    tr:hover{
        background-color: yellow;
    }

    input {
        /*background-color: rgb(250, 255, 189);*/
        background-color: #fff;
        border: 1px solid rgba(0,0,0,.15);
        padding-left: 1em;
        width: 20em;
        height: 2.0em;
        margin-top: 5px;
        margin-bottom:5px;
        font-family: 微软雅黑;
    }
    button {
        background-color: #bb2d3b;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

</style>

<body>

<?php

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

$id = 11;
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM `Doctor` WHERE `id`=$id";
$result = $conn->query($sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//将二维数数组转化为一维数组
foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
        $arr[$k]=$v;
    }
}

?>
<h1 style="text-align: center">个人信息</h1>
<table style="border: 1px;margin: 0 auto;background:oldlace" width="40%" cellpadding="5" cellspacing="0" >

    <tr>
        <td>姓名</td>
        <td><input type="text" name="name" style="width:90%" readonly="readonly"value="<?php echo $arr["name"] ?>">
        </td>
    </tr>
    <tr>
        <td>工号</td>
        <td><input type="text" name="id" style="width:90%"readonly="readonly" value="<?php echo $arr["id"] ?>"></td>
    </tr>
    <tr>
        <td >性别</td>
        <td><input type="text"name="sex" style="width:90%"readonly="readonly" value="<?php echo $arr["sex"] ?>"></td>
    </tr>
    <tr>
        <td >年龄</td>
        <td><input type="text" name="age" style="width:90%"readonly="readonly" value="<?php echo $arr["age"] ?>"></td>
    </tr>
    <tr>
        <td >工作职位</td>
        <td><input type="text" name="position" style="width:90%" readonly="readonly"value="<?php echo $arr["position"] ?>"></td>
    </tr>
    <tr>
        <td >负责病区</td>
        <td><input type="text" name="area" style="width:90%" readonly="readonly"value="<?php echo $arr["area"] ?>"></td>
    </tr>

    <tr>
        <td colspan="4" align="center">

            <a href='editDoctor.php'>修改</a>
        </td>
    </tr>

</table>

</body>

</html>