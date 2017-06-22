<?php

//Create connection
$servername = "localhost";
$username = "lazysumo_ptoseng";
$password = "soft1sumo";
$dbname = "lazysumo_PToSCards";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*
$sql = "SELECT * FROM Cards WHERE Cell = '2' ORDER BY Id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["Name"]. " - Symbol: " . $row["Symbol"]. " " . $row["Code"]. "<br>";
    }
} else {
    echo "0 results";
}
*/

function Get_Card($cell_ID)
  {
    
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM Cards WHERE Cell = $cell_ID ORDER BY Id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["Name"] . "<br>";
            echo "Symbol: " . $row["Symbol"] . "<br>";
            echo "Code: " . $row["Code"]. "<br>";
        }
    } else {
        echo "0 results";
    }
  }
  

$conn->close();
?>

