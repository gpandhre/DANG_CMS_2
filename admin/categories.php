<?php include 'includes/header.php'; ?>
<div class="categories">
    <div class="head">
        <h1>Categories</h1>
        <a href="category-create.php">
            <button>Add Category</button>
        </a>
    </div>
    
    <div class="tableCategory">
    <?php alertMessage();?>
        <div class="category-table-head">
            <h3>ID</h3>
            <h3>Name</h3>
            <h3>Sub Category</h3>
            <h3>Action</h3>
        </div>

        <!-- Displaying all the admins  -->
        <?php 
        $categories = getAll('categories');
        if(mysqli_num_rows($categories)>0)
        {
        ?>
        <?php foreach($categories as $categoriesItem):?>    
            <div class="category-rec">
            <div><?= $categoriesItem['id']?></div>
            <div><?= $categoriesItem['name']?></div>
            <div><?= $categoriesItem['sub_category']?></div>
            <div>
                <a href="category-edit.php?id=<?=$categoriesItem['id']?>"><button class="edit">Edit</button></a>
                <a href="category-delete.php?id=<?=$categoriesItem['id']?>"><button class="del">Delete</button></a>
            </div>
        </div>
        <?php endforeach;?> 
        <?php
        }
        else{
        ?>
            <div class="category-rec">
                <h2>No record found..</h2>
            </div>
            <?php
        }  
        ?>
        
    </div>
</div>
<?php include 'includes/footer.php';?>