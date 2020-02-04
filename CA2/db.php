<?php
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/studentdetails-99fa7-b8c8c028db78.json');
$serviceAccount1 = ServiceAccount::fromJsonFile(__DIR__.'/notificationsv1-firebase-adminsdk-bzop8-aad831439f.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    // The following line is optional if the project id in your credentials file
    // is identical to the subdomain of your Firebase project. If you need it,
    // make sure to replace the URL with the URL of your project.
    ->withDatabaseUri('https://studentdetails-99fa7.firebaseio.com')
    ->create();

$database = $firebase->getDatabase();

$remarks = (new Factory)
    ->withServiceAccount($serviceAccount1)
    // The following line is optional if the project id in your credentials file
    // is identical to the subdomain of your Firebase project. If you need it,
    // make sure to replace the URL with the URL of your project.
    ->withDatabaseUri('https://notificationsv1.firebaseio.com/')
    ->create();

$database1 = $remarks->getDatabase();
?>