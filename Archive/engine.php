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


echo "<br><br>";

function foo() {
    echo "In foo()<br>";
}

function bar($arg = '')
{
    echo "In bar(); argument was '$arg'.<br />\n";
}

// This is a wrapper function around echo
function echoit($string)
{
    echo $string;
}

$text = 'one';
$func = 'foo';
$func();        // This calls foo()

$func = 'bar';
$func($text);  // This calls bar()

$func = 'echoit';
$func($text);  // This calls echoit()

echo "<br><br>";


function Get_Card($cell_ID)
  {
    
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM Cards WHERE Cell = $cell_ID ORDER BY Id";
    $result = $conn->query($sql);
    
    //Get name for cell and function
    $cell_Name = "cell" . $cell_ID;
    $function_Name = "function" . $cell_ID;
    

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        /*
            echo "Name: " . $row["Name"] . "<br>";
            echo "Symbol: " . $row["Symbol"] . "<br>";
            echo "Code: " . $row["Code"]. "<br>";
        */
        }
    } else {
        echo "0 results";
    }
  }
  

$conn->close();
?>

