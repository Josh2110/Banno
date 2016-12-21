<?php

    $ch = file_get_contents('https://banno.com');
    echo $ch;

// counting how many times "financial instituition" is used
    $count = substr_count($ch, 'financial institution');
    echo "The phrase 'financial institution' apprears " . $count . " times \n";


// counting the number of platforms that are used
    $count1 = substr_count($ch, 'platform-feature');
    echo "There are " . $count1 . " platforms that are used \n";

$count2 = substr_count($ch, '.png');
echo "There are ".json_encode($count2)." .png files in the HTML.\n";

//Top 3 alphanumeric characters
$result = preg_replace("/[^a-zA-Z0-9]+/", "", $ch);
$array1 = str_split($result);
asort ($array1);
$array1 = array_count_values($array1);

$array2 = array();
for ($i = 0;$i<3;$i++){
    $highest = max($array1);
    foreach ($array1 as $key => $value){
        if($value == $highest){
            array_push($array2, array($key => $value));
            unset($array1[$key]);
        }
    }
}

echo "The top 3 alphanumeric characters used are:" . json_encode($array2). "\n";


//Grabbing Twitter Handle
session_start ();
require_once ("vendor/abraham/twitteroauth/autoload.php");
use Abraham\TwitterOAuth\TwitterOAuth;

$consumer_Key = "KuUlJMhzXpVRL887OYwAp26vR";
$consumer_Secret = "siEMhsl8fUHUPqaDldvjy5PNZze0UoJaApqI8DzppEnY7TCqnq";
$access_Token = "806628686657187840-qejBzQRy6f81uMKQTpraZHOHitjdWKM";
$access_Token_Secret = "nM5BUEbg0aeXt9rJZaF042jA8tKcQEoCCn8ADliFmHxfB";

$connection = new TwitterOAuth($consumer_Key, $consumer_Secret, $access_Token, $access_Token_Secret);
//$statuses = $connection->get("users/lookup", ["screen_name" => "BannoJHA"]);
$userID = $connection->get("users/lookup",["user_id" =>"27356038"]);
echo json_encode($userID)."\n";



?>


/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 11/23/16
 * Time: 8:19 AM
 */