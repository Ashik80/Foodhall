<?php include('server.php'); ?>
<?php
if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = "You must login first";
    header('location: login.php');
}
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');    
}
if(isset($_GET['processed'])){
    $name = $_GET['processed'];
    $pdid = $_GET['iid'];
    $del = "DELETE FROM purchase_detail WHERE pdid='$pdid' AND customername='$name'";
    $dele = "DELETE FROM purchase WHERE customer='$name'";
    mysqli_query($db,$del);
    mysqli_query($db,$dele);
    header('location: sales.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/76671abf54.js"></script>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <title>Menu - Food Hall</title>
</head>

<body>
    <div>
        <nav style="min-height: 60px" class="navbar navbar-expand-md navbar-dark bg-danger pl-5 pr-5">
            <a class="navbar-brand ml-5 text-white">Food Hall</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!--<li class="nav-item">
                        <a class="nav-link" href="order.php">Order</a>
                    </li>-->
                    <li class="nav-item active">
                        <a class="nav-link" href="sales.php">Sales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="category.php">Category</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-user mr-1"></i></span><?php echo $_SESSION['username']; ?></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="sales.php?logout='1'">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="text-center mt-5">
        <h1>Sales</h1>
    </div>

    <div class="container mt-5 mb-5">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Total Sales</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $details = "SELECT * FROM purchase_detail";
                $det = mysqli_query($db,$details);
                while($row = mysqli_fetch_array($det)){
                ?>
                <tr>
                    <th scope="row"><?php echo $row['pdate']; ?></th>
                    <td><?php echo $row['customername']; ?></td>
                    <td>BDT <?php echo $row['totalsales']; ?></td>
                    <td width='30%'><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $row['pdid']; ?>"><span><i class="fa fa-search mr-2"></i></span>View</button><a href="sales.php?processed=<?php echo $row['customername']; ?>&iid=<?php echo $row['pdid']; ?>"><button class="btn btn-success ml-2"><span><i class="fa fa-check mr-2"></i></span>Processed</button></a></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <?php
    mysqli_data_seek($det,0);
    while($row1 = mysqli_fetch_array($det)) {                
    ?>
    <div class="modal fade" id="exampleModal<?php echo $row1['pdid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <div class="row">
                            <p>Customer: <?php echo $row1['customername']; ?></p>
                            <p class="ml-auto"><?php echo $row1['pdate']; ?></p>
                        </div>
                        <table class="table table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $custnam = $row1['customername'];
                                $pur = "SELECT * FROM purchase WHERE customer='$custnam'";
                                $col = mysqli_query($db,$pur);
                                while($row2 = mysqli_fetch_array($col)) {
                                ?>
                                <tr>
                                    <td><?php echo $row2['itemname']; ?></td>
                                    <td><?php echo $row2['quantity']; ?></td>
                                    <td>BDT <?php echo $row2['total']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="total-price mt-3">
                            <div class="row justify-content-md-center">
                                <span class="col text-right"><b>TOTAL</b></span>
                                <span class="col cart-total-price">BDT <?php echo $row1['totalsales']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="footer bg-dark" style="margin-top: 260px;">
        <div class="row">
            <div class="col">
                <div class="container">
                    <p class="text-white pt-3 text-center">Foodhall &copy; A product by Ashikur Rahman</p>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
