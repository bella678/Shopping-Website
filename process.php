<html>
<body>
<?php
$email=$_POST['email'];
$password=$_POST['pass'];


$conn=new mysqli("localhost","root","","Shopping");
if(!$conn)
{
die("Unable to connect");
}
else{

$sql="select * from login where emailid='$email' and password='$password'";
$result=$conn->query($sql);
if($result->num_rows>0){
$row=$result->fetch_assoc();
if($row['emailid']==$email && $row['password']==$password){
echo "Logged in Successfully";?>
<form method="Post" action="homepage1.php">
<input type="submit" value="Go to homepage">
</form>
<?php
}
}
else{
echo "User Not Found";
}
}

?>
</body>
</html>



