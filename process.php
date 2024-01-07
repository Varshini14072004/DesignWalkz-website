<?php

$name = $_POST["name"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$location = $_POST["location"];
$pincode = $_POST["pincode"];
$purpose = $_POST["purpose"];
$project_type = $_POST["project_type"];
$site_location = $_POST["site_location"];
$site_area = $_POST["site_area"];



$host = "localhost";
$dbname = "design1";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO getwalkz (name,contact,email,location,pincode,purpose,project_type,site_location,site_area )
        VALUES (?, ?, ?, ?,?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {

    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sississss",
                       $name,
                       $contact,
                       $email,
                       $location,
                       $pincode,
                       $purpose,
                       $project_type,
                       $site_location,
                       $site_area);

mysqli_stmt_execute($stmt);

echo "Get Quoted Successfully...........";



if( isset($_POST['submit']) ) {
    //getting user data
    $name = $_POST['name'];
    $fromEmail = $_POST['email'];
    $contact = $_POST['contact'];
    $location = $_POST["location"];
    $pincode = $_POST["pincode"];
    $purpose = $_POST["purpose"];
    $project_type = $_POST["project_type"];
    $site_location = $_POST["site_location"];
    $site_area = $_POST["site_area"];

    //Recipient email, Replace with your email Address
    $mailTo = 'designwalkz2019@gmail.com';

    //email subject
    $subject = ' A New Message Received From ' .$name;

    //email message body
    $htmlContent = '<h2> Email Request Received </h2>
    <p> <b>Client Name: </b> '.$name . " "  '</p>
    <p> <b>Email: </b> '.$fromEmail .'</p>
    <p> <b>Contact: </b> '.$contact .'</p>
    <p> <b>Location: </b> '.$location .'</p>
    <p> <b>Pincode: </b> '.$pincode .'</p>
    <p> <b>Purpose: </b> '.$purpose .'</p>
    <p> <b>Project Type: </b> '.$project_type .'</p>';
    <p> <b>Site Area: </b> '.$site_area .'</p>';
    <p> <b>Site Location: </b> '.$site_location .'</p>';



    //header for sender info
    $headers = "From: " .$name . "<". $fromEmail . ">";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    //PHP mailer function
     $result = mail($mailTo, $subject, $htmlContent, $headers);

       //error checking
       if($result) {
        $success = "The message was sent successfully!";
       } else {
        $failed = "Error: Message was not sent, Try again Later";
       }
    }





