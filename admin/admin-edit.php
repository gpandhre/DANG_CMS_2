<?php include 'includes/header.php'; ?>
<div class="add-admin">
    <div class="head">
        <h1>EDIT ADMIN</h1>
        <a href="admins.php">
            <button>Back</button>
        </a>
    </div>
   <div class="form-container">
    <?php alertMessage();?>
    <form action="code.php" method="POST">
        <?php
            if(isset($_GET['id']))
            {
                if($_GET['id']!='')
                {
                    $adminId = $_GET['id'];

                }
                else
                {
                    echo'<h4>No Id Found!</h4>';
                    return false;
                }
            }
            else
                {
                    echo'<h4>Something went wrong!</h4>';
                    return false;
                }

            $adminData = getById('admin_details',$adminId,);
            if($adminData)
            {
                if($adminData['status']==200)
                {
                    ?>
                    <input type="hidden" name="adminId" value="<?= $adminData['data']['id']?>">
                    <div class="field" style="display:flex; gap: 1rem;">
                        <input type="text" placeholder="Name" required name="name" value="<?= $adminData['data']['name']?>">
                    </div>
                    <div class="field" style="display:flex; gap: 1rem;">
                        <input type="text" placeholder="Email Address" required name="email" value="<?= $adminData['data']['email']?>">
                        <input type="text" placeholder="Contact Number" required name="contact" value="<?= $adminData['data']['contact']?>">
                    </div>
                    
                    <div class="field" style="display:flex; gap: 1rem;">
                        <input type="text" placeholder="Department" required name="dept" value="<?= $adminData['data']['dept']?>">
                    </div>
                    
                    <div class="field" style="display:flex; gap: 1rem;">
                        <input type="password" placeholder="Password" name="password">
                        <input type="password" placeholder="Confirm Password" name="cpassword">
                    </div>
                    <div class="field btn">
                        <input type="submit" value="update" name="admin-edit-btn">
                    </div>
                    
   </div>
                    <?php
                }
                else
                {
                    echo '<h4>'.$adminData['message'].'</h4>';
                }
            }
            else
            {
                echo 'Something went wrong!';
                return false;
            }
        ?>
         
          
        </form>
   </div>
</div>
<?php include 'includes/footer.php';?>