<?php
function Login_information_verification()
{
    $servername = "localhost";
    $db_username = "root";
    $db_password = "20140304Aa";
    $dbname = "login_system";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if (isset($_COOKIE['accountInfo'])) {
        $cookie=json_decode($_COOKIE['accountInfo'],true);
        $query = "SELECT user_name,password from user where Email='".$cookie['Email']."'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedPassword = $row["password"];
            $user_name=$row["user_name"];

            if ($storedPassword == $cookie["Password"]){
                return true;//密码对了
            }else{
                return false;//密码错误
            }
        }
        else{
            return false;//没有这个账户
        }
    } else {
        return false;//cookie不存在
    }
}




?>