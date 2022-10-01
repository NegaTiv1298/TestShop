<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException as GuzzleExceptionAlias;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    /**
     * External api connection
     *
     * @param string $httpMethod
     * @param string $apiUrl
     * @return array
     * @throws GuzzleExceptionAlias
     */
    public static function apiConnectAction(string $httpMethod, string $apiUrl): array
    {
        $client = new Client();
        $headers = [
            'Content-type' => 'application/json',
        ];
        $response = $client->request($httpMethod, $apiUrl, [
            'headers' => $headers
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }
}
