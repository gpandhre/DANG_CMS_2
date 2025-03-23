 <!-- Side Bar Starts Here -->

 <ul>

<div>
  <span class="logo">CMS</span>
  <button onclick=toggleSidebar() id="toggle-btn">
    <i class="ri-menu-line"></i>
  </button>
</div>

<li class="active">
  <a href="index.php">
    <i class="ri-home-4-fill"></i>
    <span>Home</span>
  </a>
</li>



<li>
  <button onclick=toggleSubMenu(this) class="dropdown-btn">
     <i class="ri-global-fill"></i>
    <span>Language</span>
    <i class="ri-arrow-down-s-line" style="margin-left:1.5rem"></i>
  </button>
  <ul class="sub-menu">
    <div>
      <li><a href="#">English</a></li>
      <li><a href="#">Gujarati</a></li>
    </div>
  </ul>
</li>

<li>
  <button onclick=toggleSubMenu(this) class="dropdown-btn">
    <i class="ri-chat-unread-fill"></i>
    <span>Complaints</span>
    <i class="ri-arrow-down-s-line"style="margin-left:.8rem"></i>
  </button>
  <ul class="sub-menu">
    <div>
      <li><a href="categories.php">Category</a></li>
      <li><a href="#">Major Problems</a></li>
      <li><a href="#">Solutions</a></li>
    </div>
  </ul>
</li>

<li>
  <button onclick=toggleSubMenu(this) class="dropdown-btn">
    <i class="ri-bar-chart-2-fill"></i>
    <span>Complaints<br>Analysis</span>
    <i class="ri-arrow-down-s-line"style="margin-left:.72rem"></i>
  </button>
  <ul class="sub-menu">
    <div>
      <li><a href="#">Analysis</a></li>
    </div>
  </ul>
</li>

<li>
  <button onclick=toggleSubMenu(this) class="dropdown-btn">
    <i class="ri-team-fill"></i>
    <span>Admins/Staff</span>
    <i class="ri-arrow-down-s-line"></i>
  </button>
  <ul class="sub-menu">
    <div>
      <li><a href="admin-create.php">Add Admin</a></li>
      <li><a href="admins.php">View Admins</a></li>
    </div>
  </ul>
</li>

<li>
  <a href="#">
    <i class="ri-guide-fill"></i>
    <span>Guide</span>
  </a>
</li>

<!-- Checking if the authentication is done or not.
 if the authentication is done the profile section will
 contain user's name and manage account option -->

<?php if(isset($_SESSION['admin-authenticated'])):?>
<li>

  <button onclick=toggleSubMenu(this) class="dropdown-btn">
    <i class="ri-profile-fill"></i>
    <span>Profile</span>
    <i class="ri-arrow-down-s-line"style="margin-left:3rem"></i>
  </button>
  
  <ul class="sub-menu">
    <div>
      <li><a href="#">Personal Info</a></li>
      <li><a href="#">Security & Privacy</a></li>
    </div>
  </ul>
  
</li>
<?php endif ?>

<!-- Checking if the authentication is done or not.
 if the authentication is not done the profile section will not
 contain user's name and manage account option -->

<?php if(!isset($_SESSION['admin-authenticated'])):?>
  
  <li>
  <a href="login.php">
    <i class="ri-profile-fill"></i>
    <span>Profile</span>
  </a>
</li>

<?php endif ?>

</ul>

  <!-- Side Bar Ends Here -->