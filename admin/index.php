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
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <title>Food Hall</title>
</head>
<body>
    <div>
        <nav style="min-height: 60px" class="navbar navbar-expand-md navbar-dark bg-danger pl-5 pr-5">
            <a class="navbar-brand ml-5" href="#">Food Hall</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Signup</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
    </div>
    <div class="banner bg">
        <div id="intro" class="text-white text-center position-relative">
            <h1 style="font-size: 75px">Online Software for Admin</h1>
            <h3 class="mt-4">Make your restaurant awesome</h3>
        </div>
        <div id="btn-1"><a href="signup.php"><button class="btn btn-danger bt-1">Sign Up >></button></a></div>
    </div>
    <div id="start" class="container mt-5">
        <p style="font-size: 25px"><strong>Order food from the best restaurant Bangladesh</strong></p><br>
        <p class="position-relative" style="top: -20px">Are you hungry? Did you have a long and stressful day? Interested in getting a cheesy pizza delivered to your home or office? Help satisfy your hunger through our online food delivery service.</p>
        <div class="row mt-5">
            <div id="card-appetizers" class="card col-md-4">
                <img src="img/images1.jpeg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Appetizers</h5>
                    <p class="card-text">Start off with some delicious appetizers</p>
                    <a href="#" class="btn btn-success">See more</a>
                </div>
            </div>
            <div id="card-appetizers" class="card col-md-4">
                <img src="img/images2.jpeg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Appetizers</h5>
                    <p class="card-text">Dive into the tummy-filling main course</p>
                    <a href="#" class="btn btn-success">See more</a>
                </div>
            </div>
            <div id="card-appetizers" class="card col-md-4">
                <img src="img/images3.jpeg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Desserts</h5>
                    <p class="card-text">End meals with mouth-watering desserts</p>
                    <a href="#" class="btn btn-success">See more</a>
                </div>
            </div>
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