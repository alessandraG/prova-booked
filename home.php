<html>
<head>
  <link href="style.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8">
</head>
<body>

  <div class="main">

      <div class="header">
        <img src="/sapienza.png" width="143" height="100" />
      </div>

  <div class="content" style="margin-top:40px">

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
                if ($today < "13:00:00"){
                    if ($oraInt < 13){
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
                  // se l'orario è > 13
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
        <br>
        <br>
        <div id="wrapper">
          <div style="width:120px;position: absolute; color:black; bold; left: 550px; font-size:16">
                        Cerchi qualcosa di più specifico? Scansiona il QR Code
          </div>
        <div id='map' style="width:600px;height:400px">
                    <script>
                                     function initMap() {
                                           var map = new google.maps.Map(document.getElementById('map'), {
                                             zoom: 11,
                                             center: {lat: 41.8928511, lng: 12.492875300000037}
                                           });
                                           var trafficLayer = new google.maps.TrafficLayer();
                                           trafficLayer.setMap(map);
                                           }
                     </script>
                     <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
                     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKvI7tLxVnULo1bpEovlNQYNjE5EqBwoQ&callback=initMap"
                    async defer></script>
        </div>
        <div id="div1" style="width:220px;height:220px">
            <p><img src="qrcode.php?text=http://localhost:8888/home2.php&size=400" >
            QR Code</p>

        </div>

       </div>
  </div>
</div>


</body>
</html>
