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
            <a href = 'http://localhost/cms_dang/verify-email.php?token=$verify_token'>Click Here </a> ";

        $mail->Body = $email_template;
        $mail->send();
    }
    catch(Exception $e) 
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
}

// Add admin code.......

    if(isset($_POST['admin-save-btn']))
    {
        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $contact = validate($_POST['contact']);
        $dept = validate($_POST['dept']);
        $password = validate($_POST['password']);
        $cpassword = validate($_POST['cpassword']);
        $verify_token = md5(rand());

        if($name != '' && $email != '' && $contact != '' && $password != '' && $cpassword != '' && $dept != '')
        {
            $check_email_result = mysqli_query($conn,"select email from admin_details where email = '$email' limit 1");
            if(mysqli_num_rows($check_email_result)>0)
            {
                redirect('admin-create.php','Email already exist!');
            }
            $data =[
                'name'=>$name,
                'email'=>$email,
                'contact'=>$contact,
                'dept'=>$dept,
                'password'=>$password,
                'verify_token'=>$verify_token
            ];
            $result = insert('admin_details',$data);
            if($result)
            {
                sendEmail_verify($email, $verify_token);
                redirect('admins.php','Admin Created Successfully');
            }
            else
            {
                redirect('admin-create.php','Something went wrong!');
            }
        }
        else
        {
            redirect('admin-create.php','All the fields are mandatory!');
        }
    }

// Edit admin code.......

    if(isset($_POST['admin-edit-btn']))
    {
        $categoryId =validate($_POST['cate$categoryId']);
        
            $adminData = getById('admin_details',$categoryId);
            if($adminData['status']!=200)
            {
                redirect('admin-edit.php?id='.$categoryId,'All the fields are mandatory!');
            }
            
            $name = validate($_POST['name']);
            $email = validate($_POST['email']);
            $contact = validate($_POST['contact']);
            $dept = validate($_POST['dept']);
            $password = validate($_POST['password']);
            $cpassword = validate($_POST['cpassword']);

            $emailCheck = "select email from admin_details where email = '$email' and id != '$categoryId'";
            $checkEmailResult = mysqli_query($conn,$emailCheck);
            if($checkEmailResult)
            {
                if(mysqli_num_rows($checkEmailResult)>0)
                {
                    redirect('admin-create.php','Email is already in use');
                }
            }
            
            if($password=='')
            {
                $password =$adminData['data']['password'];
            }
            else
            {
                $password = validate($_POST['password']);
            }

            if($name !='' && $email != '')
            {
                $data =[
                    'name'=>$name,
                    'email'=>$email,
                    'contact'=>$contact,
                    'dept'=>$dept,
                    'password'=>$password,
                ];
                $result = update('admin_details',$categoryId,$data);
                if($result)
                {
                    redirect('admins.php?id='.$categoryId,'Admin Updated Successfully');
                }
                else
                {
                    redirect('admin-edit.php?id='.$categoryId,'Something went wrong!');
                }
            }
            else
            {
                redirect('admin-edit.php','All fields are mandatory!');
                
            }

    }

// Add category code.......
    if(isset($_POST['category-save-btn']))
    {
        $id = validate($_POST['id']);
        $name = validate($_POST['name']);
        $subCategory = validate($_POST['sub-category']);

        if($id != '' && $name != '' && $subCategory != '' )
        {
            $check_category_result = mysqli_query($conn,"select name from categories where name = '$name' and '$subCategory' limit 1");
            if(mysqli_num_rows($check_category_result)>0)
            {
                redirect('category-create.php','Category already exist!');
            }
            $data =[
                'id'=>$id,
                'name'=>$name,
                'sub_category'=>$subCategory
            ];
            $result = insert('categories',$data);
            if($result)
            {
                redirect('categories.php','Category Created Successfully');
            }
            else
            {
                redirect('category-create.php','Something went wrong!');
            }
        }
        else
        {
            redirect('category-create.php','All the fields are mandatory!');
        }
    }

//Edit category code.......

if(isset($_POST['category-edit-btn'])) 
{
    $categoryId=validate($_POST['categoryId']);
        
    $categoryData = getById('categories',$categoryId);
    if($categoryData['status']!=200)
    {
        redirect('category-edit.php?id='.$categoryId,'All the fields are mandatory!');
    }
    $name = validate($_POST['name']);
    $subCategory = validate($_POST['sub-category']);
    $checkCategory = "select name from categories where name = '$name' and sub_category = '$subCategory' limit 1";
    $checkCategoryResult = mysqli_query($conn,$checkCategory);

    if($checkCategoryResult)
    {
        if(mysqli_num_rows($checkCategoryResult)>0)
        {
            redirect('category-edit.php','Category already exists');
        }
    }
    if($name !='' && $subCategory != '')
            {
                $data =[
                    'name'=>$name,
                    'sub_category'=>$subCategory
                ];
                $result = update('categories',$categoryId,$data);
                if($result)
                {
                    redirect('categories.php?id='.$categoryId,'Category Updated Successfully');
                }
                else
                {
                    redirect('category-edit.php?id='.$categoryId,'Something went wrong!');
                }
            }
}

//Approve and send complaints
if(isset($_POST['approve-send']))
{
    
}

?>