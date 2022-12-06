<?php 
// Uncomment the next line if you're using a dependency loader (such as Composer) (recommended)
require 'vendor/autoload.php';

// Uncomment the next line if you're not using a dependency loader (such as Composer), replacing <PATH TO> with the path to the sendgrid-php.php file
require_once 'sendgrid-php.php';
$email = new \SendGrid\Mail\Mail();
$email->setFrom("system@safecitymississauga.online", "SafeCityMissassauga");
$email->setSubject("1DDC8A7B0D14");
$email->addTo("sendgridtesting@gmail.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>