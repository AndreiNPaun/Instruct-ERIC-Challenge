<?php

class Database {

	private $csv;

	public function __construct($csv) {
		$this->csv = $csv;
	}

    public function loadCSV() {

        //Checks if the file exists before proceeding forward and opens the datase of the CSV file.
        if (($file = fopen("../csv/" . $this->csv, "r")) !== FALSE) {
        
            //Reads the CSV file lines.
          while (($data = fgetcsv($file, 1000, ",")) !== FALSE) 
          {        
            $array[] = $data; 
          }
          
          //Close CSV file.
          fclose($file);

          //Check array data
          /*echo '<pre>';
          var_dump($array);
          echo '</pre>';*/

          return $array;
        }

        //Error message in case CSV file is not found.
        else {
            echo '<p>CSV file not found.</p>';
        }
    }
}