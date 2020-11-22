<?php

class APIList {

    /**
     * 
     * Get Weather Data from the OpenWeather API
     * 
     * @param string $location The location to get the weather from.
     * @param string $apiKey Your api key from OpenWeather API
     * 
     * @return array Returns an array result containing all the weather details
     */
    public static function GetWeatherData($location, $apiKey) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "api.openweathermap.org/data/2.5/weather?q=$location&" . $apiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        curl_close($ch);
        return $output;
    }

    /**
     * 
     * Send a Get Request to a different API
     * 
     * @param string $apiQuery The link to the api you're making a request to, this has to contain the API key and other things that the API requires from you.
     * 
     * @return array Returns an array result containing all the details
     */
    public static function GetRequest($apiQuery) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $apiQuery);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        curl_close($ch);
        return $output;
    }
}

//TODO comment this class.