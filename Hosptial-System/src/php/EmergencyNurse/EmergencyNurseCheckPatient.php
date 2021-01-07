
<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);




//编写查询sql语句
$sql = 'SELECT * FROM `patient`';
//执行查询操作、处理结果集
$result = mysqli_query($conn, $sql);
if (!$result) {
    exit('查询sql语句执行失败。错误信息：'.mysqli_error($conn));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//编写查询数量sql语句
$sql = 'SELECT COUNT(*) FROM `patient`';
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
    <title>查看病人</title>
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
    <h1>病人信息管理</h1>

    <table width="960" border="1">
        <tr>
            <th>住院号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>电话</th>
        </tr>
        <?php


        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                $arr[$k] = $v;
            }
            echo "<tr>";
            echo "<td>{$arr['id']}</td>";
            echo "<td>{$arr['name']}</td>";
            echo "<td>{$arr['sex']}</td>";
            echo "<td>{$arr['age']}</td>";
            echo "<td>{$arr['num']}</td>";
            echo "</tr>";

        }
        // 关闭连接
        mysqli_close($conn);
        ?>

    </table>
</div>
</body>
</html>