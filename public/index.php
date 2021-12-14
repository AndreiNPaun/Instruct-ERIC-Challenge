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

  /*echo '<pre>';
  var_dump($array);
  echo '</pre>';*/
  
  //Unset first array value as it is composed of headers and no real values.
  unset($array[0]);

  //Count all the elements in the array in to $number.
  $number = count($array);

  //Use $number variable to specify how many times the for loop should loop and set all strings within the country code field in the CSV file to all upper.
  for($i=1;$i<=$number;$i++) {

    $array[$i][3] = strtoupper($array[$i][3]); 

  }

?>

<!-- Create form which will display all country codes stored from the CSV file, giving the user the options to select one and display all data related to the chosen country code; 
Redirect to display.php after choice is made. -->
<form action="/display.php" method="POST">
  <label>Country Code: </label>
    <select name="country">
      <?php
      for($i = 2; $i < 10; $i++) {
        ?>
        <option value="<?=$array[$i][3]?>"><?=$array[$i][3]?></option>
      <?php
      }
      ?>
    </select>
  <input type="submit" name="submit" value="Submit" />
</form>