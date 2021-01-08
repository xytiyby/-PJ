<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>入院登记表</title>
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
<?php
$id = @$_GET['id'];
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM `Case` WHERE `id`=$id";
$result = $conn->query($sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//将二维数数组转化为一维数组
foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
        $arr[$k]=$v;
    }
}

?>
<body>
<h1 align="center">病案登记</h1>
<table style="border: 1px;margin: 0 auto;background: snow" width="40%" cellpadding="5" cellspacing="0" >
    <form action="action_PatientCase.php"  method="post" enctype="multipart/form-data">
        <tr>
            <td>姓名</td>
            <td><input type="text" name="name" readonly = "readonly" style="width:90%"value="<?php echo $arr["name"] ?>"></td>
        </tr>
        <form action="action_distributeBed.php" METHOD="post"enctype="multipart/form-data">
        <tr>
            <td>入院号</td>
            <td><input type="text"readonly = "readonly" name="id" style="width:90%"value="<?php echo $arr["id"] ?>"></td>
        </tr>

        <tr>
            <td >入院日期</td>
            <td><input type="text"readonly = "readonly" name="inDate" style="width:90%"value="<?php echo $arr["inDate"] ?>"></td>
        </tr>
        <tr>
            <td >评级</td>
            <td><input type="text" readonly = "readonly"name = "level" style="width:90%" value="<?php echo $arr["level"] ?>"></td>
        </tr>

        <tr>
            <td>治疗区域</td>
            <td><input type="text" readonly = "readonly" name="area" style="width:90%"value="<?php echo $arr["area"] ?>"></td>
        </tr>

        <tr>
            <td>病床</td>
            <td><input type="text" name = "bed" style="width:90%"value="<?php echo $arr["bed"] ?>"></td>
            <td><a href="distributeBed.php?id=<?php echo $arr["id"] ?>"> 分配</a></td>
        </tr>
        <tr>
            <td>负责护士</td>
            <td><input type="text" name = "housenurse" style="width:90%"value="<?php echo $arr["housenurse"] ?>"></td>
            <td><a href="distributeHouseNurse.php?id=<?php echo $arr["id"] ?>">分配</a></td>
        </tr>
            <tr>
                <td >生命状态</td>
                <td><input type="text" name = "state" style="width:90%" value="<?php echo $arr["state"] ?>"></td>
            </tr>
        <tr>
            <td>出院日期</td>
            <td><input type="text" name = "outDate" style="width:90%"value="<?php echo $arr["outDate"] ?>"></td>
        </tr>

    <tr>
        <td colspan="4" align="center">
            <input  type="submit" >
        </td>
    </tr>
        </form>
    </form>
</table>
</body>
<footer>
    <br>
    <br>
</footer>
</html>
