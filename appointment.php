<?php
date_default_timezone_set('GMT'); 
ini_set('memory_limit','1000M'); 
ini_set('max_execution_time', 1800);

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'slot';

// Create a connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

     

        $ip_address=$_SERVER['REMOTE_ADDR'];
        $curdate=date('Y-m-d h:i:s');
         $selectedDate=isset($_REQUEST['selectedDate1']) && $_REQUEST['selectedDate1'] ? $_REQUEST['selectedDate1'] : "";
         $selectedSlot=isset($_REQUEST['selectedSlot1']) && $_REQUEST['selectedSlot1'] ? $_REQUEST['selectedSlot1'] : "";
          // SQL query to insert data into a table

          
     $sql = "INSERT INTO appointment_details (appointment_date,slot_time) VALUES ('$selectedDate', '$selectedSlot')";
    
    if ($conn->query($sql) === TRUE) {
        $statusMsg = "Data Inserted successfully.";
        $data_string='Success'.','.$statusMsg.',';
    } else {
        $statusMsg = "Failed, please try again.";
        $data_string='NoData'.','.$statusMsg.',';
    }
    echo $data_string; 
    // Close the connection
    $conn->close();

?>