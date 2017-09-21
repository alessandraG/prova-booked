<html>
<head>
<style>
/* Style the header */
.header {
    background-color: #ab1f1c;
    border: 10px;
    height: 250px;
    width: 100%;
    /*background-image:url('logo-red-sapienza.jpg');*/
    vertical-align: bottom;
}
.column.side {
    width: 25%;
}
.footer {
    background-color: #ab1f1c;
    padding: 10px;
    text-align: right;
}

table {
    width: 100%;
}

div {
    width: 100px;
    height: 90px;
    text-align: center;
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


//variables
$current_dateStart = new DateTime("yesterday");
$current_dateEnd = new DateTime("tomorrow");

//$current_dateStart->setDate(%Y-%m-%d);
$current_dateStart->setTime(7, 00,01);
$current_dateEnd->setTime(23, 59, 59);

// C0SE DA FARE
//- dividere mattina/pomeriggio
//- modificare il fuso orario e mettere quello Italiano
// - creare un file a parte per i CSS

$q = "SELECT rs.title, ri.start_date, ri.end_date, r.name
     FROM resources r
     INNER JOIN reservation_resources rr
     ON r.resource_id = rr.resource_id
     INNER JOIN reservation_series rs
     ON rs.series_id = rr.series_id
     INNER JOIN reservation_instances ri
     ON ri.series_id = rs.series_id";

$result = $conn->query($q);

$today_date=date("Y-m-d");
echo '<div class="header" style="text-align:right;">';
echo 'Aule prenotate';
echo '</div>';

echo '<br>';

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

$row = $result->fetch_assoc();
//echo "query ".$row['name'];
$numero_record = $result->num_rows;
//data di oggi
$p = date('Y-m-d');
//orario attuale
$today = date("H:i:s");
$title=$row['title'];
$start_date = $row['start_date'];
$end_date=$row['end_date'];
$name = $row['name'];
for ($i= 0; $i < $numero_record; $i++){
    $row = $result->fetch_assoc();
    $title=$row['title'];
    $start_date = $row['start_date'];
    $end_date=$row['end_date'];
    $name = $row['name'];
    $oggi = explode(" ", $start_date);

    $oraInizio =  $oggi[1];
    $oraFine =explode(" ", $end_date);
    if ( $p == $oggi[0] ){
        //dividere mattina e pomeriggio
        // se l'orario di adesso è < 13
        if ($today < "13:00:00"){
            if ($oggi[1] < "13:00:00"){
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
                     <font color=black> $oraInizio
                     </font>
                   </div>
                </td>
                </th>
                <th>
                 <td>
                   <div>
                   <font color=black>$oraFine[1]</font>
                   </div>
                </th>
                </td>
                </table>";
                echo $table;
            }
        }
        else {
            if ($oggi[1] > "13:00:00"){
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
                     <font color=black> $oraInizio
                     </font>
                   </div>
                </td>
                </th>
                <th>
                 <td>
                   <div>
                   <font color=black>$oraFine[1]</font>
                   </div>
                </th>
                </td>
                </table>";
                echo $table;
            }
        }


    }
}
echo '<div class="footer">';
echo 'data di oggi:'."\n".$today_date;
echo '</div>';
$conn->close();
?>

</body>
</html>
