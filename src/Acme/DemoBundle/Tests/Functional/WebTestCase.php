<?php

namespace Acme\DemoBundle\Tests\Functional;

use Liip\FunctionalTestBundle\Test\WebTestCase as BaseWebTestCase;

use Symfony\Component\BrowserKit\Client;

use Doctrine\ODM\PHPCR\Tools\Console\Command\RegisterSystemNodeTypesCommand;

use Jackalope\Session;
use Jackalope\Transport\DoctrineDBAL\Client AS DoctrineDBALClient;
use Jackalope\Transport\DoctrineDBAL\RepositorySchema;

abstract class WebTestCase extends BaseWebTestCase
{
    static protected $fixturesLoaded = false;

    public function setUp()
    {
        $this->loadFixtures(array(
            'Acme\DemoBundle\DataFixtures\ORM\LoadUserData',
        ));
    }

    protected function login(Client $client)
    {
        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form(array(
            '_username'  => 'admin',
            '_password'  => 'admin',
        ));

        $client->submit($form);
    }
}
