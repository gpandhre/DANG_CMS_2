<?php include 'includes/header.php'; ?>
<div class="add-category">
    <div class="head">
        <h1>ADD ADMIN</h1>
        <a href="categories.php">
            <button>Back</button>
        </a>
    </div>
   <div class="form-container">
    <?php alertMessage();?>
    <form action="code.php" method="POST">
        <div class="field">
            <input type="text" placeholder="ID" required name="id">
        </div>
        <div class="field">
            <input type="text" placeholder="Name" required name="name">
        </div>
        <div class="field">
            <input type="text" placeholder="Sub-Category" required name="sub-category">
        </div>
        <div class="field btn">
            <input type="submit" value="Add" name="category-save-btn">
        </div>
          
        </form>
   </div>
</div>
<?php include 'includes/footer.php';?>