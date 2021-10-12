<?php
require_once '../../../private/initialize.php';

use App\User;
use Database\Session;

User::auth();
$password = file_get_contents('php://input');
$password = md5($password);
$id       = Session::getSessionData('user_logged');

// changing password
$change_password = User::changePassword($password, $id);
if ($change_password) {
    $return['status'] = 'success';
} else {
    $return['status'] = 'failure';
}
echo json_encode($return);
