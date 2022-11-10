<?php
// require_once('config.php');

// Moving to abes twit auth
require_once "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

// local settings for twitter api connection - with config
// $settings = array(
//     'oauth_access_token' => ACCESS_TOKEN,
//     'oauth_access_token_secret' => ACCESS_TOKEN_SECRET,
//     'consumer_key' => CONSUMER_KEY,
//     'consumer_secret' => CONSUMER_SECRET
// );


// Production settings for api connection - GH Actions
$ACCESS_TOKEN = getenv("ACCESS_TOKEN");
$ACCESS_TOKEN_SECRET = getenv("ACCESS_TOKEN_SECRET");
$CONSUMER_KEY = getenv("CONSUMER_KEY");
$CONSUMER_SECRET = getenv("CONSUMER_SECRET");

$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);
