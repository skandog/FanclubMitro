<?php
// require_once('config.php');
require_once('TwitterAPIExchange.php');

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

function tweetliker($q, $count)
{
    global $connection;
    $statuses = $connection->get("search/tweets", ["q" => $q, "count" => $count])->statuses;

    foreach ($statuses as $st) {
        // echo "text: " . $x->text . "<br/>";
        $response = $connection->post('favorites/create', ['id' => $st->id]);


        if ($connection->getLastHttpCode() == 200) {
            echo "You liked tweet with id " . $st->id . " successfully." . "<br/>" . "tweet text: " . $st->text . "<br/>";
        } else {
            echo $connection->getLastHttpCode();
            echo 'error: ' . $response->errors[0]->message . "<br/>";
        }
    }
}


$searchTerms = ["mitrovic", "fulham", "fulhamish", "@FulhamishPod
", "@FulhamFC", "#Митровић", "Александар Митровић"];
$randomIndex = rand(0, count($searchTerms) - 1);

echo "The search term this time is..." . $searchTerms[$randomIndex] . " with random index of " . $randomIndex;

tweetliker($searchTerms[$randomIndex], 25);
