<?php
require '../config/function.php';

 if(isset($_GET['id']))
 {
    $categoryId = validate($_GET['id']);
    $categoryData = getById('categories',$categoryId);
    if($categoryData['status']==200)
    {
        $categoryDelete = deleteRows('categories',$categoryId);
        if($categoryDelete)
        {
            redirect('categories.php','Category deleted successfully.');
        }
        else
        {
            redirect('categories.php','Something went wrong!');
             
        }
    }
    else
    {
        redirect('categories.php',$categoryData['status']);
    }
 }
 else
 {
    redirect('categories.php','Something went wrong!');
 }
?>