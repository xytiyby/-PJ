<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

$nurseId = '22';
$sql = "SELECT * FROM `HouseNurse` WHERE `nurseId`='$nurseId'";
$result = $conn->query($sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//将二维数数组转化为一维数组
foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
        $arr1[$k]=$v;
    }
}
$area = $arr1['area'];

//编写查询sql语句
$sql = "SELECT * FROM  `Patient`inner join `Case` on Case.id = Patient.id WHERE area = '$area' AND housenurse= '$nurseId'" ;
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
    <h1>病人信息管理</h1>

    <table width="960" border="1">
        <tr>
            <th>住院号</th>
            <th>病区</th>
            <th>操作</th>
        </tr>

        <?php
        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                $arr[$k] = $v;
            }
            echo "<tr>";
            echo "<td>{$arr['id']}</td>";
            echo "<td>{$arr['area']}</td>";
            echo "<td>
							<a href='RegisterForm.php?id={$arr['id']}'>登记每日状况</a>						
			  </td>";
            echo "</tr>";
        }
        // 关闭连接
        mysqli_close($conn);
        ?>
    </table>
    <table width="960" border="1">
        <form method="post" action="action_select.php" enctype="multipart/form-data">
            <tr>
                <td>生命状态</td>
                <td><input type="text" name="state" style="width:90%" >
                </td>
            </tr>

            <tr>
                <td>出院条件</td>
                <td><input type="text" name="canOut" style="width:90%"></td>
            </tr>

            <tr>
                <td>是否转入其他区域</td>
                <td><input type="text" name="canChange" style="width:90%"></td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    <input type="submit">
                </td>
            </tr>

        </form>
    </table>

</div>
</body>

<script type="text/javascript">
    function del(id) {


        if(confirm("确定删除这个病房护士吗")){

            window.location = "action_del.php?id=" + id;
        }
    }
</script>
</html>

