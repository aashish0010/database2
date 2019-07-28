<?php

include "db.php";

if(isset($_POST['submit']))
{
	$username =$_POST['username'];
	$password=$_POST['password'];
	$id=$_POST['id'];


$query = "UPDATE test";
$query .= " SET username ='$username' ";
$query .= ", password = '$password' ";
$query .= " WHERE id = $id ";

$result = mysqli_query($conn, $query);
if(!$result)
{
	die("query failed".mysqli_error($conn));
}
}
?>


<html>
<head>
<title>updating</title>
<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<div class="container">
	<div class="col-md-6">
		<h1 class="text-center">Update</h1>
		<form action="updatedatabase.php" method="post">
			<div class="form-group">
			<label for="username">username</label>
			<input type="text" name="username" class="form-control">
</div>

<div class="form-group">
	<label for="password">password </label>
<input type="password" name="password" class="form-control">
</div>
<div class="form-group">
	<select name="id" id=" ">

		<?php
	$query = "SELECT *FROM test";
	$result = mysqli_query($conn,$query);
	if(!$result)
	{
		die ('query failed'.mysqli_error());

	}

	while($row  =mysqli_fetch_assoc($result))
	{
		$id = $row['id'];

		echo "<option value= '$id'>$id</option>";
}

?>
</select>
</div>
<input class="btn btn-primary" type="submit" name="submit" value="UPDATE">
</form>
</div>

</body>

</html>