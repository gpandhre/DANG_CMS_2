<?php include 'includes/header.php'; ?>
<div class="admins">
    <div class="head">
        <h1>Admins/Staff - Department</h1>
        <a href="admin-create.php">
            <button>Add Admin</button>
        </a>
    </div>
    
    <div class="tableAdmin">
    <?php alertMessage();?>
        <div class="admin-table-head">
            <h3>ID</h3>
            <h3>Name</h3>
            <h3>Gmail</h3>
            <h3>Verification</h3>
            <h3>Action</h3>
        </div>

        <!-- Displaying all the admins  -->
        <?php 
        $admins = getAll('admin_details');
        if(mysqli_num_rows($admins)>0)
        {
        ?>
        <?php foreach($admins as $adminItem):?>    
            <div class="adminRec">
            <div><?= $adminItem['id']?></div>
            <div><?= $adminItem['name']?></div>
            <div><?= $adminItem['email']?></div>
            <?php 
            if($adminItem['verify_status']==1)
            {
            ?>
            <div>Verified</div> 
            <?php  
            }
            else
            {  
            ?>
            <div>Pending</div>
            <?php
            }
            ?>
            <div>
                <a href="admin-edit.php?id=<?=$adminItem['id']?>"><button class="edit">Edit</button></a>
                <a href="admin-delete.php?id=<?=$adminItem['id']?>"><button class="del">Delete</button></a>
            </div>
        </div>
        <?php endforeach;?> 
        <?php
        }
        else{
        ?>
            <div class="adminRec">
                <h2>No record found..</h2>
            </div>
            <?php
        }  
        ?>
        
    </div>
</div>
<?php include 'includes/footer.php';?>