<html>
<body>
<?php 
$conn=new mysqli("localhost","root","","Shopping");
if(!$conn){
die("Not Connected".mysql_error());

}
else{
if(isset($_POST['Signup'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['pass'];
$cpassword=$_POST['cpass'];
$sql="Select * from Login where emailid='$email'";
$result=$conn->query($sql);
if($result->num_rows>0){
echo"Account already exists Click on login..";
?>
<form method="post"  action="login.php">
<input type="Submit" value="Login">
</form>
<?php
}
else{
if(preg_match("/^[a-zA-z]{3,}$/",$fname)){
if(preg_match("/^[a-zA-z]{3,}$/",$lname)){
if(preg_match("/^([A-Za-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,3}$/",$email)){
if(preg_match("/^[a-zA-Z0-9_@%&]{8,}$/",$password)){
if(strcmp($password,$cpassword)==0){
$sql="Insert into login Values('$fname','$lname','$email','$password','$cpassword')";
if($conn->query($sql)){
echo"SignUP Successful!!.$fname";
?>
<form method="POST" action="homepage1.php">
<input type="Submit" value="Go to Home Page">
</form>

<?php
}
else{
echo "Could not signUp";
}
}
else{
echo"Password doesnot Match";
}
}
else{
echo"Password is not Strong";
}
}
else{
echo"Invalid Email";
}
}
else{
echo"Invalid lastname";
}
}
else{
echo"Invalid Firstname";
}
}
}
}
?>
</body>
</html>

