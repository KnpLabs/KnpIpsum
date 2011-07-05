<?php

namespace Knp\IpsumBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IpsumControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = self::createClient();

        $crawler = $client->request('GET', '/twig/Edgar');

        $this->assertTrue($crawler->filter('html:contains("Hello Edgar")')->count() > 0);
    }
}
