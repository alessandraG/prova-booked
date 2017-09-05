<html>
<head>
<style>
table {
    width: 50%;
}


 div {
     width: 50px;
     height: 70px;
     text-align: center;
     border-collapse: collapse;

    }
  td, th{
      text-align: center;
      border-collapse: collapse;

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


//- parsare giorno
//- dividere mattina/pomeriggio

$q = "SELECT rs.title, ri.start_date, ri.end_date, r.name
     FROM resources r
     INNER JOIN reservation_resources rr
     ON r.resource_id = rr.resource_id
     INNER JOIN reservation_series rs
     ON rs.series_id = rr.series_id
     INNER JOIN reservation_instances ri
     ON ri.series_id = rs.series_id";


$result = $conn->query($q);

$table="<table cellspacing='2' cellpadding='2'width='450'style='border:1px solid'  >

<tr>
<th>
<font color='black'>aula</font>
</th>
<th>
<font color='black'>title</font>
</th>
<th>
<font color='black'>start date</font>
</th>
<th>
<font color='black'>end date</font>
</th>
</tr>
</table>";

echo $table;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


        $title=$row['title'];
        $start_date = $row['start_date'];
        $end_date=$row['end_date'];
         $name = $row['name'];

         $table="<table  cellpadding='2'width='450'style='border:1px solid'  >
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
                <font color=black> $title
                </font>
            </div>
            </td>
         </th>

         <th>
          <td>
            <div>
              <font color=black> $start_date
              </font>
            </div>
         </td>
         </th>
         <th>
          <td>
            <div>
            <font color=black>$end_date</font>
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
