<?php

namespace App\Tests\Integration\Helpers;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;

trait ControllerTestHelpers
{
    private $client;

    public function setUp() :void
    {
        $this->client = static::createClient();
    }

    protected function getJsonResponse($method, $uri, $data = [])
    {
        $response = $this->getResponseData($method, $uri, $data);

        $jsonContent = json_decode($response->getContent(), true);
        $this->assertTrue(is_array($jsonContent));
        return [$response->getStatusCode(), $jsonContent];
    }

    protected function getResponseData($method, $uri, $data =[])
    {

        $this->client->request($method, $uri, $data);

        return $this->client->getResponse();
    }
}