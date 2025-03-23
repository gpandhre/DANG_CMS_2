<?php include 'includes/header.php'; ?>
<div class="add-admin">
    <div class="head">
        <h1>ADD ADMIN</h1>
        <a href="admins.php">
            <button>Back</button>
        </a>
    </div>
   <div class="form-container">
    <?php alertMessage();?>
   <form action="code.php" method="POST">
          <div class="field">
            <input type="text" placeholder="Name" required name="name">
          </div>
          <div class="field" style="display:flex; gap: 1rem;">
            <input type="text" placeholder="Email Address" required name="email">
            <input type="text" placeholder="Contact Number" required name="contact">
          </div>
          
          <div class="field" style="display:flex; gap: 1rem;">
            <input type="text" placeholder="Department" required name="dept">
          </div>
          
          <div class="field" style="display:flex; gap: 1rem;">
            <input type="password" placeholder="Password" required name="password">
            <input type="password" placeholder="Confirm Password" required name="cpassword">
          </div>
          <div class="field btn">
            <input type="submit" value="Add" name="admin-save-btn">
          </div>
          
        </form>
   </div>
</div>
<?php include 'includes/footer.php';?>