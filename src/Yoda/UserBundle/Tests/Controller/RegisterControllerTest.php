<?php

namespace Yoda\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterControllerTest extends WebTestCase
{
    public function testRegister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/register');

        $this->assertEquals( 200, $client->getResponse()->getStatusCode() );
        $this->assertContains( 'Registers', $client->getResponse()->getContent() );

        $userNameVal = $crawler
            ->filter( '#user_register_username')
            ->attr( 'value' );

        $this->assertEquals( 'Leia', $userNameVal );
    }
}
