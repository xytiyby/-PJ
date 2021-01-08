<?php
//连接数据库
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";


$state =$_POST['state'];
$canChange =$_POST['canChange'];
$level =$_POST['level'];
$area = $_POST['area'];
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);



//编写查询sql语句
$sql = "SELECT * FROM (`Case` inner join `Patient` on Case.id = Patient.id)inner join `OutHere` on OutHere.id = Patient.id WHERE area = '$area' AND state = '$state'AND canChange = '$canChange' "  ;
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
							<a href='PatientCase.php?id={$arr['id']}'>查看病案</a>
							<a href=distributeBed.php?id={$arr['id']}'>分配病床</a>
							<a href=distributeHouseNurse.php?id={$arr['id']}'>分配护士</a>
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
                <td>病区评级</td>
                <td><input type="text" name="level" style="width:90%" >
                </td>
            </tr>

            <tr>
                <td>治疗区域</td>
                <td><input type="text" name="canOut" style="width:90%"></td>
            </tr>

            <tr>
                <td>是否转入其他区域</td>
                <td><input type="text" name="canChange" style="width:90%"></td>
            </tr>
            <tr>
                <td>生命状态</td>
                <td><input type="text" name="state" style="width:90%"></td>
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

