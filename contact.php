<?php

if($_POST['submit']) {
    $txtName = $_POST['txtName'];
    $txtEmail = $_POST['txtEmail'];
    $txtPhone = $_POST['txtPhone'];
    $txtMsg = $_POST['txtMsg'];
    $email_body = "<div>";
      
    if(isset($_POST['txtName'])) {
        $txtName = filter_var($_POST['txtName'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Name:</b></label>&nbsp;<span>".$txtName."</span>
                        </div>";
    }
 
    if(isset($_POST['txtEmail'])) {
        $txtEmail = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['txtEmail']);
        $txtEmail = filter_var($txtEmail, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Email:</b></label>&nbsp;<span>".$txtEmail."</span>
                        </div>";
    }
      
    if(isset($_POST['txtPhone'])) {
        $txtPhone = filter_var($_POST['txtPhone'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Phone Number</b></label>&nbsp;<span>".$txtPhone."</span>
                        </div>";
    }
      
    if(isset($_POST['txtMsg'])) {
        $txtMsg = htmlspecialchars($_POST['txtMsg']);
        $email_body .= "<div>
                           <label><b>Message:</b></label>
                           <div>".$txtMsg."</div>
                        </div>";
    }
      
    $recipient = $_POST['txtEmail'];
    $mailTo = "smallbluedev@protonmail.com";
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' ."\r\n"
    .'Content-type: text/html; charset=utf-8' ."\r\n"
    .'From: ' .$txtEmail ."\r\n";

    mail($mailTo, $txtName, $txtPhone, $txtEmail, $txtMsg, $headers);
    header("Location: index.php?mailsend");
}
?>