<?php
    include_once 'includes/dbh.inc.php';

    $unit_number = $_POST['unit_number'];
    $street_address = $_POST['street_address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $company_name = $_POST['company_name'];

    $sql = "SELECT * FROM queue_table WHERE unit_number = $unit_number AND street_name = '$street_address' AND city = '$city' AND country = '$country' AND company_name = '$company_name';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
      ?>
      <!DOCTYPE html>
      <html lang="en" dir="ltr">
        <head>
          <meta charset="utf-8">
          <title></title>
        </head>
        <body style="text-align: center; font-size: 30px; background-color: #48D1CC;">
          <br>
          <?php
          echo '<p class="wait_status" style="text-align: center;">Number of people queued:</p>';
          $row = mysqli_fetch_assoc($result);
          echo '<td align="center"></td>' , $row['line_length'];
          echo '<p class="wait_status" style="text-align: center;">Average wait time:</p>';
          $timeLength = $row['line_length'] * 5;
          echo $timeLength, ' minutes';
        }
        else {
            echo "THAT IS NOT A VALID ADDRESS!";
        }
           ?>
        </body>
      </html>
