<?php

if($_SERVER["REQUEST_METHOD"] =="POST"){
    //database connection

$servername = "localhost";
$username ="root";
$password ="";
$database = "emailandletter";

//create a connection
$conn = mysqli_connect($servername,$username,$password,$database);


//die if connection was not successful
if(!$conn){
    die("Sorry we failed to connect".mysqli_connect_error());
}
      
      $user_name= $_POST['name'];
      $user_phone= $_POST['phone'];
      $user_email= $_POST['email'];
      $user_address= $_POST['address'];
      $user_desc= $_POST['desc'];
      $existSql="SELECT * FROM contactform where user_email= '$user_email'";
  
      $result = mysqli_query($conn,$existSql);
      $num_rows=mysqli_num_rows($result) ;
          if($num_rows>0){
            echo '<div class="alert alert-success my-0 alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> Email id already in use..
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          }
          else{
            $sql="INSERT INTO `contactform` (`user_name`, `user_phone`, `user_email`,`user_address`,`user_desc`,`user_time`) VALUES ('$user_name','$user_phone','$user_email','$user_address','$user_desc', current_timestamp())";
                  $result = mysqli_query($conn,$sql);
                  if($result){
            echo '<div class="alert alert-success my-0 alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your data has been added successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                  }
             
          }
      
  
      
  }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
    h1 {
        text-align: center;
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .contactform {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center
    }

    .block {

        font-weight: bold;
        border-radius: 10px;
        width: 556px;
        padding: 12px;
        margin: 15px;
        font-size: 15px;
        border: 2px solid #FF4B2B;
        outline: none;
    }

    .submitbtn {
        padding: 10px 16px;
        font-size: 18px;
        border: 2px solid black;
        border-radius: 10px;
        margin: 20px;
        background-color: #FF4B2B;
        color: white;
    }
    }
    </style>
    <title>Telemedicine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
    background-color: orangered;
    border-radius: 30px;
}

</style>
    <div style="padding-top:40px; text-align:center;">
    <h3>If you are going through any of these then click here, you dont need to pay anything!!</h3>
    <button class="button button1"><a href="fever.html" style="text-decoration: none; color:white">Fever</a></button>
    <button class="button button1"><a href="headache.html" style="text-decoration: none; color:white">Headache</a></button>
    <button class="button button1"><a href="indigestion.html" style="text-decoration: none; color:white">Indigestion</a></button>
    <button class="button button1"><a href="coldcough.html" style="text-decoration: none; color:white">Cough and Cold</a></button>
    </div>
<h1 style="text-align:center;">Or</h1>

    <h1>Add Appointment</h1>
    <form class="contactform" action="/contactform/contact.php" method="post">
        <input type="text" class="block" id="name" name="name" placeholder="Enter your Name">
        <input type="text" class="block" id="phone" name="phone" placeholder="Enter your Phone No.">
        <input type="text" class="block" id="email" name="email" placeholder="Enter your E-mail">
        <input type="text" class="block" id="address" name="address" placeholder="Enter your Address">
        <input type="text" class="block" id="desc" name="desc" placeholder="Enter your Symptoms">
    
    <div class="row" >
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
      </form>
                <button type="submit" class="submitbtn" style="position:absolute; top: 1400px; right:500px; ">Submit</button>
    </div>
  </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    <style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>


</body>

</html>