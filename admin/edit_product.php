<?php include('server.php'); ?>
<?php
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');    
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $_SESSION['catID'] = $id;
    if(isset($_POST['update'])){
        $name = $_POST['edittext'];
        $update = "UPDATE category SET catname='$name' WHERE catid='$id'";
        mysqli_query($db,$update);  
        header('location: category.php');
    }
}

if(isset($_GET['upd'])){
    $id = $_GET['upd'];
    $sql = "SELECT * FROM product WHERE productid='$id'";
    $res = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($res);
    $_SESSION['prodname'] = $row['productname'];
    $_SESSION['prodprice'] = $row['price'];
    if(isset($_POST['update']) && null!==$_FILES['prodphoto']['name']){
        $name = $_POST['prodname'];
        $cat = $_POST['prodcat'];
        $price = $_POST['prodprice'];
        $photo = $_FILES['prodphoto']['name'];
        $update = "UPDATE product SET categoryname='$cat',productname='$name',price='$price',photo='$photo' WHERE productid='$id'";
        mysqli_query($db,$update);  
        header('location: products.php');
        
    }
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
                    <li class="nav-item">
                        <a class="nav-link" href="sales.php">Sales</a>
                    </li>
                    <li class="nav-item active">
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
        <h1>Product</h1>
    </div>
    
    <div id="editmod" class="card col-4 m-auto" style="padding: 0px 0px; position: relative; top: 40px;">
        <div class="card-header">
            Edit Product:
        </div>
        <div class="card-body">
            <form id="editprod" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                                    <label for="productName" class="col-sm-4">Product Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="prodname" id="productName" class="form-control" value="<?php echo $_SESSION['prodname']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="catName" class="col-sm-4">Category:</label>
                                    <div class="col-sm-8">
                                        <select id="productName" name="prodcat" class="form-control">
                                            <?php 
                                            $sq = "SELECT catname FROM category";
                                            $resq = mysqli_query($db,$sq);
                                            while($row = mysqli_fetch_array($resq)){ ?>
                                            <option><?php echo $row['catname']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="productPrice" class="col-sm-4">Price:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="prodprice" id="productPrice" class="form-control" value="<?php echo $_SESSION['prodprice']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="productPhoto" class="col-sm-4">Photo:</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="prodphoto" id="productPhoto" class="form-control-file" required>
                                    </div>
                                </div>
            </form>
        </div>
    <div class="modal-footer">
        <a href="products.php"><button type="button" class="btn btn-danger">Close</button></a>
        <button type="submit" form="editprod" name="update" class="btn btn-success"><span><i class="fa fa-pencil-square-o mr-1"></i></span>Update</button>
    </div>
    </div>
    
    <div class="footer bg-dark" style="margin-top: 150px;">
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