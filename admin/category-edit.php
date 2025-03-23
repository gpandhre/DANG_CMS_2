<?php include 'includes/header.php'; ?>
<div class="add-admin">
    <div class="head">
        <h1>EDIT ADMIN</h1>
        <a href="categories.php">
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
                    $categoryId = $_GET['id'];

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

            $categoryId = getById('categories',$categoryId,);
            if($categoryId)
            {
                if($categoryId['status']==200)
                {
                    ?>
                    <input type="hidden" name="categoryId" value="<?= $categoryId['data']['id']?>">
                    <div class="field">
                        <input type="text" placeholder="Name" required name="name" value="<?=$categoryId['data']['name']?>">
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Sub-Category" required name="sub-category" value="<?=$categoryId['data']['sub_category']?>">
                    </div>
                    <div class="field btn">
                        <input type="submit" value="Edit" name="category-edit-btn">
                    </div>
                    </div>
                    <?php
                }
                else
                {
                    echo '<h4>'.$categoryId['message'].'</h4>';
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