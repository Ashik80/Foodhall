<?php 
include('server.php');

$user = $_SESSION['customername'];
    $food = $_POST['foodname'];
    $price = $_POST['foodprice'];
    $quantity = $_POST['quantity'];
    $total = $price * $quantity;
    $oexist = "SELECT customername FROM purchase_detail WHERE customername='$user'";
    $risult = mysqli_query($db,$oexist);
    if(mysqli_num_rows($risult)){ ?>
<script>
    alert('One order is already being processed.');
    window.location.href = "menu.php";

</script>
<?php
    }
    else{
    if($quantity>0){
        $exist = "SELECT itemname,quantity FROM purchase WHERE itemname='$food' AND customer='$user'";
        $result = mysqli_query($db,$exist);
        
        if(mysqli_num_rows($result)){
            $ru = mysqli_fetch_array($result);
            $itemname = $ru['itemname'];
            $upd = "UPDATE purchase SET quantity='$quantity',total='$total' WHERE itemname='$itemname' AND customer='$user'";
            mysqli_query($db,$upd);
        }
        else{
            $sql = "INSERT INTO purchase(itemname,customer,quantity,total) VALUES ('$food','$user','$quantity','$total')";
            mysqli_query($db,$sql);
            
        }
    }
        else{ ?>
<script>
    alert("Enter valid quantity");

</script>
<?php }
    }
exit();

?>