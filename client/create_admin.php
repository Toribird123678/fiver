<?php  
require_once 'classloader.php';

// Simple one-time seeder to create the fiverr_administrator account if it doesn't exist
// Visit this page once, then delete the file for security.

$email = 'tori@gmail.com';
$existing = $userObj->getUserByEmail($email);

if ($existing) {
    echo "Admin user already exists.";
    exit;
}

$username = 'tori';
$password = '123';
$contact = '';

if ($userObj->registerUser($username, $email, $password, $contact, 'fiverr_administrator')) {
    echo "Admin user created. You can now log in at admin_login.php.";
} else {
    echo "Failed to create admin user.";
}
?>


