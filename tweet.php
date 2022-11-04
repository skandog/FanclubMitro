<?php
require_once('config.php');
require_once('TwitterAPIExchange.php');

// Moving to abes twit auth
require_once "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;



// settings for twitter api connection
$settings = array(
    'oauth_access_token' => ACCESS_TOKEN,
    'oauth_access_token_secret' => ACCESS_TOKEN_SECRET,
    'consumer_key' => CONSUMER_KEY,
    'consumer_secret' => CONSUMER_SECRET
);

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$status = 'Testing, testing. Any #mitro fans out there?';

// $result = $connection->get('search/tweets', ['q' => 'hello']);


$result = $connection->post("statuses/update", ["status" => $status]);
// try {
//     //actual code
//     echo "tweeeeeting";
// } catch (Exception $e) {
//     echo $e->getMessage();
// }



if ($connection->getLastHttpCode() == 200) {
    echo "Your Tweet posted successfully.";
    var_dump($result);
} else {
    echo $connection->getLastHttpCode();
    echo 'error: ' . $result->errors[0]->message;
}

// twitter api endpoint
$url = 'https://api.twitter.com/2/tweets';

// twitter api endpoint request type
$requestMethod = 'POST';

// twitter api endpoint data
$apiData = array(
    'content-type' => 'application/json',
    'status' => 'This tweet is comming from an awesome script written using php and the Twitter API! #Geek #PHP #TwitterAPI',
);
