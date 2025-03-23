<?php
include 'config/function.php';

if(isset($_POST['admin-login-btn']))
{
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if($email != '' && $password != '')
    {
        $query = "select * from admin_details where email = '$email' and password = '$password' limit 1";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {
                $row = mysqli_fetch_assoc($result);
                if($row["verify_status"]=='1')
                {
                    $_SESSION["admin-authenticated"] = true;
                    $_SESSION["auth_admin"] = 
                    [
                        "admin_id" => $row["id"],
                        "username"=> $row["name"],
                        "phone"=> $row["contact"],
                        "email"=> $row["email"],
                    ];

                    redirect('admin/index.php');
                }
                else
                {
                    $_SESSION['status'] = 'Please verify your email address.';
                    header("Location:login.php");
                    exit(0);
                }
            }
            else
            {
                redirect('login.php','Invalid credentials!');
            }
        }
        else
        {
            redirect('login.php','Somethin went wrong!');
        }
    }
    else
    {
        redirect('login.php','All fields are mandatory');
    }

}
if(isset($_POST['user-login-btn']))
{
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if($email != '' && $password != '')
    {
        $query = "select * from user_details where email = '$email' and password = '$password' limit 1";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {
                $row = mysqli_fetch_assoc($result);
                if($row["verify_status"]=='1')
                {
                    $_SESSION["user-authenticated"] = true;
                    $_SESSION["auth_user"] = 
                    [
                        "username"=> $row["name"],
                        "phone"=> $row["contact"],
                        "email"=> $row["email"],
                    ];

                    redirect('user/index.php');
                }
                else
                {
                    $_SESSION['status'] = 'Please verify your email address.';
                    header("Location:login.php");
                    exit(0);
                }
            }
            else
            {
                redirect('login.php','Invalid credentials!');
            }
        }
        else
        {
            redirect('login.php','Somethin went wrong!');
        }
    }
    else
    {
        redirect('login.php','All fields are mandatory');
    }

}

?>