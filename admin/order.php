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
            <a class="navbar-brand ml-5" href="menu.html">Food Hall</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="menu.html">Menu</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="order.html">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sales.html">Sales</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Maintenance
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="products.html">Product</a>
                            <a class="dropdown-item" href="category.html">Category</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    
    <div class="text-center mt-5">
        <h1>Order</h1>
    </div>
    
    <div class="container mt-5">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"><input type="checkbox"></th>
                    <th scope="col">Category</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><input type="checkbox"></th>
                    <td>Appetizer</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td width="20%"><input class="form-control" type="number"></td>
                </tr>
                <tr>
                    <th scope="row"><input type="checkbox"></th>
                    <td>Appetizer</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td width="20%"><input class="form-control" type="number"></td>
                </tr>
                <tr>
                    <th scope="row"><input type="checkbox"></th>
                    <td>Main Course</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td width="20%"><input class="form-control" type="number"></td>
                </tr>
                <tr>
                    <th scope="row"><input type="checkbox"></th>
                    <td>Main Course</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td width="20%"><input class="form-control" type="number"></td>
                </tr>
                <tr>
                    <th scope="row"><input type="checkbox"></th>
                    <td>Desserts</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td width="20%"><input class="form-control" type="number"></td>
                </tr>
                <tr>
                    <th scope="row"><input type="checkbox"></th>
                    <td>Drinks</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td width="20%"><input class="form-control" type="number"></td>
                </tr>
            </tbody>
        </table>
        <div class="row justify-content-sm-center mt-4">
            <input type="text" class="form-control" placeholder="Enter Customer Name" style="width: 300px">
            <button class="btn btn-success ml-2"><span><i class="fa fa-floppy-o mr-1"></i> </span>Save</button>
        </div>
    </div>
    
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