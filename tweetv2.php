<?php
require_once('config.php');

require __DIR__ . '/vendor/autoload.php';

use Noweh\TwitterApi\Client;

$settings = [
    'account_id' => 1588541356187713536,
    'consumer_key' => CONSUMER_KEY,
    'consumer_secret' => CONSUMER_SECRET,
    'bearer_token' => BEARER_TOKEN,
    'access_token' => ACCESS_TOKEN,
    'access_token_secret' => ACCESS_TOKEN_SECRET
];

$client = new Client($settings);
$id = 1589558387452174337;

$return = $client->tweet()->performRequest('POST', ['text' => 'This is a test....']);

// $result = $client->tweet()->performRequest('GET', array('id' => $id));

var_dump($result);

// if ($client->status == 200) {
//     echo "Your Tweet posted successfully.";
//     print_r($result);
// } else {
//     echo $client->status;
//     // print_r($result);
//     echo 'error: ' . $result->errors[0]->message;
// }
