<?php
require_once '../../../private/initialize.php';

use App\User;
use Database\Session;

$response = file_get_contents('php://input');
$data     = json_decode($response, true);
// reciving all data
$email    = $data['email'];
$password = md5($data['password']);

// logging in
$user_login = User::login($email, $password);
if ($user_login) {
    $return['status'] = 'success';
    $return['url'] = "index.php";
    Session::setSessionData('user_logged', $user_login['id']);
    Session::setSessionData('user_name', $user_login['name']);
} else {
    $return['status'] = 'failure';
}
echo json_encode($return);
