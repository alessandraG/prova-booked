<html>
<head>
  <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>


  <div class="main">
  <div class="header">

    <img src="/sapienza.png" width="143" height="100" />
   </div>
    <div class="content">


<?php
if($_POST['anni']=='2017'){
  $anno = '2017';
}
if($_POST['anni']=='2018'){
  $anno = '2018';
}
if($_POST['anni']=='2019'){
  $anno = '2019';
}
//CHECK MESI
if($_POST['mesi']=='01'){
  $mese='01';
}
if($_POST['mesi']=='02'){
  $mese='02';
}
if($_POST['mesi']=='03'){
  $mese='03';
}
if($_POST['mesi']=='04'){
  $mese='04';
}
if($_POST['mesi']=='05'){
  $mese='05';
}
if($_POST['mesi']=='06'){
  $mese='06';
}
if($_POST['mesi']=='07'){
  $mese='07';
}
if($_POST['mesi']=='08'){
  $mese='08';
}
if($_POST['mesi']=='09'){
  $mese='09';
}
if($_POST['mesi']=='10'){
  $mese='10';
}
if($_POST['mesi']=='11'){
  $mese='11';
}
if($_POST['mesi']=='12'){
  $mese='12';
}

if($_POST['giorni']=='01'){
  $giorno='01';
}
if($_POST['giorni']=='02'){
  $giorno='02';
}

if($_POST['giorni']=='03'){
  $giorno='03';
}

if($_POST['giorni']=='04'){
  $giorno='04';
}

if($_POST['giorni']=='05'){
  $giorno='05';
}

if($_POST['giorni']=='06'){
  $giorno='06';
}

if($_POST['giorni']=='07'){
  $giorno='07';
}

if($_POST['giorni']=='08'){
  $giorno='08';
}

if($_POST['giorni']=='09'){
  $giorno='09';
}

if($_POST['giorni']=='10'){
  $giorno='10';
}

if($_POST['giorni']=='11'){
  $giorno='11';
}

if($_POST['giorni']=='12'){
  $giorno='12';
}

if($_POST['giorni']=='13'){
  $giorno='13';
}

if($_POST['giorni']=='13'){
  $giorno='13';
}

if($_POST['giorni']=='14'){
  $giorno='14';
}

if($_POST['giorni']=='15'){
  $giorno='15';
}

if($_POST['giorni']=='16'){
  $giorno='16';
}

if($_POST['giorni']=='17'){
  $giorno='17';
}

if($_POST['giorni']=='18'){
  $giorno='18';
}

if($_POST['giorni']=='19'){
  $giorno='19';
}

if($_POST['giorni']=='20'){
  $giorno='20';
}

if($_POST['giorni']=='21'){
  $giorno='21';
}

if($_POST['giorni']=='22'){
  $giorno='22';
}

if($_POST['giorni']=='23'){
  $giorno='23';
}

if($_POST['giorni']=='24'){
  $giorno='24';
}

if($_POST['giorni']=='25'){
  $giorno='25';
}

if($_POST['giorni']=='26'){
  $giorno='26';
}

if($_POST['giorni']=='27'){
  $giorno='27';
}

if($_POST['giorni']=='28'){
  $giorno='28';
}

if($_POST['giorni']=='29'){
  $giorno='29';
}

if($_POST['giorni']=='30'){
  $giorno='30';
}

if($_POST['giorni']=='31'){
  $giorno='31';
}

$q=$anno."-".$mese."-".$giorno;

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
else {
  $table="<table width='450'style='border:1px bold:1px solid '  >
  <tr>
  <th>
      <div>
      <font>Classroom</font>
      </div>
  </th>
  <th>
      <div>
  <font>Object</font>
      </div>
  </th>
  <th>
      <div>
  <font>Start Time</font>
      </div>
  </th>
  </tr>
  </table>";
  echo $table;

$row = $result->fetch_assoc();
$numero_record = $result->num_rows;
$name=$row['name'];
$object=$row['title'];
$start_date = $row['start_date'];
for ($i=0;$i<=$numero_record;$i++){
           $row = $result->fetch_assoc();
           $name=$row['name'];
           $object=$row['title'];
           $start_date = $row['start_date'];
           $data=explode(" ", $start_date);
           if ($data[0] == $q ){
             $table="<table width='450'style='border:1px bold:1px solid'>
             <th>
                <div>
                    <font color=black> $name
                    </font>
                </div>
             </th>
             <th>
                <div>
                    <font color=black> $object
                    </font>
                </div>
             </th>
             <th>
                 <div>
                   <font>$data[1]
                   </font>
                 </div>
             </th>
             </table>";
             echo $table;
           }
       }
}
$conn->close();
?>

</div>
</div>

  </body>
  </html>
