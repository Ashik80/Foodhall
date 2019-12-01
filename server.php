<?php

session_start();

$db = mysqli_connect('localhost','root','','foodhall') or die("Could not connect to database");

//register
if(isset($_POST['reg_user'])){
    $username = $_POST['username'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    
    if($password_1 == $password_2){
        $check_user = "SELECT * FROM customer WHERE customername = '$username' LIMIT 1";
        $results = mysqli_query($db,$check_user);
        $user = mysqli_fetch_array($results);
        
        if($user['customername'] != $username){
            $password = md5($password_1);
            $query = "INSERT INTO customer(customername,password) VALUES ('$username','$password')";
            mysqli_query($db,$query);

            header('location: login.php');
        }
        else ?><script>alert('Username exists');</script><?php
    
    }
    else echo "Passwords don't match";
}
//login
if(isset($_POST['login_user'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass = md5($password);

    $sql = "SELECT * FROM customer WHERE customername = '$username' AND password = '$pass'";
    $result = mysqli_query($db,$sql);
    
    $bla = mysqli_num_rows($result);
    if(mysqli_num_rows($result)){
        $_SESSION['customername'] = $username;
        $_SESSION['msg'] = "";
        header('location:menu.php');
    }
    else echo "Couldn't log in";
}

?>