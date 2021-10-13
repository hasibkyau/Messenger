<?php
$conn = mysqli_connect("localhost", "root", "", "kyau_messenger");
$result = mysqli_query($conn, "SELECT * FROM user_info");
 
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
 
echo json_encode($data);
exit();