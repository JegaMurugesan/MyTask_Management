<?php
include "connection.php";
//mysql_select_db("register",$con);
$query ="select * from student";
$result = mysqli_query($con,$query);

echo "<table border='1' >
<tr>
<td align=center> <b>Roll No</b></td>
<td align=center><b>Name</b></td>
<td align=center><b>Email</b></td>
<td align=center><b>Phone</b></td></td>
<td align=center><b>Action</b></td>";

while($data = mysqli_fetch_row($result))
{   
    echo "<tr>";
    echo "<td align=center>$data[0]</td>";
    echo "<td align=center>$data[1]</td>";
    echo "<td align=center>$data[2]</td>";
    echo "<td align=center>$data[3]</td>";
    echo "<td align=center><a href='edit.php?id=$data[0]'>Edit</a>|<a href='delete.php?id=$data[0]'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";
?>