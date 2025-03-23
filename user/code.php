<?php
    include "../config/function.php";

    //For Sending verification link..
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function sendEmail_verify($email, $verify_token)
{
    $mail = new PHPMailer(true);

    try{
        $mail->isSMTP();                                            
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'gpandhre97@gmail.com';               
        $mail->Password = 'csiq rqnk nrkl tjdl';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
        $mail->Port = 587;                                    
        $mail->setFrom('gpandhre97@gmail.com', 'CMS');
        $mail->addAddress($email);
        $mail->isHTML(true);

        $mail->Subject = "Email Verification from CMS";

        $email_template = "
            <h2>You have registered with Complaint Management System - Dangs</h2>
            <h5>Verify your email address to login with the below given link</h5>
            <br/><br/>
            <a href = 'http://localhost/cms_dang/verify-user-email.php?token=$verify_token'>Click Here </a> ";

        $mail->Body = $email_template;
        $mail->send();
    }
    catch(Exception $e) 
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
}

// Add admin code.......

    if(isset($_POST['user-signup-btn']))
    {
        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $contact = validate($_POST['contact']);
        $password = validate($_POST['password']);
        $cpassword = validate($_POST['password']);
        $verify_token = md5(rand());

        if($name != '' && $email != '' && $contact != '' && $password != '' && $cpassword != '')
        {
            $check_email_result = mysqli_query($conn,"select email from user_details where email = '$email' limit 1");
            if(mysqli_num_rows($check_email_result)>0)
            {
                redirect('../signup.php','Email already exist!');
            }
            $data =[
                'name'=>$name,
                'email'=>$email,
                'contact'=>$contact,
                'password'=>$password,
                'verify_token'=>$verify_token
            ];
            $result = insert('user_details',$data);
            if($result)
            {
                sendEmail_verify($email, $verify_token);
                redirect('../login-user.php','Registered successfully. Verify your email.');
            }
            else
            {
                redirect('../signup.php','Something went wrong!');
            }
        }
        else
        {
            redirect('../signup.php','All the fields are mandatory!');
        }
    }


?>