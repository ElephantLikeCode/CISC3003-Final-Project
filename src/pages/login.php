<?php
$servername = "localhost";
$db_username = "root";
$db_password = "20140304Aa";
$dbname = "login_system";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

$loginResult=1;
session_start();

foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $loginResult = 0;
        echo json_encode(['loginResult' => $loginResult]);
        exit();
    }
}

if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
    $loginResult = 6;
    echo json_encode(['loginResult' => $loginResult]);
    exit();
}


if (count($_POST) == 4){
    $user_name=$_POST["User"];
    $password=$_POST["Password"];
    $Email=$_POST["Email"];
    $vt=$_POST["vt"];

    if(!isset($_SESSION['vt'])){
        $loginResult = 7;
        echo json_encode(['loginResult' => $loginResult]);
        exit();
    }

    if ($vt!=$_SESSION["vt"]){
        $loginResult=7;
        echo json_encode(['loginResult' => $loginResult]);
        exit();
    }
    $signup = "INSERT INTO user (Email, user_name, password) VALUES ('".$Email."', '".$user_name."','".$password."')";

    if (mysqli_query($conn, $signup)) {
        $accountInfo=$_POST;
        setcookie('accountInfo', json_encode($accountInfo), time() + 3600, '/');
        header('Location: index.php');
        $loginResult=5;//注册成功，将账户信息存入cookie，导向主页面
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
            $loginResult=1;
            //登录成功，储存cookie，导向主页面
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