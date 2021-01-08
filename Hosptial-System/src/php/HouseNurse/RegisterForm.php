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


<body>
<h1 align="center">入院登记表</h1>
<table style="border: 1px;margin: 0 auto;background: snow" width="40%" cellpadding="5" cellspacing="0" >
    <form action="action_addForm.php" method="post" enctype="multipart/form-data">
        <tr>
            <td>登记单号</td>
            <td><input type="text" name="registerId" style="width:90%"></td>
        </tr>
        <tr>
            <td>入院号</td>
            <td><input type="text" name="id" style="width:90%"></td>
        </tr>

        <tr>
            <td >记录日期</td>
            <td><input type="text" name = "date" style="width:90%"></td>
        </tr>
        <tr>
            <td >体温</td>
            <td><input type="text"name = "temperature" style="width:90%" ></td>
        </tr>
        <tr>
            <td>症状</td>
            <td><input type="text" name="symptoms" style="width:90%"></td>
        </tr>
        <tr>
            <td>生命状态</td>
            <td><input type="text" name = "state" style="width:90%"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit"></td>
        </tr>
</table>
    </form>

</body>
<footer>
    <br>
    <br>
</footer>
</html>