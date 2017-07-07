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

 

function CardHTML($cardNumber) {


  /*  Get SQL data */
  global $servername, $username, $password, $dbname;
  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "SELECT * FROM Cards WHERE Cell = $cardNumber ORDER BY Id";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          
          //Set card color
          switch ($row["Family"]){
              
               // Scrum Guides
              case "1":
                  $Color = "#95c0cd";
                  break;
              
              // Agile Theory
              case "2":
                   $Color = "#c8f5d8";
                   break;
                   
              // Agile Values
              case "3":
                   $Color = "#a7c6b8"; 
                   break;
                   
              // Agile Manifesto
              case "4":
                    $Color = "#887ea2";
                    break;
              
              //Agile Principles
              case "5":
                    $Color = "#97a3cb";
                    break;
                   
              // Misc
              default:
                   $Color = "#dbe5e4";
                   break;
          }

          // Set Period
          // Team+
          if ((1 <= $cardNumber) && ($cardNumber <= 15)) {
              $Period = "n/a";
          
          // Team
          } elseif ((16 <= $cardNumber) && ($cardNumber <= 30)) {
              $Period = "Team";
          
          // Artifacts
          } elseif ((11 <= $cardNumber) && ($cardNumber <= 45)) {
              $Period = "Artifacts";
          
          // Events
          } elseif ((46 <= $cardNumber) && ($cardNumber <= 60)) {
              $Period = "Events";
          
          // Principles 1
          } elseif ((61 <= $cardNumber) && ($cardNumber <= 75)) {
              $Period = "Principles";
          
          //Principles 2
          } elseif ((76 <= $cardNumber) && ($cardNumber <= 90)) {
              $Period = "Principles";
          
          // Manifesto 1
          } elseif ((91 <= $cardNumber) && ($cardNumber <= 105)) {
              $Period = "Manifesto";
          
          // Manifesto 2
          } elseif ((105 <= $cardNumber) && ($cardNumber <= 120)) {
              $Period = "Manifesto";
          }
          
          
          // Set Group
          //Determine column variable
          $colNumber = $cardNumber;
          if ($colNumber > 16) {

              do {
                  $colNumber = $colNumber - 15;
              } while ($colNumber > 15);
          }
          
          //Set Group Text
          switch ($colNumber){
              
              // Values
              case "1":
                  $Group = "Values";
                  break;
                                
              // Values
              case "2":
                  $Group = "Values";
                  break;
                                
              // Theory
              case "3":
                  $Group = "Theory";
                  break;
                                
              // Theory
              case "4":
                  $Group = "Theory";
                  break;
                                
              // Product
              case "5":
                  $Group = "Product";
                  break;
                                
              // Product
              case "6":
                  $Group = "Product";
                  break;
                                
              // Build
              case "7":
                  $Group = "Build";
                  break;
                                
              // Build
              case "8":
                  $Group = "Build";
                  break;
                                
              // Process
              case "9":
                  $Group = "Process";
                  break;
                                
              // Misc
              case "10":
                  $Group = "n/a";
                  break;
                                
              // Misc
              case "11":
                  $Group = "n/a";
                  break;
                                
              // Misc
              case "12":
                  $Group = "n/a";
                  break;
                                
              // Misc
              case "13":
                  $Group = "n/a";
                  break;
                                
              // Misc
              case "14":
                  $Group = "n/a";
                  break;
                                
              // Misc
              case "15":
                  $Group = "n/a";
                  break;
          }                  
                  
                  
                            
          $Code = $row["Code"];
          $Symbol = $row["Symbol"];
          $Name = $row["FrontName"];
          $BackName = $row["Name"];
          
      }

      /*  start of cHTML heredoc */ 
      echo <<<cHTML
      
          <!--Start of card build -->
          <div class="card-grid" > 
            
            <!-- Start of front -->
            <div class="front"; style="background-color:{$Color}";> 
  
              <!-- Code -->
              <div class="code"><i>{$Code}</i><br></div>
              
              <!-- Symbol -->
              <div class="symbol"><b>{$Symbol}</b></div>
              
              <!-- Name -->
              <div class="name">{$Name}</div>          

            </div> 
          
            <!-- Start of back -->
            <div class="back"; style="background-color:{$Color}";>
                <div class="backname"><b>$BackName</b></div>
                <div class="period"><i>Period: $Period</i></div>
                <div class="group"><i>Group: $Group</i></div>
            </div>           
          </div> 
      
cHTML;

  } 
}

 ?>