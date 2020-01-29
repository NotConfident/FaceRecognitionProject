<?php
require __DIR__.'/vendor/autoload.php';
require "user.php";

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/studentdetails-99fa7-b8c8c028db78.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    // The following line is optional if the project id in your credentials file
    // is identical to the subdomain of your Firebase project. If you need it,
    // make sure to replace the URL with the URL of your project.
    // ->withDatabaseUri('https://studentdetails-99fa7.firebaseio.com/');
    ->create();

$database = $firebase->getDatabase();

die(print_r($database));

