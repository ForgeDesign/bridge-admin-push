<?php
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/google-service-account.json');









// echo "test";
// get post variables
$data = json_decode(file_get_contents("php://input"));
$file = 'people.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append data to the file
$current .= $data->card_schemes;
// $current = "hello";
// Write the contents back to the file
file_put_contents($file, $current);

$current .= $data->template_name;
return $data->template_name;



?>