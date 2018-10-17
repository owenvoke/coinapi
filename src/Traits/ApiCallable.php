<?php

namespace pxgamer\CoinAPI\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use pxgamer\CoinAPI\CoinAPI;

/**
 * Trait ApiCallable
 */
trait ApiCallable
{
    /**
     * @var ClientInterface
     */
    protected $client;
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * ApiCallable constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;

        $this->client = new Client([
            'base_uri' => CoinAPI::API_BASE_URI,
            'headers'  => [
                'X-CoinAPI-Key' => $this->apiKey,
                'Content-Type'  => 'application/json',
            ],
        ]);
    }  

    /**
     * @param string $endpoint
     *
     * @return mixed
     */
    public function call(string $endpoint, array $query = [])
    {
        return \GuzzleHttp\json_decode(
            $this->client
                ->request('GET', $endpoint, [
                    'query' => $query
                ])
                ->getBody()
                ->getContents()
        );
    }
}
