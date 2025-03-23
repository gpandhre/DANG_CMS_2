<?php
require '../config/function.php';

 if(isset($_GET['id']))
 {
    $adminId = validate($_GET['id']);
    $admin = getById('admin_details',$adminId);
    if($admin['status']==200)
    {
        $adminDelete = deleteRows('admin_details',$adminId);
        if($adminDelete)
        {
            redirect('admins.php','Admin deleted successfully.');
        }
        else
        {
            redirect('admins.php','Something went wrong!');
             
        }
    }
    else
    {
        redirect('admins.php',$admin['status']);
    }
 }
 else
 {
    redirect('admins.php','Something went wrong!');
 }
?>