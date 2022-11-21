<?php
// Moving to abes twit auth
require_once "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

require "assets/mitroserbiafacts.php";


## Managing the index count invrementally in a sep text file
$storageFile = "serbfactsindex.txt";

if (!file_exists($storageFile) || file_get_contents($storageFile) >= count($serbfacts)) {
    file_put_contents($storageFile, "0");
}

$count = file_get_contents($storageFile);

echo $count;
file_put_contents($storageFile, ($count + 1));


echo $serbfacts[$count];


// // local settings for twitter api connection - with config
// require_once('config.php');

// $settings = array(
//     'oauth_access_token' => ACCESS_TOKEN,
//     'oauth_access_token_secret' => ACCESS_TOKEN_SECRET,
//     'consumer_key' => CONSUMER_KEY,
//     'consumer_secret' => CONSUMER_SECRET
// );

// $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);



// Production settings for api connection - GH Actions
$ACCESS_TOKEN = getenv("ACCESS_TOKEN");
$ACCESS_TOKEN_SECRET = getenv("ACCESS_TOKEN_SECRET");
$CONSUMER_KEY = getenv("CONSUMER_KEY");
$CONSUMER_SECRET = getenv("CONSUMER_SECRET");

$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);



// Sending tweets from the info file

$status = $serbfacts[$count];

$result = $connection->post("statuses/update", ["status" => $status]);

if ($connection->getLastHttpCode() == 200) {
    echo "Your Tweet posted successfully.";
    print_r($result);
} else {
    echo $connection->getLastHttpCode();
    print_r($result);
    echo 'error: ' . $result->errors[0]->message;
}
