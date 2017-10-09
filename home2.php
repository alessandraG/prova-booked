<html>
<head>
  <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

  <div class="main">
  <div class="header">

  <img src="/sapienza.png" width="143" height="100" /> </div>
  <div class="content">

    <div class="col2">

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

// C0SE DA FARE

//- modificare il fuso orario e mettere quello Italiano
//- aggiungere il ricarico della pagina ogni ora ??



// prima query
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



$table="<table width='450'style='border:1px bold:1px solid '  >
<tr>
<th>

    <div>
    <font>Aula</font>
    </div>

</th>
<th>

    <div>
<font>Title</font>
    </div>

</th>
<th>

    <div>
    <font>Start date</font>
    </div>

</th>
<th>

      <div>
        <font>End date</font>
      </div>

</th>
</tr>
</table>";
echo $table;

$row = $result->fetch_assoc();
//number of record of the table
$numero_record = $result->num_rows;
//today's date
$p = date('Y-m-d');
//current time
$today = date("H:i:s");

$title=$row['title'];
$start_date = $row['start_date'];
$end_date=$row['end_date'];
$name = $row['name'];


for ($i= 0; $i <= $numero_record; $i++){
    $row = $result->fetch_assoc();
    $title=$row['title'];
    $start_date = $row['start_date'];
    $end_date=$row['end_date'];
    $name = $row['name'];
    $oggi = explode(" ", $start_date);
    $oraInizio =  $oggi[1];
    $oraFine =explode(" ", $end_date);
    if ( $p == $oggi[0] ){
      $oraInt = (int)$oraInizio +2;
        // se l'orario di adesso è < 13
        if ($oraInt < 13){
            if ($oggi[1] < "13:00:00"){
                $table="<table  cellpadding='2'width='450'style='border:1px solid'  >
                <th>

                   <div>
                       <font color=black> $name
                       </font>
                   </div>

                </th>
                <th>

                   <div>
                       <font color=black> $title
                       </font>
                   </div>

                </th>
                <th>

                   <div>
                     <font color=black> $oraInizio
                     </font>
                   </div>

                </th>
                <th>

                   <div>
                   <font color=black>$oraFine[1]</font>
                   </div>
                </th>

                </table>";
                echo $table;
            }
        }
        else {
            if ($oraInt > 13){
                $table="<table  cellpadding='2'width='450'style='border:1px '  >
                <th>

                   <div>
                       <font color=black> $name
                       </font>
                   </div>

                </th>
                <th>


                  <div>
                       <font color=black> $title
                       </font>
                   </div>

                </th>
                <th>

                   <div>
                     <font color=black> $oraInizio
                     </font>
                   </div>

                </th>
                <th>
                   <div>
                   <font color=black>$oraFine[1]</font>
                   </div>
                </th>

                </table>";
                echo $table;
            }
        }
    }
}

$conn->close();



?>


</div>


<div class="col1">
<form action="ricercaProfessori.html" method="get">
    <input type="submit" value="Ricerca Professori"
         name="Submit" id="frm1_submit" />
</form>


<form action="ricercaGiorni.html" method="get">
    <input type="submit" value="Ricerca Giorni"
         name="Submit" id="frm1_submit" />
</form>
</div>

</div>
</div>
</body>
</html>
