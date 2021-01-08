<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hosptial-System</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    #logo{
        margin-left: 0px;
        margin-top: 10px;
    }
    .body_top{
        margin-bottom: 30px ;
        height: 120px ;
        color: white;
        text-shadow: ;
        background: #333951;
        padding-top: 10px;
        padding-bottom: 10px;
        font-family: 宋体;
        text-align: center;
    }

    .body_left{
        margin-top: 0px;
        width:200px;
        height: 1100px;
        display: inline-block;
        vertical-align: top;
        background:#333951;
        position: relative;
        font-size: 18px;
        color: #fff;
        text-align: center;
    }
    .body_right{
        width: calc(100% - 205px);
        height: 1100px;
        display: inline-block;
        vertical-align: top;
        background:#f3faff;
        font-size: 32px;
        color: #999;
        text-align: center;
        line-height: 900px;
        margin-top: 0px;
    }

    .body_left_list{
        width: 100%;
        min-height: 1rem;
        position: relative;
    }
    .body_left_list >li{
        width: 100%;
        min-height: 1px;
        overflow: hidden;
        border-bottom: 1px solid #333951;
        /*transition:all 0.5s;*/
        max-height: 1500px;
    }
    .body_left_list >li >a{
        width: 100%;
        height: 100%;
        position:absolute;
        top: 0;
        left: 0;
        z-index: 1;
    }
    .body_buttom{

    }

</style>
<div class="body_top" style="margin-bottom:0px " >


    <h2>医院信息管理系统</h2>
</div>
<div style="height:10px;width:100%;border-top:20px solid black; margin-top:0px;" ></div>

<div class="body_left">

    <div class="body_left_list">
        <ul>
            <br>
            <li>
                <a href="http://www.12371.cn/special/xgyq/dqh/" target="iframe_nurse">首页</a>
            </li>
            <br>
            <li>
                <a href="HouseNurseMessage.php" target="iframe_nurse">个人信息</a>
            </li>
            <br>
            <li>
                <a href="PatientManager.php" target="iframe_nurse">查看病人</a>
            </li>
            <br>
            <li>
                <a href="../Login.php" target="iframe_nurse">退出</a>
            </li>
        </ul>
    </div>
    </ul>
</div>

<div class="body_right">
    <iframe src="http://www.12371.cn/special/xgyq/dqh/" name="iframe_nurse" frameborder="1" width="1150" height="1100">

    </iframe>
</div>
<div class="body_buttom">
    <br>
</div>

