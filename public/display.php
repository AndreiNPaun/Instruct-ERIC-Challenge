<link rel="stylesheet" type="text/css" href="../css/style.css" />
<?php

//Imports the database file which will load the CSV file.
require '../App/Database.php';

//Store the name of the CSV file to upload on the app.
$csvFile = 'services.csv';

//Creates a new Database object.
$database = new Database($csvFile);

//Uses the loadCSV function from the Database.php to load the specified CSV file.
$array = $database->loadCSV();

//Create a second variable which will convert the already converted country code from all upper to all lower.
$countryLowerCase = strtolower($_POST['country']);

//Create a number variable with the value set to 0 which will aid in counting all returning elements based on the chosen country code.
$numbers = 0;

//Loop counting all returning elements.
foreach ($array as $number) {
  if ($number[3] === $_POST['country'] || $number[3] === $countryLowerCase) {
    $numbers = $numbers + 1;
  }
}
?>

<!--  Text message which will display the selected country code and the number of returned values associated with it. -->
<h2>Total Number of Services in country with code <?=$_POST['country']?> is <?=$numbers?>. Click <a href="/index.php">Back</a> to search again.</h2>

<!--  Table which will store all returned data -->
          <table>
          <tr>
            <th>No.</th>
            <th>Ref</th>
            <th>Centre</th>
            <th>Service</th>
            <th>Country</th>
          </tr>
<?php

  //Create a count variable which will completed the No. column of the table.
  $count = 0;

  //Loops through all the returned data and place it into table rows.
  foreach($array as $country){
      if ($country[3] === $_POST['country'] || $country[3] === $countryLowerCase) {
        $count = $count + 1;
        ?>
          <tr>
            <td><?=$count?></td>
            <td><?=$country[0]?></td>
            <td><?=$country[1]?></td>
            <td><?=$country[2]?></td>
            <td><?=$country[3]?></td>
          </tr>

        <?php
      }
  }

?>
      </table>
<?php