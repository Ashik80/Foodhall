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

date_default_timezone_set('Asia/Dhaka');
if(isset($_GET['confirm'])){
    $user = $_SESSION['customername'];
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
        $sql = "SELECT SUM(total) FROM purchase WHERE customer='$user'";
        $res = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($res);
        $date = date("M d, Y");
        $totalsales = $row['SUM(total)'];
        $order = "INSERT INTO purchase_detail(pdate,customername,totalsales) VALUES ('$date','$user','$totalsales')";
        mysqli_query($db,$order);
        header('location: menu.php');
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
                    <li class="nav-item">
                        <a class="nav-link" href="front.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="menu.php">Menu</a>
                    </li>
                    <li class="nav-item mr-3">
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
        <h1>Our Menu</h1>
    </div>
    <div class="container">
        <div class="tab mt-5">
            <?php 
            $cats = "SELECT catname FROM category";
            $sto = mysqli_query($db,$cats);
            while($row = mysqli_fetch_array($sto)){ ?>
            <button class="tablinks" onclick="openCity(event, '<?php echo $row['catname']; ?>')" id="defaultOpen"><?php echo $row['catname']; ?></button>

            <?php } ?>
        </div>
        <?php 
        mysqli_data_seek($sto,0);
        while($row1 = mysqli_fetch_array($sto)){ ?>
        <div id="<?php echo $row1['catname']; ?>" class="mod tabcontent mt-4">
            <div class="row">
                <?php
                $catn = $row1['catname'];
                $getprod = "SELECT * FROM product WHERE categoryname='$catn'";
                $resp = mysqli_query($db,$getprod);
                while ($foodrow = mysqli_fetch_array($resp)) { ?>
                <div class="card border-0 col-md-3 mb-3">
                    <form id="cart-add<?php echo $foodrow['productid']; ?>" method="post">
                        <div class="card-header">
                            <p class="text-center" style="margin-bottom: 0;"><b><?php echo $foodrow['productname']; ?></b></p>
                            <input id="foodname<?php echo $foodrow['productid']; ?>" type="hidden" name="foodname" value="<?php echo $foodrow['productname']; ?>">
                        </div>
                        <img style="height: 300px; width: 100%;" src="img/<?php echo $foodrow['photo'];?>">
                        <div class="card-footer">
                            <div class="row justify-content-md-center">
                                <span class="text-danger col shop-item-price" style="font-size: 20px; padding: 0 0 0 15px;"><b>BDT <?php echo $foodrow['price']; ?></b></span>
                                <input id="foodprice<?php echo $foodrow['productid']; ?>" type="hidden" name="foodprice" value="<?php echo $foodrow['price']; ?>">
                                <input id="foodquantity<?php echo $foodrow['productid']; ?>" style="width: 25%;" type="number" name="quantity" class="form-control" value="1">
                                <div class="col text-right" style="padding: 0 15px 0 0;">
                                    <button id="submit<?php echo $foodrow['productid']; ?>" type="submit" class="btn btn-danger" form="cart-add<?php echo $foodrow['productid']; ?>" name="addtocartbutton" style="float: right"><i class="fa fa-cart-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <script>
                        $(document).ready(function() {
                            $("#submit<?php echo $foodrow['productid']; ?>").click(function(e) {
                                e.preventDefault();
                                var foodname = $("#foodname<?php echo $foodrow['productid']; ?>").val();
                                var foodprice = $("#foodprice<?php echo $foodrow['productid']; ?>").val();
                                var foodquantity = $("#foodquantity<?php echo $foodrow['productid']; ?>").val();
                                $.ajax({
                                    url: 'addtocart.php',
                                    method: 'post',
                                    data: {
                                        foodname: foodname,
                                        foodprice: foodprice,
                                        quantity: foodquantity
                                    },
                                    success: function(data) {
                                        if(foodquantity>=1){
                                            $("#adde<?php echo $foodrow['productid']; ?>").text("Item added to cart").stop(true,true).show().delay(1000).fadeOut();
                                        }
                                        else{
                                            $("#nval<?php echo $foodrow['productid']; ?>").text("Enter valid quantity!").stop(true,true).show().delay(1000).fadeOut();
                                        }
                                    }
                                });
                                loaded();
                                
                            });
                            
                            loaded();
                            
                        });

                    </script>
                    <span class="text-success text-center mt-2" id="adde<?php echo $foodrow['productid']; ?>"></span>
                    <span class="text-danger text-center mt-2" id="nval<?php echo $foodrow['productid']; ?>"></span>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <script>
            function openCity(evt, foodcat) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(foodcat).style.display = "block";
                evt.currentTarget.className += " active";
            }
            document.getElementById("defaultOpen").click();

        </script>

        <div class="mycart" style="position: fixed; bottom: 20px; right: 45px;">
            <button onclick="disp(); displayPrice();" class="btn btn-danger" style="font-size: 30px;" id="cartbutton" data-toggle="modal" data-target="#cartModal"><small><span id="itemcount"></span></small><i class="fa fa-shopping-cart"></i></button>
        </div>
        <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title col-11 text-danger text-center" id="exampleModalLabel" style="font-size: 30px;"><b>My Cart</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="cart-head mb-3">
                                <div class="row">
                                    <div class="col-3">
                                        <span><b>Item</b></span>
                                    </div>
                                    <div class="col-3">
                                        <span><b>Price</b></span>
                                    </div>
                                    <div class="col-3">
                                        <span><b>Quantity</b></span>
                                    </div>
                                </div>
                            </div>
                            <div id="cartitems">
                                <script>
                                    function disp() {
                                        $.ajax({
                                            url: 'loadcart.php',
                                            method: 'post',
                                            data: {
                                                cartitems: '1'
                                            },
                                            success: function(data) {
                                                $("#cartitems").html(data);
                                            }
                                        });
                                    }


                                    function displayPrice() {
                                        $.ajax({
                                            url: 'totalprice.php',
                                            method: 'post',
                                            data: {
                                                totprice: '1',
                                            },
                                            success: function(data) {
                                                $("#prc").text(data);
                                            }
                                        });
                                    }
                                    
                                    function del(id){
                                        $.ajax({
                                            url: 'delcartitem.php',
                                            method: 'post',
                                            data: {
                                                delcartitem: '1',
                                                id: id
                                            },
                                            success: function(data) {
                                                $("#deletemsg").text("Item removed").stop(true,true).show().delay(1000).fadeOut();
                                                
                                            }
                                        });
                                    }
                                    function loaded(){
                                        $.ajax({
                                            url: 'totalitem.php',
                                            method: 'post',
                                            data: {
                                                count: '1'
                                            },
                                            success: function(data) {
                                                $("#itemcount").text(data);
                                            }
                                        });
                                    }

                                </script>

                            </div>
                            <div class="text-center mt-3">
                                <span id="deletemsg" class="text-danger"></span>
                            </div>
                            <div class="total-price mt-3">
                                <div class="row justify-content-md-center">
                                    <span class="col text-right"><b>TOTAL</b></span>
                                    <span id="crtprc" class="col cart-total-price">BDT <span id="prc"></span></span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer border-0">
                        <a href="menu.php?confirm='1'"><button name="confirm" class="btn btn-success" style="font-size: 20px;">Confirm</button></a>
                    </div>
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
