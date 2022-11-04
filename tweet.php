<?php
require_once('config.php');
require_once('TwitterAPIExchange.php');

// Moving to abes twit auth
require_once "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;



// settings for twitter api connection
$settings = array(
    'oauth_access_token' => TWITTER_ACCESS_TOKEN,
    'oauth_access_token_secret' => TWITTER_ACCESS_TOKEN_SECRET,
    'consumer_key' => TWITTER_CONSUMER_KEY,
    'consumer_secret' => TWITTER_CONSUMER_SECRET
);

$connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, TWITTER_ACCESS_TOKEN, TWITTER_ACCESS_TOKEN_SECRET);



// twitter api endpoint
$url = 'https://api.twitter.com/2/tweets';

// twitter api endpoint request type
$requestMethod = 'POST';

// twitter api endpoint data
$apiData = array(
    'content-type' => 'application/json',
    'status' => 'This tweet is comming from an awesome script written using php and the Twitter API! #Geek #PHP #TwitterAPI',
);


// create new twitter for api communication
$twitter = new TwitterAPIExchange($settings);

// make our api call to twiiter
$twitter->buildOauth($url, $requestMethod);
$twitter->setPostfields($apiData);
$response = $twitter->performRequest(true, array(CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => 0));

echo '<pre>';
print_r(json_decode($response, true));
