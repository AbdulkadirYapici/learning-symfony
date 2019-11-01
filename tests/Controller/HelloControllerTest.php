<?php

namespace App\tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloControllerTest extends WebTestCase
{
    public function testHello()
    {
        $client= static::createClient();

        $client-> request('GET', '/hello' );
        $response =$client->getResponse();
        $body= $response->getContent();

        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testMerhabaDunya()
    {
        $client= static::createClient();

        $client-> request('GET', '/merhaba-dunya' );
        $crawler= $client->getCrawler();
        $this->assertGreaterThan(0,
            $crawler->filter("html:contains('Güzel')")->count());
    }
}