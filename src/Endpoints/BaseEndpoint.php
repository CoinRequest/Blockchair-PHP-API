<?php

namespace BlockChair\Endpoints;

use Composer\CaBundle\CaBundle;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

class BaseEndpoint
{

    private $client;

    public static $API_ROUTE = 'https://api.blockchair.com/';

    public static $TIMEOUT = 10.0;

    /**
     * @var string
     */
    protected $chainEndpoint;

    /**
     * @var string
     */
    protected $dashboardEndpoint;


    public function __construct($chain)
    {
        $this->chainEndpoint = $chain.'/';
        $this->dashboardEndpoint = $this->chainEndpoint.'dashboards/';

        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri'              => self::$API_ROUTE,
            // You can set any number of default request options.
            RequestOptions::TIMEOUT => self::$TIMEOUT,
            RequestOptions::VERIFY  => CaBundle::getBundledCaBundlePath(),
        ]);
    }


    public function stats()
    {
        $endpoint = $this->chainEndpoint.'stats';
        $response = $this->get($endpoint);
        return $this->responseFromJson($response);
    }


    public function getBlock($blockId)
    {
        $endpoint = $this->dashboardEndpoint.'block/'.$blockId;
        $response = $this->get($endpoint);
        return $this->responseFromJson($response);
    }


    public function getTransaction($txId, $priority = false)
    {
        $endpoint = $this->dashboardEndpoint.'transaction/'.$txId;
        if ($priority) {
            $endpoint .= '/priority';
        }
        $response = $this->get($endpoint);
        return $this->responseFromJson($response);
    }


    public function getAddress($address)
    {
        $endpoint = $this->dashboardEndpoint.'address/'.$address;
        $response = $this->get($endpoint);
        return $this->responseFromJson($response);
    }

    /**
     * @param string $url
     *
     * @return mixed|ResponseInterface
     * @throws GuzzleException
     */
    private function get($url = '/') {
        return $this->client->request('GET', $url);
    }


    /**
     * @param ResponseInterface $response
     *
     * @return array
     */
    private function responseFromJson(ResponseInterface $response): array {
        return (array) json_decode($response->getBody());
    }
}