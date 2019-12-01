<?php
include('server.php');

if(isset($_POST['count'])){
    $user = $_SESSION['customername'];
    $sq = "SELECT COUNT(purchaseid) FROM purchase WHERE customer = '$user'";
    $item = mysqli_query($db,$sq);
    $row = mysqli_fetch_array($item);
    $tu = $row['COUNT(purchaseid)'];
    echo $tu;
    exit();
}

?>