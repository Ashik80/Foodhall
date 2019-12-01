<?php include('server.php'); ?>
<?php
if(!isset($_SESSION['customername'])){
    $_SESSION['msg'] = "You must login first";
    header('location: login.php');
}
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['customername']);
    header('location: login.php');    
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
                    <li class="nav-item">
                        <a class="nav-link" href="front.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">Menu</a>
                    </li>
                    <li class="nav-item mr-3 active">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-user mr-1"></i></span><?php echo $_SESSION['customername']; ?></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="menu.php?logout='1'">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="text-center mt-5">
        <h1>Contact Us</h1>
    </div>

    <div class="container border-top">
        <div class="text-center mt-4">
            <h3>We'd <i class="fa fa-heart text-danger"></i> to help!</h3>
            <p>We like to interact with our customers as much as possible</p>
        </div>
        <div class="row">
            <div class="col-md-5 ml-md-5" style="margin-top: 35px;">
                <form>
                    <div class="form-group">
                        <input id="e-name" type="text" class="form-control" name="name" placeholder="Your name">
                    </div>
                    <div class="form-group">
                        <input id="e-email" type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <textarea id="e-msg" class="form-control" name="message" placeholder="Message..." rows="5"></textarea>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <button class="btn btn-success" id="send-email" style="width: 30%">Send</button>
                    </div>
                </form>
                <div class="col-12 mt-3 text-center">
                    <span id="em" class="text-success"></span>
                    <span id="emd" class="text-danger"></span>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    $('#send-email').click(function(e){
                        e.preventDefault();
                        var name = $('#e-name').val();
                        var email = $('#e-email').val();
                        var msg = $('#e-msg').val();
                        if(name == '' || email == ''){
                            $('#emd').text('Plese fill in the details').stop(true,true).show().delay(1000).fadeOut();
                        }
                        else{
                            $('#em').text('Email sent! Thanks for your response').stop(true,true).show().delay(1000).fadeOut();
                            $('#e-name,#e-email,#e-msg').val('');
                        }
                    });
                });
            </script>
            <div class="col-md-5 ml-md-5" style="margin-top: 35px;">
                <div class="row location m-auto">
                    <i class="fa fa-map-marker my-auto" style="font-size: 25px; margin: 30px;"></i>
                    <div class="m-auto text-center">
                        <span>Hackerboys</span><br>
                        <small>Bashundhara, G-block</small>
                    </div>
                </div>
                <div class="row location m-auto" style="margin-top: 20px !important;">
                    <i class="fa fa-phone my-auto" style="font-size: 25px; margin: 30px;"></i>
                    <div class="text-center m-auto">
                        <span>+88 01837-440069</span>
                    </div>
                </div>
                <div class="row location m-auto" style="margin-top: 20px !important;">
                    <i class="fa fa-envelope my-auto" style="font-size: 25px; margin: 30px;"></i>
                    <div class="text-center m-auto">
                        <span>ashikurrahman020995@gmail.com</span>
                    </div>
                </div>
                <div class="border-bottom mt-5"></div>
                <div class="text-center mt-4">
                    <i class="fa fa-facebook" style="font-size: 25px; margin: 0 5px;"></i>
                    <i class="fa fa-twitter" style="font-size: 25px; margin: 0 5px;"></i>
                    <i class="fa fa-google" style="font-size: 25px; margin: 0 5px;"></i>
                    <i class="fa fa-instagram" style="font-size: 25px; margin: 0 5px;"></i>
                    <i class="fa fa-github" style="font-size: 25px; margin: 0 5px;"></i>
                    <p class="mt-2">Hackerboys Inst.</p>
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
