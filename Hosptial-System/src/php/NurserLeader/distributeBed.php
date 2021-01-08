
<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);


$id = 111;
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM `NurseLeader` WHERE `id`=$id";
$result = $conn->query($sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//将二维数数组转化为一维数组
foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
        $arr[$k]=$v;
    }
}
$area = $arr['area'];
//编写查询sql语句
$sql="SELECT * FROM `Bed` WHERE id='无' AND area= '$area'";
//执行查询操作、处理结果集
$result = mysqli_query($conn, $sql);
if (!$result) {
    exit('查询sql语句执行失败。错误信息：'.mysqli_error($conn));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//编写查询数量sql语句
$sql = 'SELECT COUNT(*) FROM `Bed`';
//执行查询操作、处理结果集
$n = mysqli_query($conn, $sql);
if (!$n) {
    exit('查询数量sql语句执行失败。错误信息：'.mysqli_error($conn));  // 获取错误信息
}
$num = mysqli_fetch_assoc($n);
//将一维数组的值转换为一个字符串
$num = implode($num);


?>

<html>
<head>
    <meta charset="UTF-8">
    <title>未住人病床</title>
</head>
<style type="text/css">
    body {

        background-size: 100%;
    }

    .wrapper {
        width: 1000px;
        margin: 20px auto;
    }

    h1 {
        text-align: center;
    }

    .add {
        margin-bottom: 20px;
    }

    .add a {
        text-decoration: none;
        color: #fff;
        background-color: #00CCFF;
        padding: 6px;
        border-radius: 5px;
    }

    td {
        text-align: center;
    }
</style>
<body>

<div class="wrapper">

    <h1>病床信息管理</h1>

    <table width="960" border="1">
        <tr>
            <th > <input name="bedId" type = "text" value="病床编号" readonly = "readonly"></th>
            <th><input name="area" type = "text" value="所在病区" readonly = "readonly"></th>
            <th><input name="id" type = "text" value="所住病人编号" readonly = "readonly"></th>
        </tr>
        <?php


        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                $arr[$k] = $v;
            }
            echo "<tr>";
            echo "<td>{$arr['bedId']}</td>";
            echo "<td>{$arr['area']}</td>";
            echo "<td>{$arr['id']}</td>";
            echo "</tr>";
        }
        // 关闭连接
        mysqli_close($conn);
        ?>
    </table>
    <h1>病床分配</h1>
<form method="post" action="action_distributeBed.php" enctype="multipart/form-data">
    <table style="border: 1px;margin: 0 auto;background:oldlace" width="40%" cellpadding="5" cellspacing="0" >

        <tr>
            <td>病床号</td>
            <td><input type="text" name="bedId" style="width:90%" >
            </td>
        </tr>
        <tr>
            <td>病人编号</td>
            <td><input type="text" name="id" style="width:90%"></td>
        </tr>

        <tr>
            <td colspan="4" align="center">
         <input type="submit">
            </td>
        </tr>

    </table>
</form>
</div>
</body>
</html>