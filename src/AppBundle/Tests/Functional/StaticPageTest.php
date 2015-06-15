<?php

namespace AppBundle\Tests\Functional;

class StaticPageTest extends WebTestCase
{
    /**
     * @dataProvider contentDataProvider
     */
    public function testContent($url, $title)
    {
        $client = $this->createClient();

        $crawler = $client->request('GET', $url);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertCount(1, $crawler->filter(sprintf('h1:contains("%s")', $title)), 'Page does not contain an h1 tag with: '.$title);
    }

    public function contentDataProvider()
    {
        return array(
            array('/liip/hello/foo', 'foo'),
            array('/liip/extra/foo', 'foo'),
            array('/liip/hyphenator', 'Hyphenator')
        );
    }

    public function testRssFeed()
    {
        $client = $this->createClient();
        $client->request('GET', '/liip/customHandler.rss');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertContains('<title>My RSS feed</title>', $client->getResponse()->getContent());
    }

    public function testJsonFeed()
    {
        $client = $this->createClient();
        $client->request('GET', '/liip/hello/foo.json');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertEquals('{"name":"foo"}', $client->getResponse()->getContent());
    }
}
