
<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "CREATE TABLE Case (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30),
inDate VARCHAR(30),
level VARCHAR(10),
state VARCHAR(10),
area VARCHAR(10),
bed VARCHAR(10),
housenurse VARCHAR(10),
outDate VARCHAR(10)
)";
if ($conn->multi_query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>

