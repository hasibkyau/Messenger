 <?php
     include_once 'connect.php';
	 
		  	$sql = "select *from login_user ORDER BY id DESC LIMIT 1";
			//$sql = "select *from login_user";
   			$result = mysqli_query($conn, $sql);
		 	$row = mysqli_fetch_assoc($result);
        	//echo " " . $row["user_id"]; 
			$id = $row["user_id"];
			
			
			$sql = "SELECT * FROM user_info WHERE user_id = '$id'";
			$result = mysqli_query($conn, $sql);
			$r = mysqli_fetch_assoc($result);
						 
			 $name = $r["user_name"];
			 $department = $r["user_department"];
			 $batch = $r["user_batch"];
			 $id = $r["user_id"];
			 $email = $r["user_email"];	
		?>
		
<!DOCTYPE html>
<head>
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #A41034}
.style3 {color: #00FFFF}
.style2 {	color: #FFFFCC;
	padding-left: 25px;
}
-->
</style>
</head> 
<body>
<tr height="100%">
  <td><table width="100%" cellspacing="2" cellpadding="2">
      <tr>
        <td><?php	require_once("header.php");		?></td>
      </tr>
      <tr>
        <td><h2 align="center" class="style1">MY PROFILE</h2>
          <table width="100%" height = "400" cellspacing="2" cellpadding="2">
            <tr>
              <td width="24%" height="349">&nbsp;</td>
              <td width="55%"><div align="center">
                <table width="96%" height="200" cellspacing="2" cellpadding="2" style="background:#a41034" >
                  <tr>
                    <td width="29%"><div align="left" class="style2">Name</div></td>
                    <td width="71%" class="style2" id="name">&nbsp;</td>
                  </tr>
                  <tr>
                    <td><div align="left" class="style2">Department</div></td>
                    <td class="style2" id="department">&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="style2"><div align="left">Batch</div></td>
                    <td class="style2" id="batch">&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="style2"><div align="left">ID</div></td>
                    <td class="style2" id="id">&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="style2"><div align="left">Email</div></td>
                    <td class="style2" id="email">&nbsp;</td>
                  </tr>
                </table>
              </div></td>
              <td width="21%">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
          </table>
          <p align="center">&nbsp;</p>
          <script>
		
			var p_name = "<?php echo"$name"?>";
			var p_department = "<?php echo"$department"?>";
			var p_batch = "<?php echo"$batch"?>";
			var p_id = "<?php echo"$id"?>";
			var p_email = "<?php echo"$email"?>";
			
			document.getElementById("name").innerHTML = p_name;
			document.getElementById("department").innerHTML = p_department; 
			document.getElementById("batch").innerHTML = p_batch; 
			document.getElementById("id").innerHTML = p_id; 
			document.getElementById("email").innerHTML = p_email;  
			
		  </script></td>
      </tr>
    </table>
    <p>&nbsp;</p>      </td>
</tr><tr></tr>
</body>
</html>