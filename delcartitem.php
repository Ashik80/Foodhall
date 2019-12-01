<?php
include('server.php');
if(isset($_POST['delcartitem'])){
    $id = $_POST['id'];
    $del = "DELETE FROM purchase WHERE purchaseid='$id'";
    mysqli_query($db,$del);
    //header('location: menu.php');
    echo 1;
    exit();
}

?>