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
     * @param array|null $postParams
     * @return array
     * @throws GuzzleExceptionAlias
     */
    public static function apiConnectAction(string $httpMethod, string $apiUrl, array $postParams = null): array
    {
        $client = new Client();
        $headers = [
            'Content-type' => 'application/json',
        ];

        if(!empty($postParams)) {
            $response = $client->request($httpMethod, $apiUrl, [
                'headers' => $headers,
                'params' => $postParams
            ]);
        } else {
            $response = $client->request($httpMethod, $apiUrl, [
                'headers' => $headers
            ]);
        }

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }
}
