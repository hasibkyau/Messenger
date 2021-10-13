<?php
	require_once("connect.php");
	
	          //  $in = "INSERT INTO messages(`sender`,`receiver`,`text`)VALUES('2018105050005','2018105050001','hi')";    
		      //  mysqli_query($conn,$in);
?>


<!DOCTYPE html>
<head>
<title>Untitled Document</title>



<style type="text/css">
<!--
.style1 {color: #FFFFCC}
.style2 {}
.style4 {
	color: #990000;
	overflow: auto;
	visibility: visible;
	z-index: auto;
	height: 200px;
}
.style5 {color: #FFFF66}
.style6 {color: #FFFFFF}
.style7 {
	color: #FFFF33;
	padding-left: 15px;
}
.style8 {color: #FFFFCC; }
.style9 {color: #a41034; }
-->
</style>
</head>

<body>
<table width="100%" >
  <tr>
    <td>
	<?php	
	require_once("header.php");	
	?>	</td>
  </tr>
  <tr>
    <td height=""><div style="background-color:#FFFFFF" align="center">
      <table width="100%"  >
        
        
        <tr>
          <td width="21%" bgcolor="#ffffff" ><table width="100%" border="1" cellspacing="2" cellpadding="2">
            <tr>
              <td><div align="center" class="style9">ACTIVE MEMBER </div></td>
            </tr>
            <tr>
              <td><div align="right" class="style4" style="margin:25px">
                <div align="left" class="style8">
                  <?php 
      
   // $sql = "SELECT user_id, user_name, user_password FROM user_info";
	$sql = "SELECT * FROM user_info";
    $result = mysqli_query($conn, $sql);
    $num_of_row = mysqli_num_rows($result);

    if ($num_of_row > 0) {
    // output data of each row
	     while($r = mysqli_fetch_assoc($result))
		 
		 {

         echo "<a href = 'message.php?u_id=".$r["user_id"]."'> ". $r["user_name"] . "_ " . $r["user_batch"] . "th batch" . "</a><br>";
       }
    }

    else {
         echo "0 results";
    }
  
	?>
	
	<?php	
	if(isset($_REQUEST['u_id'])){
		//$_SESSION["to_id"] = $_REQUEST['u_id'];
	$to_id = $_REQUEST['u_id'];
		
		
	$sqll = "SELECT * FROM user_info WHERE user_id='$to_id'";
    $resultt = mysqli_query($conn, $sqll);
	$rr = mysqli_fetch_assoc($resultt);
	$to_name = $rr{"user_name"};
		
	}
	?>
                </div>
              </div></td>
            </tr>
          </table>
            </td>
          <td width="62%" ><table width="100%" border="1" bordercolor="#FFFFCC" bgcolor="#FFFFFF" >
            <tr>
              <td height="43" class="style2" id="example"><div align="center" style="background-color:#a41034">
                  <table width="100%" height="55px" >
                    <tr>
                      <td width="35%">&nbsp;</td>
                      <td width="32%"><div align="center" class="style5">MESSENGER</div></td>
                      <td width="33%"><div align="right" class="style1">
                          <?php 
		  echo $_SESSION['user_name']; 
		  $_SESSION['sender'] = $_SESSION['user_id'];
		  $_SESSION['sender_name'] = $_SESSION['user_name'];
		  
		  
		   if(isset($_POST['send']))
			{
  				$sender = $_SESSION['sender'];
  				$receiver = $_POST['receiver'];
  				$text = $_POST['text'];
  
  				 if(!empty($sender) and !empty($receiver) and !empty($text))
  				 {
    			   	$in = "INSERT INTO messages(`sender`,`receiver`,`text`)VALUES ('$sender','$receiver','$text')";
   				     mysqli_query($conn,$in);         
  				 }
			}  
		  ?>
                        &nbsp;</div></td>
                    </tr>
                  </table>
              </div></td>
            </tr>
            <tr>
              <td height="167" class="style2" id="example"><div align="center">
                  <form action="" method="post" class="style2">
                    <table width="100%" bgcolor="#a41034">
                      <tr>
                        <td colspan="3"><div style="background-color:#FFFFCC" align="center">
                            <table width="100%" height="146" border="1">
                              <tr>
                                <td width="50%" height="35" bgcolor="#a41034"><div align="left" class="style7">
                                    <table width="100%" >
                                      <tr>
                                        <td width="46%"><div align="left"><?php echo $to_name; ?>
                                          <input type="text" name="receiver" size="25" placeholder = "search by Id" value="<?php	if(isset($_REQUEST['u_id']))	echo $to_id;?>"/>
                                        </div></td>
                                        <td width="54%"><div align="right">
                                          <input type="submit" name="delete" value="DELETE" />
										  <?php
										  if(isset($_POST['delete']))
										  {
										  	$s = $_SESSION['user_id'];

										  	$sql = "DELETE FROM messages WHERE receiver = '$to_id' AND sender = '$s'";
											mysqli_query($conn, $sql);
										  	$sql = "DELETE FROM messages WHERE sender = '$to_id' AND receiver = '$s'";
											mysqli_query($conn, $sql);											
										  	echo "deleted";
										  }
										   ?>
                                        </div></td>
                                      </tr>
                                    </table>
                                </div></td>
                                </tr>
                              <tr>
                                <td><div align="center" class="style4" style="margin:25px">
                                    <div align="left" class="style2">
                                      <?php 
			  if(isset($_REQUEST['u_id'])){
			  
			   //getting current user id
			  $my_inbox = $_SESSION['user_id'];
			  
			  //find out the message that comes to this current id
			  $sql = "SELECT * FROM messages";
    		  $result = mysqli_query($conn, $sql);
    		  $num_of_row = mysqli_num_rows($result);
			  
    		  if ($num_of_row > 0)
			  {
			  
			  while($row = mysqli_fetch_assoc($result)) 
			  {
			  
			  //sent message
			  	if( $row['receiver'] == $to_id AND $row['sender'] == $my_inbox)
				
				{
					echo  "<h6>".$_SESSION['user_name']."---".$row['time']."</h6>";
			  		//echo $row["sender"] . " : ";
       		  		echo  $row['text'] . "<br/>" . "<br/>" ;
				}
				
							  	if($row['sender'] == $to_id AND $row['receiver'] == $my_inbox)
				{
										echo  "<h6>".$to_name."---".$row['time']."</h6>";;
			  		//echo $row["sender"] . " : ";
       		  		echo  $row['text'] . "<br/>" . "<br/>" ;
				}
      		  }
			  
			  	//$row = mysqli_fetch_assoc($result);
				//echo $row['text'] . "<br/>" ;
			  }
			  else
			  {
			  	echo "no message found";
			  }
			  
			  }
			  
			  else
			  {
			  	echo "...";
			  }
			 
			  
			  ?>
                                    </div>
                                </div></td>
                                </tr>
                            </table>
                        </div></td>
                      </tr>
                      <tr>
                        <td width="49%" colspan="2">&nbsp;</td>
                        <td width="51%"><div align="center"></div>                          </td>
                      </tr>
                      <tr>
                        <td colspan="2"><label> </label>
                            <label> </label>
                            <div align="left" style="margin:0px 25px"></div>
                          <div align="left"></div>
                          <div align="center"></div></td>
                        <td><div align="left" style="margin:0px 25px">
                          <div align="center"><span class="style6"></div>
                        </div></td>
                      </tr>
                      <tr>
                        <td><label>
                            <div align="center"><span class="style1">Dept</span>.
                              <select name="dept">
                                  <option value="select">Select</option>
                                  <option value="cse">CSE</option>
                                  <option value="eee">EEE</option>
                                  <option value="mte">MTE</option>
                                  <option value="all">All</option>
                                </select>
                            </div>
                        <td><label>
                            <div align="center"><span class="style1">Batch</span>.
                              <select name="batch">
                                  <option value="select">Select</option>
                                  <option value="4rth">All</option>
                                  <option value="4rth">4rth</option>
                                  <option value="5th">5th</option>
                                  <option value="6th">6th</option>
                                  <option value="7th">7th</option>
                                  <option value="8th">8th</option>
                                  <option value="9th">9th</option>
                                  <option value="10th">10th</option>
                                  <option value="11th">11th</option>
                                  <option value="12th">12th</option>
                                  <option value="13th">13th</option>
                                </select>
                            </div>
                        <td><div align="right">
                            <textarea name="text" cols="30" rows="1"></textarea>
                            <input type="submit" name="send" value="send" />
                          </div>                        </tr>
                      <tr>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                    </table>
                  </form>
              </div></td>
            </tr>
          </table></td>
          <td width="17%" colspan="2" bgcolor="#ffffff">&nbsp;</td>
          </tr>
      </table>
      </div></td>
  </tr>
</table>

	<script>
	jsfunction()
	{
		document.getElemnetByID('example').innerHtml = "hello";
	}
	</script>
</body>
</html>