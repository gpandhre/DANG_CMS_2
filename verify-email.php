<?php
include 'config/function.php'; 
session_start();
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_query_run = mysqli_query($conn, "select verify_token,verify_status from admin_details where verify_token ='$token' limit 1");
    if (mysqli_num_rows($verify_query_run) > 0) {
        $row = mysqli_fetch_array($verify_query_run);
        if($row['verify_status']=='0')
        {
            $clicked_token = $row['verify_token'];
            $update_verify_status = mysqli_query($conn,"update admin_details set verify_status = 1 where verify_token='$clicked_token' limit 1 ");
            if($update_verify_status)
            {
                redirect('admin/admins.php','Admin verified successfully.');
            }
            else
            {
                redirect('admin/admin-create.php','Verification Failed.');
                
            }
        }
        else
        {
            redirect('admin/admin-create.php','Email already verified');
        }

    } 
    else 
    {
        redirect('admin/admin-create.php','Something went wrong');
        
    }
} else {
    $_SESSION['status'] = '404 Error';
    header('Location: admin/admin-create.php');
}

?>