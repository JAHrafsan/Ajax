<?php
/**
 * Created by PhpStorm.
 * User: mdsae
 * Date: 19-Nov-18
 * Time: 07:27 AM
 */
include('config.php');

///write new query here
$q=$_GET["q"];

$result=mysqli_query($conn,"SELECT * FROM user where email like  '%$q%' ");
$res = Array();
$rows=mysqli_num_rows($result);
if ($rows> 0)
{
    while ($row = mysqli_fetch_assoc($result)) {

        array_push($res,$row['email']);
    }
    
    echo json_encode($res);
}
else
{
    echo json_encode(null);
}
