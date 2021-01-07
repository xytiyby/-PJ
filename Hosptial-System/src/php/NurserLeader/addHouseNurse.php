<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>添加病房护士</title>
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
<h1 align="center">添加病房护士</h1>
<table style="border: 1px;margin: 0 auto;background: snow" width="40%" cellpadding="5" cellspacing="0" >
    <form action="action_addHouseNurse.php" method="post" enctype="multipart/form-data">
        <tr>
            <td>工号</td>
            <td><input type="text" name="id" style="width:90%"></td>
        </tr>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="name" style="width:90%"></td>
        </tr>
        <tr>
            <td >性别</td>
            <td><input type="text" name="sex" style="width:90%"></td>
        </tr>
        <tr>
            <td >年龄</td>
            <td><input type="text" name = "age" style="width:90%"></td>
        </tr>
        <tr>
            <td>职位</td>
            <td><input type="text"name = "position" style="width:90%" ></td>
        </tr>
        <tr>
            <td>病区</td>
            <td><input type="tel" name="area" style="width:90%"></td>
        </tr>
        <tr>
            <td>看护人数</td>
            <td><input type="tel" name = "number" style="width:90%"></td>
        </tr>

    <tr>
        <td colspan="4" align="center">
            <input  type="submit" >
        </td>
    </tr>
    </form>
</table>
</body>
<footer>
    <br>
    <br>
</footer>
</html>
