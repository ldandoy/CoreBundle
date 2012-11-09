<?php

<<<<<<< HEAD
namespace StartPack\FrontBundle\Tests\Controller;
=======
namespace StartPack\CoreBundle\Tests\Controller;
>>>>>>> 6d4e0cf813f45af83d5553f0a2067935f11eb189

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/hello/Fabien');

        $this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
    }
}
