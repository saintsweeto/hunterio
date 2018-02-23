<?php

namespace Hiraya;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;

/**
 * Class Client.
 *
 * @package Hiraya
 */
class Client extends GuzzleClient
{
    protected $apiKey;
    protected $endPoint = 'https://api.hunter.io/v2/';
    protected $url;
    protected $parameters;

    /**
     * Client constructor.
     *
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        parent::__construct();

        $this->apiKey = $apiKey;
    }

    /**
     * Sets the URL Prefix.
     *
     * @param string $prefix
     */
    public function setUrl($prefix)
    {
        $this->url = $this->endPoint.$prefix;
    }

    /**
     * Sets the URL parameters.
     *
     * @param array $parameters
     */
    public function setParameters($parameters)
    {
        if ( ! empty($parameters))  {
            $this->parameters = array_merge($parameters, [
                'api_key' => $this->apiKey
            ]);
        } else {
            $this->parameters = [
                'api_key' => $this->apiKey
            ];
        }
    }

    /**
     * Generates the API response.
     *
     * @param  string $prefix
     * @param  array $parameters
     * @return string
     */
    public function retrieve($prefix, $parameters = [])
    {
        $this->setUrl($prefix);
        $this->setParameters($parameters);

        try {
            return $this->request('GET', $this->url, [
                'query' => $this->parameters
            ])->getBody()->getContents();
        } catch (RequestException $e) {
            return $e->getResponse()->getBody()->getContents();
        }
    }
}
