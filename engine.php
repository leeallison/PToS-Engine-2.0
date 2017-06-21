<?php

//Create connection
$servername = "localhost";
$username = "lazysumo_ptoseng";
$password = "soft1sumo";
//$dbname = "lazysumo_PToSCards";

// Create MySQL connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";



function Get_Card($cell_ID)
  {
    global $conn;  
    //Get the data
    //$sql = 'SELECT * FROM Cards WHERE Cell = "' . $cell_ID . '"';
    $sql = 'SELECT * FROM Cards WHERE Cell = "' . $cell_ID . '"';
    echo $sql;
    $result = $conn->query($sql);
    
    // Need to get this part working, it's now pulling data, just not displaying...
    
    
    //$row = mysql_fetch_array($result);
    
    echo $result[Name];;
  }
  



//SELECT * FROM Customers
//WHERE Country='Mexico';

?>

