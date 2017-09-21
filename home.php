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


//- dividere mattina/pomeriggio
$current_dateStart = new DateTime("yesterday");
$current_dateStart->setTime(7, 00, 01);
$current_dateEnd = new DateTime("tomorrow");
$current_dateEnd->setTime(23, 59, 59);


//echo $current_dateStart->format('Y-m-d H:s:i')."\n";
//echo $current_dateEnd->format('Y-m-d')."\n";

//$data = date_format($current_dateStart, 'Y/m/d');
//echo $data;



$q = "SELECT rs.title, ri.start_date, ri.end_date, r.name
     FROM resources r
     INNER JOIN reservation_resources rr
     ON r.resource_id = rr.resource_id
     INNER JOIN reservation_series rs
     ON rs.series_id = rr.series_id
     INNER JOIN reservation_instances ri
     ON ri.series_id = rs.series_id";

//     WHERE date_format(ri.start_date, '%Y-%m-%d') > '2017-09-19'
//     AND date_format(ri.start_date, '%Y-%m-%d') < '2017-09-21' "

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

$row = $result->fetch_assoc();
//echo "query ".$row['name'];


$numero_record = $result->num_rows;

//data di oggi
$p = date('Y-m-d');
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
    //echo "titolo: ".$title." e data inizio: ".$start_date." e data di fine: ".$end_date." e nome: ".$name."\n"."\n"."\n"."\n";
    $oggi = explode(" ", $start_date);
    if ( $p == $oggi[0] ){
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
}


/*
$num = 0;
if ($result->num_rows > 0) {
    $numero_record = $result->num_rows;

    // output data of each row
    for ($i= 0; $i < $numero_record; $i++){
        echo $i;
        $num = $num++;
        $row = $result->fetch_assoc() ;
        $p = date('Y-m-d');
        //contatore per vedere a che numero di record siamo

        //echo $num;
        $oggi = explode(" ", $start_date);

        //numero di record che ci sono nella query

        $title=$row['title'];
        $start_date = $row['start_date'];
        $end_date=$row['end_date'];
        $name = $row['name'];

         if ( $p == $oggi[0] ){
         echo "ciao";

         $title= mysql_result($result, $num,'title');
         $start_date = mysql_result($result, $num,'start_date');
         $end_date=mysql_result($result, $num,'end_date');
         $name = mysql_result($result, $num,'name');


         echo $title." e ".$start_date." e ".$end_date." e ".$name;
         //echo "la data di questa prenotazione è: ".$oggi[0];
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
}
}
else {
    echo "0 results";
}
*/
$conn->close();

?>

</body>
</html>

