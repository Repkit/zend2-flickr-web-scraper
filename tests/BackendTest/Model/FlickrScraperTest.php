<?php

namespace FlickrTest\Model;

use Backend\Model\FlickrScraper;
use ApplicationTest\TestSuite;
use BackendTest\Model\ZendServiceFlickrMock;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class FlickrScraperTest extends TestSuite
{
	private $flickrScraper;

	protected function setUp()
	{
		parent::setUp();
		
		$flickrMock = new ZendServiceFlickrMock();
		$flickrMock = $flickrMock->getFlickrMock();
		
		$this->flickrScraper = new FlickrScraper($flickrMock);
	}

	public function testGetFlickr()
	{
		$this->assertTrue( is_object($this->flickrScraper->getFlickr()) );
	}

	public function testSetTagSearch()
	{
		$this->assertTrue( is_array($this->flickrScraper->setTagSearch('education')) );
	}
}