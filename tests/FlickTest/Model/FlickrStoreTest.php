<?php

namespace FlickTest\Model;

use ApplicationTest\TestSuite;
use Flickr\Model\FlickrScraper;
use Flickr\Model\FlickrStore;
use ZendService\Flickr\Flickr;
use FlickrTest\Model\ZendServiceFlickrMock;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class FlickrStoreTest extends TestSuite
{
	private $flickrStore;

	protected function setUp()
	{
		parent::setUp();
		
		$this->flickrStore = new FlickrStore( new FlickrScraper(new ZendServiceFlickrMock() ) );
	}

	public function testSetImageEntityProperties()
	{
		$this->assertNotEmpty( $this->flickrStore->setImageEntityProperties(array()) );
	}
}