<?php
include "../../php.php";

$shipper = $_GET['shipper'];

?>
<!DOCTYPE html>
<html>
  <head>
    <title>RATE MATRIX - <?php echo $shipper; ?></title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' integrity='sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb' crossorigin='anonymous'>
    <script>
      this.resizeTo(750, 800);
    </script>
    <style>
      table, td {
       border: 1px solid black;
       margin: 5px;
       padding: 5px;
     }
      tr:nth-child(odd){
        background: #eee;
     }
     @media screen {
       table {
         width: 700px;
       }
     }
     @media print {
       table {
         width: 99%;
         margin: 0 auto;
       }
       .hideMe {
         display: none;
       }
     }
    </style>
  </head>
  <body id="bodyId">
    <div>
      <a class="btn btn-success btn-sm hideMe" href='javascript:if(window.print)window.print()'>Print</a>
    </div>
    <section>
      <table>
        <?php

        echo "<tr><td></td>";

        $sqlOrigin = "SELECT * FROM origin WHERE originShipper = '" . $shipper . "'";
        $resultOrigin = $conn->query($sqlOrigin);

        while($rowOrigin = $resultOrigin->fetch_assoc())
        {
          echo "<td>" . $rowOrigin['originFull'] . "</td>";
        }

        echo "</tr>";

        $sql = "SELECT * FROM destination INNER JOIN destlist ON destination.destinationShort = destlist.destListShort WHERE destination.destinationShipper = '" . $shipper . "' ORDER BY destinationShort";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $destination = $row['destinationShort'];
            echo '<tr>';
              echo '<td>' . $row['destinationFull'] . '</td>';

                $sqlOrigin = "SELECT * FROM origin WHERE originShipper = '" . $shipper . "'";
                $resultOrigin = $conn->query($sqlOrigin);

                while($rowOrigin = $resultOrigin->fetch_assoc())
                {
                  $origin = $rowOrigin['originShort'];

                  $sqlSsco = "SELECT * FROM ssco a INNER JOIN contract b ON b.contractSsco = a.sscoShort WHERE b.contractShipper = '" . $shipper . "' ORDER BY sscoShort";
                  $resultSsco = $conn->query($sqlSsco);

                  echo "<td>";

                  while($rowSsco = $resultSsco->fetch_assoc()) {
                    $ssco = $rowSsco['sscoShort'];
                    $perContainer = $rowSsco['sscoPerContainer'];

                    $sqlRate = 'SELECT * FROM oceanfreight
                    WHERE oceanfreightSsco = "' . $ssco . '"
                    AND oceanfreightShipper = "' . $shipper . '"
                    AND oceanfreightOrigin = "' . $origin . '"
                    AND oceanfreightDestination = "' . $destination .'" ORDER BY oceanfreightID DESC LIMIT 1';
                    $resultRate = $conn->query($sqlRate);

                    while($rateData = $resultRate->fetch_assoc())
                    {
                      $rate = $rateData['oceanfreightRate'] + $perContainer;
                      echo 'Via ' . $ssco . ' - $' . $rate . '<br />';
                    }
                  }
                  echo "</td>";
                }

            echo '</tr>';
          }
        }

         ?>
      </table>
    </section>
  </body>
</html>
