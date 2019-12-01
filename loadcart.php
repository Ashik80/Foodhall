<?php 
include('server.php');
if(isset($_POST['cartitems'])){
$user = $_SESSION['customername'];
$pur = "SELECT * FROM purchase WHERE customer='$user'";
$col = mysqli_query($db,$pur);
while($row2 = mysqli_fetch_array($col)) {
?>
<div class="row cartrow mb-2">
    <span class="col-3 my-auto cart-item"><?php echo $row2['itemname']; ?></span>
    <span class="col-3 my-auto cart-price">BDT <?php echo $row2['total']; ?></span>
    <span class="col-3 my-auto cart-quantity"><?php echo $row2['quantity']; ?></span>
    <button onclick="del(<?php echo $row2['purchaseid']; ?>); disp(); displayPrice(); loaded();" class="btn btn-danger cartdel">Delete</button>
</div>
<?php }
exit();
}

?>
