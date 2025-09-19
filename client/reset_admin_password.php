<?php  
require_once 'classloader.php';

// One-time helper: set tori@gmail.com's password to '123'
$email = 'tori@gmail.com';
$user = $userObj->getUserByEmail($email);
if (!$user) {
	echo "User not found: $email";
	exit;
}

$hashed = password_hash('123', PASSWORD_DEFAULT);
$sql = "UPDATE fiverr_clone_users SET password = ? WHERE email = ?";
if ($databaseObj->executeNonQuery($sql, [$hashed, $email])) {
	echo "Admin password reset to 123.";
} else {
	echo "Failed to reset password.";
}
?>


