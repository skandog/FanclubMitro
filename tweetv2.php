<?php
require_once('config.php');

require __DIR__ . '/vendor/autoload.php';

use Noweh\TwitterApi\Client;
use Noweh\TwitterApi\TweetSearch;

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

// $return = $client->tweet()->performRequest('POST', ['text' => 'Hands up if you love Mitro!']);

// $result = $client->tweet()->performRequest('GET', array('id' => $id));

$return = $client->tweetSearch()->addFilterOnKeywordOrPhrase(['Mitrovic'])->performRequest();


print_r($client);

// if ($client->status == 200) {
//     echo "Your Tweet posted successfully.";
//     print_r($result);
// } else {
//     echo $client->status;
//     // print_r($result);
//     echo 'error: ' . $result->errors[0]->message;
// }
