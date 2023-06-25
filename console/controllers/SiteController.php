<?php
namespace console\controllers;

use common\models\User;
use yii\console\Controller;
use yii\web\Request;

class SiteController extends Controller {
    public function actionIndex() {
       

$request = new Request;
$user_ip = $request->getUserIP();

$api_key = "c66fc08caec245ea84996f214a65af10";
$url = "https://api.ipgeolocation.io/ipgeo?apiKey=$api_key&ip=$user_ip";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response);
$city = $data->city;
$country = $data->country_name;

echo "Your current location is $city, $country.";
    }
}

// $api_key = "22fd9064d39c2c9295f9e81c1eaccb73";
// $city = "Hanoi";
// $country_code = "vn";
// $url = "https://api.openweathermap.org/data/2.5/weather?q=$city,$country_code&appid=$api_key";

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($ch);
// curl_close($ch);

// $data = json_decode($response);
// $temperature_kelvin = $data->main->temp;
// $temperature_celsius = $temperature_kelvin - 273.15;
// $description = $data->weather[0]->description;

// echo "The current temperature in $city is $temperature_celsius degrees Celsius with $description.";
//     }
// }
?>