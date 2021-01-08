
<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_GET['id'];
//编写查询sql语句
$sql="SELECT * FROM `HouseNurse` WHERE `number` < `max` ";
//执行查询操作、处理结果集
$result = mysqli_query($conn, $sql);
if (!$result) {
    exit('查询sql语句执行失败。错误信息：'.mysqli_error($conn));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//编写查询数量sql语句
$sql = 'SELECT COUNT(*) FROM `HouseNurse`';
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
    <title>尚空闲护士</title>
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
            <th > <input name="nurseId" type = "text" value="护士编号" readonly = "readonly"></th>
            <th><input name="area" type = "text" value="所在病区" readonly = "readonly"></th>
            <th><input name="max" type = "text" value="最大可照看人数" readonly = "readonly"></th>
            <th><input name="number" type = "text" value="已照看人数" readonly = "readonly"></th>
        </tr>
        <?php


        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                $arr[$k] = $v;
            }

            echo "<tr>";
            echo "<td>{$arr['nurseId']}</td>";
            echo "<td>{$arr['area']}</td>";
            echo "<td>{$arr['max']}</td>";
            echo "<td>{$arr['number']}</td>";
            echo "</tr>";
        }
        // 关闭连接
        mysqli_close($conn);
        ?>
    </table>
    <h1>护士分配</h1>
    <form method="post" action="action_distributeHouseNurse.php" enctype="multipart/form-data">
        <table style="border: 1px;margin: 0 auto;background:oldlace" width="40%" cellpadding="5" cellspacing="0" >
            <tr>
                <td>护士编号</td>
                <td><input type="text" name="nurseId" style="width:90%" >
                </td>
            </tr>
            <tr>
                <td>病人编号</td>
                <td><input type="text" name="id" style="width:90%"></td>
            </tr>

            <tr>
                <td>分配后照顾人数</td>
                <td><input type="text" name="number" style="width:90%"></td>
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
