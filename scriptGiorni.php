<html>
<head>
</head>
<body>

<?php
$q = $_GET['q'];
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

$query = "SELECT rs.title, ri.start_date, ri.end_date, r.name
     FROM resources r
     INNER JOIN reservation_resources rr
     ON r.resource_id = rr.resource_id
     INNER JOIN reservation_series rs
     ON rs.series_id = rr.series_id
     INNER JOIN reservation_instances ri
     ON ri.series_id = rs.series_id";

$result = $conn->query($query);
if ($result->num_rows == 0 )
echo "No result" ;

$row = $result->fetch_assoc();

$numero_record = $result->num_rows;

$name = $row['attribute_value'];

for ($i=0;$i<=$numero_record;$i++){
           $data = explode(" ", $start_date);
           if ($data == $q){
             echo $data;
           }

       }

$conn->close();


?>


     </body>
         </html>
