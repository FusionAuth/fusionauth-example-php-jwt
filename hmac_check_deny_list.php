<?php

require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

$key = "hello php-folk!!";

// User API
$exp = time() + (60*5);
$payload = array(
    "iss" => "fusionauth.io", 
    "exp" => $exp, 
    "aud" => "238d4793-70de-4183-9707-48ed8ecd19d9",
    "sub" => "19016b73-3ffa-4b26-80d8-aa9287738677",
    "jti" => "45616c74-2aaa-4b26-da28-9287738677aa",
    "name" => "Dan Moore",
    "roles" => ["RETRIEVE_TODOS"]
);

$jwt = JWT::encode($payload, $key, 'HS256');
print($jwt);
print("\n\n");

// Todo API
$decoded = JWT::decode($jwt, new Key($key, 'HS256'));

$revoked_jwts = array(
'45616c74-2aaa-4b26-da28-9287738677aa'
); //implementation of this tbd

$expected_iss = "fusionauth.io";
$expected_aud = "238d4793-70de-4183-9707-48ed8ecd19d9";

if ($expected_iss != $decoded->iss) {
  throw new UnexpectedValueException('Issuer incorrect');
}

if ($expected_aud != $decoded->aud) {
  throw new UnexpectedValueException('Audience incorrect');
}
$val = array_search($decoded->jti, $revoked_jwts, true);

if (array_search($decoded->jti, $revoked_jwts,true) !== false) {
  throw new UnexpectedValueException('JWT revoked');
}

print_r($decoded);

?>
