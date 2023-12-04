<?php

$emailIdentifier =  "Message sent via contact form from " . $_SERVER["SERVER_NAME"];
$successMessage = "* Your Message has been sent!";

if($_POST) {

    $block_success = false;

    $emailTo = openssl_decrypt( $_POST["target_mail"], "AES-128-ECB", "stoneGripMatrixBuild13");

    $name = addslashes(trim($_POST['name']));
    $clientEmail = addslashes(trim($_POST['email'])); 
    $phone = addslashes(trim($_POST['phone']));
    $message = addslashes(trim($_POST['message']));
    $antiSpamHPC = addslashes(trim($_POST['taxid']));
    
    
    $array = array('nameMessage' => '', 'emailMessage' => '', 'phoneMessage' => '', 'messageMessage' => '', 'succesMessage' => '');

    if( $name === '' ) {
        $array['nameMessage'] = 'error';
        $block_success = true;
    }

    if( !filter_var( $clientEmail, FILTER_VALIDATE_EMAIL ) ) {
        $array['emailMessage'] = 'error';
        $block_success = true;
    }

    if( $message === '' ) {
        $array['messageMessage'] = 'error';
        $block_success = true;
    }
    
    if( $block_success === false && $antiSpamHPC === "" ) {	
        
        $message_body = "";
        
        $array["succesMessage"] = $successMessage;

        $headers= "MIME-Version: 1.0" . "\r\n";
        $headers.= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers= "From: " . $name . " <" . $clientEmail .">\r\n";
        $headers.= "Reply-To: " . $clientEmail;
        
        if( $phone !== '' ) {
            $message_body .= "Phone: " . $phone . "\r\n";
        }
        
        $message_body .= "\r\n" . "Message: " . $message;
        
        mail($emailTo, $emailIdentifier, $message_body, $headers);

    }

    echo json_encode($array);

}

?>