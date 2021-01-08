<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";
$id = "11";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT * FROM `Doctor` WHERE `id`=$id";
$result = $conn->query($sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//将二维数数组转化为一维数组
foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
        $arr1[$k]=$v;
    }
}
$area = $arr1["area"];

//编写查询sql语句
$sql = "SELECT * FROM HouseNurse WHERE area = '$area'";
//执行查询操作、处理结果集
$result = mysqli_query($conn, $sql);
if (!$result) {
    exit('查询sql语句执行失败。错误信息：'.mysqli_error($conn));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    <h1>病房护士信息管理</h1>

    <table width="960" border="1">
        <tr>
            <th>工号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>病区</th>
            <th>看护人数</th>
            <th>操作</th>
        </tr>

        <?php
        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                $arr[$k] = $v;
            }
            echo "<tr>";
            echo "<td>{$arr['nurseId']}</td>";
            echo "<td>{$arr['name']}</td>";
            echo "<td>{$arr['sex']}</td>";
            echo "<td>{$arr['age']}</td>";
            echo "<td>{$arr['area']}</td>";
            echo "<td>{$arr['number']}/4</td>";
            echo "<td>
							<a href='javascript:del({$arr['nurseId']})'>删除</a>
							
					  </td>";
            echo "</tr>";

        }
        // 关闭连接
        mysqli_close($conn);
        ?>
    </table>
    <button>
            <a href='addHouseNurse.php'>添加病房护士</a>
    </button>
</div>
</body>

<script type="text/javascript">
    function del(id) {


            if(confirm("确定删除这个病房护士吗")){

            window.location = "action_del.php?nurseId=" + id;
        }
    }
</script>
</html>
