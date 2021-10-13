<?php
    include_once 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php

  if(isset($_POST['cancel'])){
  	header("Location:index.php");
  }
  if(isset($_POST['registration']))
	{
  $user_id = $_POST['user_id'];
  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];
  $user_email = $_POST['user_email'];
  $user_batch = $_POST['user_batch'];
  $user_mobile = $_POST['user_mobile'];
  $user_department = $_POST['user_department'];

   if(!empty($user_id) and !empty($user_password) and !empty($user_name) and !empty($user_email) and !empty($user_batch) and !empty($user_department)
   and !empty($user_mobile))
   {
     $sql = "SELECT * from user_info WHERE user_id = '$user_id'";

     if($result = mysqli_query($conn, $sql)){
         if(mysqli_num_rows($result) == 0){
            $in = "INSERT INTO user_info(`user_id`,`user_name`,`user_password` ,`user_email` ,`user_department`,`user_batch` ,`user_mobile`)
				VALUES ('$user_id','$user_name','$user_password' ,'$user_email','$user_department','$user_batch','$user_mobile')";
           
		   mysqli_query($conn,$in);
            header("Location:index.php");
         }
         else
            echo "already exist";
         
     }
   }

  }

  if(isset($_POST['database']))
  {
      
   // $sql = "SELECT user_id, user_name, user_password FROM user_info";
	$sql = "SELECT * FROM user_info";
    $result = mysqli_query($conn, $sql);
    $num_of_row = mysqli_num_rows($result);

    if ($num_of_row > 0) {
    // output data of each row
      while($r = mysqli_fetch_assoc($result)) {
         echo " " . $r["user_id"]. "  " . $r["user_name"]. "  " . $r["user_password"]. "  ". $r["user_mobile"] . "  " . $r["user_department"] . "  " . $r["user_batch"] . "<br>";
       }
    }

    else {
         echo "0 results";
    }
  }

  if(isset($_POST['delete'])){
    echo "not delted";
  }



?>

<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><div align="center">
	<form action="" method="post">
      <table width="40%" border="0" cellspacing="2" cellpadding="2" bgcolor="#CCFFFF">
        <tr>
          <td><div align="center" class="style2">User Registration Board </div></td>
        </tr>
        <tr>
          <td><div align="center"><input type="text" name="user_id" size="32" PlaceHolder="ID" /></div></td>
        </tr>

        <tr>
          <td><div align="center"><input type="text" name="user_name" size="32" placeholder="Name" /></div></td>
        </tr>
		
        <tr>
          <td><div align="center">
            <input type="text" name="user_email" size="32" placeholder="Email" />
          </div></td>
        </tr>
		
		<tr>
          <td><div align="center"><input type="text" name="user_department" size="32" PlaceHolder="Department" /></div></td>
        </tr>
		
		<tr>
          <td><div align="center"><input type="text" name="user_batch" size="32" PlaceHolder="Batch" /></div></td>
        </tr>

		<tr>
          <td><div align="center"><input type="text" name="user_mobile" size="32" PlaceHolder="Mobile" /></div></td>
        </tr>

		<tr>
          <td><div align="center"><input type="password" name="user_password" size="32" PlaceHolder="Password" /></div></td>
        </tr>

		
        <tr>
          <td><div align="center">
            <input type="submit" name="registration" value="Registration" />
            <input type="submit" name="cancel" value="Cancel" />
          </div></td>
        </tr>
      </table></form>
    </div></td>
  </tr>
</table>

</body>
</html>


