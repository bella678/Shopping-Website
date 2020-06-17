<html>
<head>
<style type="text/css">
.Box2a
        {
            position: absolute;
            width:50%;
            align-self: left;
            font-size:90px;
            padding-top:5%;
            padding-left:20%;
            font-size:60px;
            color:lightred;
        }
button {
    -webkit-writing-mode: horizontal-tb !important;
    text-rendering: auto;
    color: -internal-light-dark-color(buttontext, rgb(170, 170, 170));
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    text-align: center;
    cursor: default;
    font: 400 13.3333px Arial;
    font-size:29px;
    width:70%;
    margin-left:30%;
    background-color:rgb(108,39,212);
    border-radius:7px;
}
</style>
</head>
<body>
<?php
$conn=new mysqli("localhost","root","","Shopping");
if(!$conn){
die("Unable to connect".mysqli_error($conn));
}
else{
if(isset($_POST['Add'])){
$email=$_POST['email123']; 
$No=$_POST['item123'];
$Pcode="24E75";
$PName="Watch";
$Price=25000;
$Total=$Price*$No;
$sql="INSERT INTO ShoppingCart Values('$email','$Pcode','$PName','$Price','$No','$Total')";
if($conn->query($sql)===TRUE){
?>
<div class="Box2a">
<H2>Item has been added to cart</H2>
<form method="POST" action="homepage1.php">
<button>Go to Homepage</button>
</form>
<form action="Payment.html">
<button id="amt" name="amt">Total Amount to be Paid</button>
</form>
<?php
}
else{?>
<H2>Unable to connect</H2>
</div>
<?php
}
}
}
?>
</body>
</html>


