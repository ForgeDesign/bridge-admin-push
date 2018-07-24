<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

// echo "Hello";

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/bridge-card-firebase-adminsdk-ja0ma-d511db887c.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    // The following line is optional if the project id in your credentials file
    // is identical to the subdomain of your Firebase project. If you need it,
    // make sure to replace the URL with the URL of your project.
    ->withDatabaseUri('https://bridge-card.firebaseio.com')
    ->create();

    $database = $firebase->getDatabase();
    

// echo "hello";



// echo "test";
// get post variables
$data = json_decode(file_get_contents("php://input"));



$newPost = $database
->getReference('templateCards')
->push([
    $data
]);

echo $newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-


// $file = 'people.txt';
// Open the file to get existing content
// $current = file_get_contents($file);
// // Append data to the file
// $current .= $data->card_schemes;
// // $current = "hello";
// // Write the contents back to the file
// file_put_contents($file, $current);

// $current .= $data->template_name;
// return $data->template_name;



?>