<?php include('server.php');

if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = "You must login first";
    header('location: login.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');    
}

if(isset($_POST['addcat'])){
    $catname = $_POST['catname'];
    $check = "SELECT * FROM category WHERE catname='$catname' LIMIT 1";
    $query = mysqli_query($db,$check);
    $exist = mysqli_fetch_array($query);
    if($exist['$catname']!=$catname){
        $sql = "INSERT INTO category(catname) VALUES('$catname')";
        mysqli_query($db,$sql);
    }
}
if(isset($_POST['update'])){
    $name = $_POST['edittext'];  
    $id = $_POST['rowid'];
    $update = "UPDATE category SET catname='$name' WHERE catid='$id'";
    mysqli_query($db,$update);
}
if(isset($_GET['del_cat'])){
    $id = $_GET['del_cat'];
    $del = "DELETE FROM category WHERE catid='$id'";
    mysqli_query($db,$del);
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
    <title>Category - Food Hall</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item active mr-3">
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
        <h1>Categories</h1>
    </div>

    <div class="container mt-5">
        <div class="row">
            <button class="btn btn-primary ml-auto mr-3" type="button" data-toggle="modal" data-target="#addModal"><span><i class="fa fa-plus mr-2"></i></span>Category</button>
        </div>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add new Category:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form id="catform" method="post" action="category.php" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="catergoryName" class="col-sm-4">Category Name:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="catname" id="categoryName" class="form-control" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" form="catform" name="addcat" class="btn btn-success"><span><i class="fa fa-floppy-o mr-1"></i></span>Save</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $que = "SELECT * FROM category";
                $res = mysqli_query($db,$que);
                while($row = mysqli_fetch_array($res)) { ?>
                <tr>
                    <th scope="row"><?php echo $row['catname'] ?></th>
                    <td width=30%><button class="btn btn-success ed" type="button" data-toggle="modal" data-target="#editModal<?php echo $row['catid']; ?>"><span><i class="fa fa-pencil mr-1"></i></span>Edit</button> || <a href="category.php?del_cat=<?php echo $row['catid']; ?>"><button class="btn btn-danger"><span><i class="fa fa-trash mr-1"></i></span>Delete</button></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
    mysqli_data_seek($res,0);
    while($row = mysqli_fetch_array($res)) {
    ?>
    <div class="modal fade" id="editModal<?php echo $row['catid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editcat<?php echo $row['catid']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="catergoryName" class="col-sm-5">Category Name:</label>
                            <div class="col-sm-7">
                                <input type="text" id="categoryName" value="<?php echo $row['catname']; ?>" name="edittext" class="form-control" required>
                                <input type="hidden" name="rowid" value="<?php echo $row['catid'] ?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" form="editcat<?php echo $row['catid']; ?>" name="update" class="btn btn-success"><span><i class="fa fa-pencil-square-o mr-1"></i></span>Update</button>
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
