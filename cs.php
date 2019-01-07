<?php

// TOPIC:
// composer init
// command: composer require phpmailer/phpmailer
// add at composer.json: "league/color-extractor": "0.3.*"

// NOTE:
// composer install: install composer.json, if there's a lock install the exact versions from there
// --no-dev to skill install from require-dev (the default is --dev)
// composer update: update dependencies as defined by composer.json, regenerate lock

// NOTE:
// to remove, delete line in composer.json and composer update
// or composer remove vendor/package

// NOTE:
// to require a php version, put inside require:
// "php": "7.1.0"

// NOTE: semantic versioning
// https://semver.mwl.be/
// "vendor/package": "1.3" - exact version
// "vendor/package": "1.3 - 1.4" - range
// "vendor/package": "1.3.*" - wildcard
// "vendor/package": "^1.3" - caret, major (>1.3 - <2)
// tilde is like a * in the last number
// "vendor/package": "~1.3" - tilde (>1.3 - <2)
// "vendor/package": "~1.3.0" - tilde (>1.3 - <1.4)
// "vendor/package": ">=1.3"


require "vendor/autoload.php";

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// $mail = new PHPMailer(true); // Passing `true` enables exceptions to be thrown when something goes wrong
// try {
//     // SERVER SETTINGS
//     // $mail->SMTPDebug = 2; // Enable verbose debug output
//     $mail->isSMTP(); // Set mailer to use SMTP
//     $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
//     $mail->SMTPAuth = true; // Enable SMTP authentication
//     $mail->Username = 'gustavoalbuquerquebr@gmail.com'; // SMTP username
//     $mail->Password = 'password'; // SMTP password
//     $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
//     $mail->Port = 587; // TCP port to connect to
//     // PEOPLE
//     $mail->setFrom('gustavoalbuquerquebr@gmail.com', 'Mailer');
//     $mail->addAddress('gustavoalbuquerquebr@outlook.com', 'Recipient');
//     $mail->addReplyTo('gustavoalbuquerquebr@gmail.com', 'ReplyTo');
//     // $mail->addCC('cc@example.com');
//     // $mail->addBCC('bcc@example.com');
//     // ATTACHMENTS
//     // CONTENT
//     $mail->isHTML(true);  // Set email format to HTML
//     $mail->Subject = 'Here is the subject';
//     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
// }

use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

$palette = Palette::fromFilename('img.png');

// // $palette is an iterator on colors sorted by pixel count
// foreach($palette as $color => $count) {
//     // colors are represented by integers
//     echo Color::fromIntToHex($color), ': ', $count, "\n";
// }

// it offers some helpers too
$topFive = $palette->getMostUsedColors(10);
$hex = [];

foreach ($topFive as $color => $q) {
  $hex[] = Color::fromIntToHex($color);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  
  <section>
    <?php foreach ($hex as $color): ?>
      <div style="background:<?= $color; ?>">&nbsp;</div>
    <?php endforeach; ?>
  </section>

</body>
</html>
