<?php
header("Content-type: text/html; charset=utf-8");

$servername = "localhost";
$username = "root";
$password = "qazqaz";
$dbname = "teacherdb";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname );


// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}


$tname = $_POST["tname"];
$tpassword = $_POST["tpassword"];
$sql = "SELECT tname, tpassword, tid FROM teachers";
$result = $conn->query($sql);
$f=0;

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        if ( ($tname==$row["tname"]) && ($tpassword==$row["tpassword"]))
        {
            echo "登入成功";
            setcookie("TidCookie",$row["tid"]);
            header('Location: http://localhost/teacher/afterLogin.php');
            $f=1;
        }else {     
        }
    }
    if ($f==0) {
        header('Location: http://localhost/teacher/tlogin.php'); 

    }

} 



?>


