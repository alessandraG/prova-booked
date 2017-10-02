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

      $query = "SELECT c.attribute_value, rs.title, ri.start_date, ri.end_date, r.name
                FROM custom_attribute_values c, reservation_instances r, reservation_instances ri, reservation_series rs, resources r
                WHERE c.entity_id = r.reservation_instance_id";


      $result = $conn->query($query);
      if ($result->num_rows == 0 )
          echo "No result" ;

        
      $row = $result->fetch_assoc();

      $numero_record = $result->num_rows;

      $name = $row['attribute_value'];

      for ($i=0;$i<=$numero_record;$i++){
               $row = $result->fetch_assoc();

               $name = $row['attribute_value'];
               if ($name == $q) {

               }

             }

      $conn->close();


      ?>


</body>
</html>
