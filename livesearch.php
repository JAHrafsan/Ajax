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

$result=mysqli_query($conn,"SELECT * FROM info where assignmentname like  '%$q%' or uploaded_by like '%$q%' ");

$rows=mysqli_num_rows($result);
if ($rows> 0)
{
    echo "<table class='table table-striped table-bordered table-condensed'>";
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>".$row['coursename']."</td>";
		echo "<td>".$row['assignmentname']."</td>";
		echo "<td>".$row['uploaded_by']."</td>";
		echo "<td>".$row['uploaded_at']."</td>";
		echo "<td>".$row['remarks']."</td>";
		echo "<td><a href=./".$row['file_link']." target='_blank'><span class='glyphicon glyphicon-paperclip'></span></a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><span class='glyphicon glyphicon-remove-circle'></span></a></td>";
        //echo "<p><a href='#' class='leftborder'><b>".$row['id'].".".$row['assignmentname']." by ".$row['uploaded_by']."</b></a></p>";
    }
echo "</table>";

}
else
{
    echo "No news found according to this search term";
}
