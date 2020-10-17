<html>
<style>
    table{
        margin-left:10px;
        margin-right:10px;
        padding:3rem;
        border: 4px solid black;
    }
    th{
        padding:0.5rem;
        border: 2px solid black;
    }
    td{
        padding:0.5rem;
        border: 2px solid black;
    }
</style>

<?php
require_once('init.php');
$sql = "SELECT * FROM guests";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 0) {
    echo "No results found.";
} else {
    echo "<table>

<th>ID</th>

<th>First Name</th>

<th>Last Name</th>

<th>Time In</th>

<th>Option</th>

";

while($row = mysqli_fetch_assoc($result)){

echo "<tr><td>".$row["id"]."</td>"."<td>".$row["first_name"]."</td>"."<td>"

.$row["last_name"]."</td>"."<td>".$row["time_in"]."</td>"."<td>".

"<a href='guest-update.php?id=$row[id]'>Update</a>"

." <a href='guest-delete.php?id=$row[id]'>Delete</a>"."</td></tr>";

}

echo "</table>";
}
?>

</html>