<?php
$servername = "localhost";
$db_username = "root";
$db_password = "20140304Aa";
$dbname = "login_system";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

$loginResult=1;

if (count($_POST) == 3){
    $user_name=$_POST["User"];
    $password=$_POST["Password"];
    $Email=$_POST["Email"];

    $signup = "INSERT INTO user (Email, user_name, password) VALUES ('".$Email."', '".$user_name."','".$password."')";

    if (mysqli_query($conn, $signup)) {
        $accountInfo=$_POST;
        setcookie('accountInfo', json_encode($accountInfo), time() + 3600, '/');
        $loginResult=1;
        exit();//注册成功，将账户信息存入cookie，导向主页面
    } else {
        $loginResult = 2;//邮箱已注册
    }

}
else{

    $password=$_POST["Password"];
    $Email=$_POST["Email"];

    $signup = "SELECT user_name,password from user where Email='".$Email."'";
    $result = $conn->query($signup);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];
        $user_name=$row["user_name"];

        if ($storedPassword == $password){
            $accountInfo = $row;
            setcookie('accountInfo', json_encode($accountInfo), time() + 3600, '/');
            $loginResult=5;
            exit();//登录成功，储存cookie，导向主页面
        }else{
            $loginResult=3;//密码错误
        }
    }
    else{
        $loginResult=4;//邮箱未注册
    }

}
echo json_encode(['loginResult' => $loginResult]);
?>