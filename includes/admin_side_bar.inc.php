<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="../images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo $user; ?></strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding w3-blue" style="text-decoration: none;" ><i class="fa fa-home fa-fw"></i>  Home</a>
    <a href="messages.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-envelope fa-fw"></i>  Messages</a>
    <a onclick="myAccFunc('students')" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-users fa-fw"></i>  Students</a>
		<div id="students" class="w3-bar-block w3-hide w3-padding-large w3-medium">
			<a href="all_students.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-users fa-fw"></i>   All Students</a>
			<a href="pending.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-question-circle fa-fw"></i>   Pending Approval</a>
			<a href="verified.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-check fa-fw"></i>   Verified</a>
			<a href="csc.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-laptop fa-fw"></i>   Computer Science</a>
			<a href="ict.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-desktop fa-fw"></i>   ICT</a>
		</div>
    <a onclick="myAccFunc('settings')" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-gear fa-fw"></i>  Settings</a>
		<div id="settings" class="w3-bar-block w3-hide w3-padding-large w3-medium">
			<a href="add_admin.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-user-plus fa-fw"></i>   Add Admin</a>
			<a href="change_password.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-key fa-fw"></i>   Change Password</a>
			<a href="about_update.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-info-circle fa-fw"></i>   About NACOSS</a>
		</div>
	<a onclick="myAccFunc('resources')" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-book fa-fw"></i>  Resources</a>
		<div id="resources" class="w3-bar-block w3-hide w3-padding-large w3-medium">
			<a href="add_resource.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-plus fa-fw"></i>   Add Resource</a>
			<a href="resources.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-book fa-fw"></i>   Resources</a>
		</div>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding" style="text-decoration: none;" ><i class="fa fa-sign-out fa-fw"></i>  Logout</a><br><br>
  </div>
</nav>