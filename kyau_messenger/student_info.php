<style type="text/css">
<!--
.style1 {
	color: #FFFF00;
	padding-left: 15px;
}
.style2 {
	color: #FFFFCC;
	padding-left: 15px;
}
.style3 {
	color: #339900;
	padding-left: 25px;
}
.style4 {color: #a41034}
-->
</style>
<table width="100%">
  <tr>
    <td><?php	require_once("header.php");		?></td>
  </tr>
  <tr>
    <td height="122"><table width="100%" bgcolor="#FFFFCC" >
      <tr>
        <td width="20%" height="95" bgcolor="#FFFFCC"><table width="100%" bgcolor="#FFFFCC"   >
          <tr>
            <td class="style3">Filter</td>
          </tr>
          <tr>
            <td class="style3">&nbsp;</td>
          </tr>
        </table></td>
        <td width="59%" bgcolor="#FFFFCC"><table width="100%" >
          <tr>
            <td><div align="center" class="style4" style="padding:5px 25px">STUDENT LIST </div></td>
          </tr>
          <tr>
            <td height="62"><table width="100%" border="1" bgcolor="#a41034" class="style3" style="padding: 10px">
                <tr>
                  <td width="92%" border="1" ><table width="100%" border="0" >
                      <tr>
                        <td width="18%" class="style1"><div align="left">Name</div></td>
                        <td width="20%" class="style1"><div align="left">ID</div></td>
                        <td width="12%" class="style1"><div align="left">Dept</div></td>
                        <td width="11%" class="style1"><div align="left" class="style1">Batch</div></td>
                        <td width="18%" class="style1"><div align="left" class="style1">Mobile</div></td>
                        <td width="21%" class="style1"><div align="left" class="style1">email</div></td>
                      </tr>
                      <tr>
                        <td class="style2" id="name_list"><div align="left">
                            <?php 
      
   // $sql = "SELECT user_id, user_name, user_password FROM user_info";
	$sql = "SELECT * FROM user_info";
    $result = mysqli_query($conn, $sql);
    $num_of_row = mysqli_num_rows($result);

    if ($num_of_row > 0) {
    // output data of each row
	     while($r = mysqli_fetch_assoc($result)) {
         echo $r["user_name"] . "<br>";
       }
    }

    else {
         echo "0 results";
    }
  
	?>
                        </div></td>
                        <td class="style2" id="id_list"><div align="left">
                            <?php 
      
   // $sql = "SELECT user_id, user_name, user_password FROM user_info";
	$sql = "SELECT * FROM user_info";
    $result = mysqli_query($conn, $sql);
    $num_of_row = mysqli_num_rows($result);

    if ($num_of_row > 0) {
    // output data of each row
	     while($r = mysqli_fetch_assoc($result)) {
         echo $r["user_id"] . "<br>";
       }
    }

    else {
         echo "0 results";
    }
  
	?>
                        </div></td>
                        <td class="style2" id="dept_list"><div align="left">
                            <?php 
      
   // $sql = "SELECT user_id, user_name, user_password FROM user_info";
	$sql = "SELECT * FROM user_info";
    $result = mysqli_query($conn, $sql);
    $num_of_row = mysqli_num_rows($result);

    if ($num_of_row > 0) {
    // output data of each row
	     while($r = mysqli_fetch_assoc($result)) {
         echo $r["user_department"] . "<br>";
       }
    }

    else {
         echo "0 results";
    }
  
	?>
                        </div></td>
                        <td class="style2" id="batch_list"><div align="left">
                            <?php 
      
   // $sql = "SELECT user_id, user_name, user_password FROM user_info";
	$sql = "SELECT * FROM user_info";
    $result = mysqli_query($conn, $sql);
    $num_of_row = mysqli_num_rows($result);

    if ($num_of_row > 0) {
    // output data of each row
	     while($r = mysqli_fetch_assoc($result)) {
         echo $r["user_batch"] . "<br>";
       }
    }

    else {
         echo "0 results";
    }
  
	?>
                        </div></td>
                        <td class="style2" id="mobile_list"><div align="left">
                            <?php 
      
   // $sql = "SELECT user_id, user_name, user_password FROM user_info";
	$sql = "SELECT * FROM user_info";
    $result = mysqli_query($conn, $sql);
    $num_of_row = mysqli_num_rows($result);

    if ($num_of_row > 0) {
    // output data of each row
	     while($r = mysqli_fetch_assoc($result)) {
         echo $r["user_mobile"] . "<br>";
       }
    }

    else {
         echo "0 results";
    }
  
	?>
                        </div></td>
                        <td class="style2" id="email_list"><div align="left" class="style2">
                            <?php 
      
   // $sql = "SELECT user_id, user_name, user_password FROM user_info";
	$sql = "SELECT * FROM user_info";
    $result = mysqli_query($conn, $sql);
    $num_of_row = mysqli_num_rows($result);

    if ($num_of_row > 0) {
    // output data of each row
	     while($r = mysqli_fetch_assoc($result)) {
         echo $r["user_email"] . "<br>";
       }
    }

    else {
         echo "0 results";
    }
  
	?>
                        </div>
                            <div align="left"></div></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="21%"><table width="100%"   cellpadding="2" class="style3">
          <tr>
            <td><div align="center" class="style3">
              <div align="left">Find Student </div>
            </div></td>
          </tr>
          <tr>
            <td><form id="form4" name="form4" method="post" action="">
              <label>
              
                <div align="left">
                  <input type="text" name="user_id" placeholder = "search by ID" />
                  <input type="submit" name = "search"  value="GO"/>
                  </div>
            </form></td>
          </tr>
          <tr>
            <td></label>
              <div align="left">
                <?php
		 if(isset($_POST['search'])){
		 	
			$user_id = $_POST['user_id'];
			
		  	$sql = "SELECT * FROM user_info WHERE user_id = '$user_id'";
   			$result = mysqli_query($conn, $sql);
    		$num_of_row = mysqli_num_rows($result);

    		if ($num_of_row > 0) {
    			// output data of each row
      		while($r = mysqli_fetch_assoc($result)) {
         		echo  "  " . $r["user_name"]. "  " . $r["user_department"] . "  " . $r["user_batch"] . "<br>";
       			}
    		}

    		else {
        		 echo "0 results";
    			}
			}
			
		?>
</div>
              <div align="left"></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

 