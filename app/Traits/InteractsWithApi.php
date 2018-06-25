<?php

namespace App\Traits;


use GuzzleHttp\Client;
use Log;

trait InteractsWithApi
{


    /**
     * @param $endpoint
     * @param array $params
     * @return mixed
     */
    public function getFromApi($base,$target,$amount) {

        try {

            Log::info("Base : ".$base);
            Log::info("Target : ".$target);
            Log::info("Amount : ".$amount);

            $apiKey = env('FIXER_API_KEY');

            $apiUrl = env('FIXER_URL')."?access_key=".$apiKey."&from=".$base."&to=".$target."&amount=".$amount;


            $client = new Client();
            $response = $client->request("GET", $apiUrl);


            logger("Fixer Api  ".$apiUrl, ['code' => $response->getStatusCode()]);

            return \GuzzleHttp\json_decode($response->getBody());
        } catch (\Exception $e) {

            logger()->error("Api request exception trying to reach ".$apiUrl, [
                'message' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine()
            ]);

            return null;
        }
    }


}