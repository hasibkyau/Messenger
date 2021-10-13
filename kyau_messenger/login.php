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
  if(isset($_POST['login']))
	{
		
 		$user_id = $_POST['user_id'];
  		$user_password = $_POST['user_password'];
		


   if(!empty($user_id) and !empty($user_password))
   {
     $sql = "SELECT * FROM user_info WHERE user_id = '$user_id' AND user_password = '$user_password'";;

     if($result = mysqli_query($conn, $sql)){
         if(mysqli_num_rows($result) > 0){
            $in = "INSERT INTO login_user(`user_id`) VALUES ('$user_id')";      
		    mysqli_query($conn,$in);	
			
			$_SESSION['login'] = 1;	
			$_SESSION['user_id'] = $rows["user_id"];					
			$_SESSION['user_name'] = $rows["user_name"];
			$_SESSION['user_department'] = $rows["user_department"];
			$_SESSION['user_batch'] = $rows["user_batch"];
			$_SESSION['user_email'] = $rows["user_email"];
			$_SESSION['user_mobile'] = $rows["user_mobile"];
			
            header("Location:index.php");
         }
         else
            echo "invalid id or password";
         
     }
   }

  }
?>



<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><div align="center">
	<form action="" method="post">
      <table width="40%" border="0" cellspacing="2" cellpadding="2" bgcolor="#CCFFFF">
        <tr>
          <td><div align="center" class="style2">Login Board </div></td>
        </tr>
        <tr>
          <td><div align="center"><input type="text" name="user_id" size="32" PlaceHolder="ID" /></div></td>
        </tr>


		<tr>
          <td><div align="center"><input type="password" name="user_password" size="32" PlaceHolder="Password" /></div></td>
        </tr>

		
        <tr>
          <td><div align="center">
            <input type="submit" name="login" value="Login" />
            <input type="submit" name="cancel" value="Cancel" />
          </div></td>
        </tr>
      </table></form>
    </div></td>
  </tr>
</table>

</body>
</html>


