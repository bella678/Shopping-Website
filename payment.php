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
die("Unable to connect".mysqli_error());
}
else{
if(isset($_POST['btn'])){
$email=$_POST['email'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$Address=$_POST['addr'];
$sql="Insert into payment details Values('$fname','$lname','$email','$Address')";
$result=$conn->query($sql);
if($result){?>
alert("Items are added in the table");
<?php
}
$sql="Select * from ShoppingCart where email='$email'";
$result=$conn->query($sql);
if ($result->num_rows>0) {
$sum=0;
  while($row=$result->fetch_assoc()) {
    $sum=$sum+$row["Total"];
  }?>
<div class="Box2a">
<H2>The Amount to be paid:</H2>
<?php echo"Rs.$sum";
} 
else {?>
  <H2> you have purchased nothing</H2>
<?php
}
}
?>
<form method="POST" action="homepage1.php">
<button>Go to HOMEPAGE</button>
</form>
</div>
<?php
}
?>
</body>
</html>