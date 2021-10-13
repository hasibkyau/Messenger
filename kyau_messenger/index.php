<?php
    include_once 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body style="background-color:#009966">



<p>
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
            header("Location:profile.php");
         }
         else
            echo "invalid id or password";
         
     }
   }

  }
?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div  ="24%" align="center" >
 <form action="" method="post">
  <table width="24%"  style="background-color:#FFFFFF">
    <tr>
      <td><div align="center" class="style2"><h3>Login</h3></div></td>
    </tr>
    <tr>
      <td>
        <div style="padding-left:20px" align="left">Student ID </div>
      </td>
    </tr>
    <tr>
      <td><div align="center">
        <input type="text" name="user_id" size="50" placeholder="Type your ID" />
      </div></td>
    </tr>
    <tr>
      <td><div style="padding-left:20px" align="left">Password </div></td>
    </tr>
    <tr>
      <td><div  align="center">
        <input type="password" name="user_password" size="50" PlaceHolder="Type your password" />
      </div></td>
    </tr>
    <tr>
      <td height="63"><div align="center">
        <input type="submit" name="login" value="Login" />
        <input type="submit" name="cancel" value="Cancel" />
      </div></td>
    </tr>
    <tr>
      <td height="27"><div align="center">-or-</div></td>
    </tr>
    <tr>
      <td height="64"><div align="center"><a  href="registration.php">Create New Account</a></div></td>
    </tr>
  </table>
  </form>
  <p>&nbsp;</p>
  
</div>
</body>
</html>


