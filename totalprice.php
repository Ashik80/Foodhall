<?php 
include('server.php');
if(isset($_POST['totprice'])){
    $custname = $_SESSION['customername'];
    $addu = "SELECT SUM(total) FROM purchase WHERE customer='$custname'";
    $total = mysqli_query($db,$addu);
    $row = mysqli_fetch_assoc($total);
    $sum = $row['SUM(total)'];
    
    echo $sum;
    exit();
}

?>
