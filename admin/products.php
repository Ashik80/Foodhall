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
if(isset($_POST['addproduct']) && null!==$_FILES['image']['name']){
    $productname = $_POST['productname'];
    $catname = $_POST['catname'];
    $productprice = $_POST['productprice'];
    $productphoto = $_FILES['image']['name'];
    
    $sql = "INSERT INTO product(categoryname,productname,price,photo) VALUES('$catname','$productname','$productprice','$productphoto')";
    mysqli_query($db,$sql);    
}

if(isset($_GET['del_prod'])){
    $id = $_GET['del_prod'];
    $delete = "DELETE FROM product WHERE productid='$id'";
    mysqli_query($db,$delete);
}
if(isset($_POST['editproduct']) && null!==$_FILES['newimage']['name']){  
    $id = $_POST['rowid'];
    $productname = $_POST['productname'];
    $catname = $_POST['catname'];
    $productprice = $_POST['productprice'];
    $img = $_FILES['newimage']['name'];
    $update = "UPDATE product SET productname='$productname',categoryname='$catname',price='$productprice',photo='$img' WHERE productid='$id'";
    mysqli_query($db,$update);
}

$getcat = "SELECT * FROM category";
$rescat = mysqli_query($db,$getcat);

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
    <title>Products - Food Hall</title>
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
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="order.html">Order</a>
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
        <h1>Products</h1>
    </div>

    <div class="container mt-5">
        <div class="row">

            <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-primary ml-auto mr-4"><span><i class="fa fa-plus mr-2"></i></span>Product</button>
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add new Product:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form id="addform" action="products.php" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="productName" class="col-sm-4">Product Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="productname" id="productName" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="catName" class="col-sm-4">Category:</label>
                                    <div class="col-sm-8">
                                        <select id="catName" name="catname" class="form-control">
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
                                        <input type="text" name="productprice" id="productPrice" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-4">Photo:</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="image" id="image" class="form-control-file" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" form="addform" name="addproduct" class="btn btn-success"><span><i class="fa fa-floppy-o mr-1"></i></span>Save</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Category</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $query = "SELECT * FROM product";
                $prod = mysqli_query($db,$query);
                while($row = mysqli_fetch_array($prod)) { ?>
                <tr>
                    <th scope="row" width=10%><img src="img/<?php echo $row['photo'] ?>" height="40px" width="40px"></th>
                    <td><?php echo $row['categoryname']; ?></td>
                    <td><?php echo $row['productname']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td width="25%"><button type="button" data-toggle="modal" data-target="#editModal<?php echo $row['productid']; ?>" class="btn btn-success"><span><i class="fa fa-pencil mr-1"></i></span>Edit</button> || <a href="products.php?del_prod=<?php echo $row['productid']; ?>"><button class="btn btn-danger"><span><i class="fa fa-trash mr-1"></i></span>Delete</button></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
    mysqli_data_seek($prod,0);
    while($row = mysqli_fetch_array($prod)) {
    ?>
    <div class="modal fade" id="editModal<?php echo $row['productid']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Product:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form id="editform<?php echo $row['productid']; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="productName" class="col-sm-4">Product Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="productname" id="productName" class="form-control" value="<?php echo $row['productname']; ?>" required>
                                    <input type="hidden" name="rowid" value="<?php echo $row['productid']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="catName" class="col-sm-4">Category:</label>
                                <div class="col-sm-8">
                                    <select id="catName" name="catname" class="form-control">
                                        <?php 
                                            $sq = "SELECT catname FROM category";
                                            $resq = mysqli_query($db,$sq);
                                            while($row1 = mysqli_fetch_array($resq)){ ?>
                                        <option><?php echo $row1['catname']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="productPrice" class="col-sm-4">Price:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="productprice" id="productPrice" class="form-control" value="<?php echo $row['price']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-4">Photo:</label>
                                <div class="col-sm-8">
                                    <input type="file" name="newimage" id="image" class="form-control-file" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" form="editform<?php echo $row['productid']; ?>" name="editproduct" class="btn btn-success"><span><i class="fa fa-floppy-o mr-1"></i></span>Save</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="footer bg-dark mt-5">
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
