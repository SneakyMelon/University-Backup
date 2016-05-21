<div>
<?php 
if (loggedin()) {
?>
<a href='admin.php'>Home</a> |
<a href='profile.php'>Profile</a> |
<a href='log_out.php'>Log Out</a> 
<?php
} else {
?>
<a href='admin.php'>Home</a> |
<a href='login.php'>Login</a> |
<a href='register.php'>Register</a> 
<?php 
}
?>
</div>