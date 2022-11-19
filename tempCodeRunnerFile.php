<?php
// Production settings for api connection - GH Actions
// $ACCESS_TOKEN = getenv("ACCESS_TOKEN");
// $ACCESS_TOKEN_SECRET = getenv("ACCESS_TOKEN_SECRET");
// $CONSUMER_KEY = getenv("CONSUMER_KEY");
// $CONSUMER_SECRET = getenv("CONSUMER_SECRET");

// $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);



// // Sending tweets from the info file

// $status = $serbfacts[$count];

// $result = $connection->post("statuses/update", ["status" => $status]);

// if ($connection->getLastHttpCode() == 200) {
//     echo "Your Tweet posted successfully.";
//     print_r($result);
// } else {
//     echo $connection->getLastHttpCode();
//     print_r($result);
//     echo 'error: ' . $result->errors[0]->message;
// }