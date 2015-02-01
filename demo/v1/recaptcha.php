<?php
// Register the public and private keys at https://www.google.com/recaptcha/admin
define('SITE_KEY',   '6LdgOwETAAAAALA9auuNVKFeXizXcYFrKOVC_vs-');
define('SECRET_KEY', '6LdgOwETAAAAAAHEd6l5XR5JOkBJDgUS4BPqxQrk');

// https://developers.google.com/recaptcha/docs/php
require_once('recaptchalib.php');

// Verify the captcha
// https://developers.google.com/recaptcha/docs/verify
$resp = recaptcha_check_answer(SECRET_KEY,
                                $_SERVER['REMOTE_ADDR'],
                                $_POST['recaptcha_challenge_field'],
                                $_POST['recaptcha_response_field']
                            );

echo json_encode(array(
    'valid'   => $resp->is_valid,
    'message' => $resp->is_valid ? null : 'Hey, the captcha is wrong!',       // $resp->error,
));
