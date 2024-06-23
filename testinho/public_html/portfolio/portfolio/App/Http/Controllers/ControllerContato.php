<?php

include('./config/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to process the form submission
function processFormSubmission($admin_emails, $dbh)
{
    // Initialize $admin_emails as an empty array
    if (!is_array($admin_emails)) {
        $admin_emails = array();
    }

    // Fetch the administrator's email address to send the email to
    $sql = "SELECT emailId FROM tblemail";
    $query = $dbh->prepare($sql);
    $query->execute();
    $admin_emails_db = $query->fetchAll(PDO::FETCH_COLUMN);

    // Merge with additional admin emails
    $admin_emails = array_merge($admin_emails, $admin_emails_db);

    // Add your personal email address
    $admin_emails[] = "abraao695@gmail.com";


    
    // Process the form if submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Get the values from POST and store them in an associative array
        $data = array(
            'name' => $_POST['name'],
            'phoneno' => $_POST['phonenumber'],
            'email' => $_POST['emailaddres'],
            'subject' => $_POST['subject'],
            'message' => $_POST['message'],
            // Commenting out IP collection for privacy reasons
            //'uip' => $_SERVER['REMOTE_ADDR'],
            'isread' => 0
        );

        // Insert the data into the database
        $sql = "INSERT INTO tblcontactdata (FullName, PhoneNumber, EmailId, Subject, Message, /*UserIp,*/ Is_Read) 
                VALUES (:fname, :phone, :email, :subject, :message, /*:uip,*/ :isread)";
        $query = $dbh->prepare($sql);
        $query->execute(array(':fname' => $data['name'], ':phone' => $data['phoneno'], ':email' => $data['email'], ':subject' => $data['subject'], ':message' => $data['message'], /*':uip' => $data['uip'],*/ ':isread' => $data['isread']));
        $last_insert_id = $dbh->lastInsertId();

        if ($last_insert_id) {
            // Build the email
            $to = implode(',', $admin_emails); // Send to the administrator's email address and your personal email address
            $headers = "MIME-Version: 1.0\r\n";
            $headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers.= "From: abraao695@gmail.com\r\n";
            $ms = "<html><body><div><div><b>Name:</b> {$data['name']},</div><div><b>Phone Number:</b> {$data['phoneno']},</div><div><b>Email Id:</b> {$data['email']},</div>";
            $ms .= "<div style='padding-top:8px;'><b>Message : Email do seu portfólio </b>{$data['message']}</div><div></div></body></html>";

            // Send the email
            $mailSent = mail($to, $data['subject'], $ms, $headers);

            if ($mailSent) {
              echo '<script>successMessage();</script>';
          } else {
              echo '<script>errorMessage();</script>';
          }
            
          
        }
    }
}


