<?php
$response = file_get_contents('php://input');
parse_str($response, $data);
print_r($data);

