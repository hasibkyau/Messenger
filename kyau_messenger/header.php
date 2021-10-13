<?php
	require_once("connect.php");
	
			$sql = "select *from login_user ORDER BY id DESC LIMIT 1";
			//$sql = "select *from login_user";
   			$result = mysqli_query($conn, $sql);
		 	$row = mysqli_fetch_assoc($result);
        	//echo " " . $row["user_id"]; 
			
			$id = $row["user_id"];			
			$sql = "SELECT * FROM user_info WHERE user_id = '$id'";
			$result = mysqli_query($conn, $sql);
			$r = mysqli_fetch_assoc($result);
			  
			  		$_SESSION['login'] = 1;	
					$_SESSION['user_id'] = $r["user_id"];					
					$_SESSION['user_name'] = $r["user_name"];
					$name = $_SESSION['user_name'];
					$_SESSION['user_department'] = $r["user_department"];
					$_SESSION['user_batch'] = $r["user_batch"];
					$_SESSION['user_email'] = $r["user_email"];
					$_SESSION['user_mobile'] = $r["user_mobile"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYAU</title>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;300;400;700&display=swap"
    rel="stylesheet">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/bb650370b4.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="CSS/navbar.css" type="text/css">
    <link rel="stylesheet" href="CSS/banner.css">
	 <link rel="stylesheet" href="CSS/main.css">
</head>

<body>
<tr>
    <nav>
        <div class="left">
            <div class="logo">
                <a href="#"><img src="CSS/images/lyau_logo.png" alt="" width="151" ></a>            </div>
                <a href="#"><span class="upper_name">Khwaja Yunus Ali</span><br/><span class="lower_name">University</span></a>
            </div>
        </div>



        <div class="center">
            <ul>

                <li class="programs"><a  href="profile.php">PROFILE</a>                </li>


                <li class="school"><a href="student_info.php">STUDENT_INFO</a> 
                </li>


                <li><a class="admission" href="message.php">MESSENGER</a></li>
                <li><a class="contact" href="">ADMIN</a></li>
            </ul>
        </div>



        <div class="right">
            <ul>
				<li id="login_user">Md. Hasibur Rahman</li>
                <li><i class="fas fa-search"></i></li>
                <LI><a href="index.php">LOGOUT</a></LI>
                <li><i class="fas fa-bars"></i></li>
            </ul>
        </div>


    </nav>
	      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	</tr>
	
	       <script>	
			var p_name = "<?php echo"$name"?>";			
			document.getElementById("login_user").innerHTML = p_name; 		
		  </script></td>
		  
</body>
</html>
