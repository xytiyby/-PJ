
<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "my_db";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "CREATE TABLE Bed(
registerId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
id INT(6) ,
data VARCHAR (20),
temperature VARCHAR(20) ,
symptoms VARCHAR (20),
state VARCHAR (20)
)";

if ($conn->multi_query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>

<a href="EmergencyNurse,PHP?id=  "