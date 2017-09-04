<html>
<head>
<style>

 div {
     width: 50px;
     height: 70px;
     align-content: center;
    }
  td, th{
      vertical-align: bottom;
    }

</style>
</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "booked_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully"."<br>";

$sql = "SELECT user_id, fname, email FROM users";
$result = $conn->query($sql);
$table="<table cellspacing='2' cellpadding='2'width='450'style='border:1px solid'  >

<tr>

<th>
<font color='black'>id</font>
</th>
<th>
<font color='black'>nome</font>
</th>
<th>
<font color='black'>email</font>
</th>
</tr>
</table>";

echo $table;

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
    //    echo "user_id: ".$row["user_id"]."<br>";
         $id=$row['user_id'];
         $name = $row['fname'];
         $email=$row['email'];

         $table="<table cellspacing='2' cellpadding='2'width='450'style='border:1px solid'  >

         <th>
          <td>
            <div>
                <font color=black> $id
                </font>
            </div>
            </td>
         </th>


         <th>
          <td>
            <div>
              <font color=black> $name
              </font>
            </div>
         </td>
         </th>
         <th>
          <td>
            <div>
            <font color=black>$email</font>
            </div>
         </th>
         </td>
         </table>";
         echo $table;
    }
} else {
    echo "0 results";
}
$conn->close();

?>

</body>
</html>
