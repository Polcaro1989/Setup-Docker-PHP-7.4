<?php
include "z_db2.php"; 

// getting user message through ajax
$user_message = mysqli_real_escape_string($con, $_POST['text']);

// Insert the user message into the chatbot_messages table with an empty bot response
$insert_data = "INSERT INTO chatbot_messages (user_message, bot_response) VALUES ('" . mysqli_real_escape_string($con, $user_message) . "', '')";
$result = mysqli_query($con, $insert_data) or die("Error: " . mysqli_error($con));
if($result){
    echo "Mensagem recebida. Uma resposta será fornecida em breve.";
}else{
    echo "Erro ao inserir dados no banco de dados";
}