<?php
include "z_db2.php"; 

// Fetch all messages from the database
$query = "SELECT * FROM chatbot_messages ORDER BY id ASC";
$result = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
$messages = array();
while($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
}

// Return the messages as a JSON string
echo json_encode($messages);