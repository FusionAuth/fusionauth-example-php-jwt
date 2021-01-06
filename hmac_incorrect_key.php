<?php

require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;

$key = "hello php-folk!!";

// User API
$exp = time() + (60*5);
$payload = array(
    "iss" => "fusionauth.io", 
    "exp" => $exp, 
    "aud" => "238d4793-70de-4183-9707-48ed8ecd19d9",
    "sub" => "19016b73-3ffa-4b26-80d8-aa9287738677",
    "name" => "Dan Moore",
    "roles" => ["RETRIEVE_TODOS"]
);

$jwt = JWT::encode($payload, $key);
print($jwt);
print("\n\n");

// Todo API
$key = "bye php-folk!!";
$decoded = JWT::decode($jwt, $key, array('HS256'));

print_r($decoded);

?>
