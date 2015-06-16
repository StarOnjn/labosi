<?php
 header('Content-type: application/json; charset=UTF-8');
 
 // Set default timezone
  date_default_timezone_set('UTC');
  error_reporting(E_ALL);
  try {

      $ch = curl_init();

// set URL and other appropriate options
      curl_setopt($ch, CURLOPT_URL, "http://stipe.predanic.com/TVZ/podaci.php");
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// grab URL and pass it to the browser
    //  curl_exec($ch);
      $ispis=json_decode($ch,true);
// close cURL resource, and free up system resources
      curl_close($ch);
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/
 
    // Create (connect to) SQLite database in file
    $db = new PDO('sqlite:proizvodi.sqlite');
   
    // Prepare INSERT statement to SQLite3 file db
    $proizvodjac=htmlspecialchars($_GET['proizvodjac']);
	$proizvod= htmlspecialchars($_GET['proizvod']);
	
    $select = "SELECT * FROM proizvodi,proizvodjaci WHERE proizvodi.proizvod LIKE :proizvod AND proizvodjaci.naziv LIKE :proizvodjac AND proizvodi.id_proizvodjaca = proizvodjaci.id ORDER BY proizvodjaci.naziv";
    $stmt = $db->prepare($select);
 
	
	// Bind parameters to statement variables
    $stmt->bindValue(':proizvod', "%".$proizvod."%");
    $stmt->bindValue(':proizvodjac',"%".$proizvodjac."%");
  
 
     // Execute statement
      $stmt->execute();
      $result = $stmt->fetchAll();
      echo json_encode($result);
}
catch( PDOException $Exception ) { 
	 echo $Exception->getMessage() ."\n"; 
 } 
