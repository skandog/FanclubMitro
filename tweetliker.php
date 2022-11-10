<?php
// require_once('config.php');
require_once('TwitterAPIExchange.php');

// Moving to abes twit auth
require_once "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

// print_r($new_env_var);

echo 'My username is ' . getenv("ACCESS_TOKEN") . '!';

// settings for twitter api connection
$settings = array(
    'oauth_access_token' => ACCESS_TOKEN,
    'oauth_access_token_secret' => ACCESS_TOKEN_SECRET,
    'consumer_key' => CONSUMER_KEY,
    'consumer_secret' => CONSUMER_SECRET
);

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

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

tweetliker("mitrovic", 25);



// $statuses = $connection->get("search/tweets", ["q" => "#ffc", "count" => 22])->statuses;

// foreach ($statuses as $st) {
//     // echo "text: " . $x->text . "<br/>";
//     $response = $connection->post('favorites/create', ['id' => $st->id]);


//     if ($connection->getLastHttpCode() == 200) {
//         echo "You liked tweet with id " . $st->id . "successfully." . "<br/>";
//     } else {
//         echo $connection->getLastHttpCode();
//         echo 'error: ' . $response->errors[0]->message . "<br/>";
//     }
// }


// $response = $connection->post('favorites/create', ['id' => 1589637735207538689]);


// print_r($statuses);
