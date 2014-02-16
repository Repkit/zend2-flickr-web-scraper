<?php

namespace FlickrTest\Controller;

use ApplicationTest\TestSuite;
use Flickr\Controller\FlickrController;

/**
 * TODO: test controllers
 * @author Andrea Fiori
 * @since  16 February 2014
 */
class FlickrControllerTest //extends TestSuite
{
	private $flickrController;
	
	protected function setUp()
	{
		parent::setUp();
		
		$this->flickrController = new FlickrController();
	}
	
	public function testIndexActionCanBeAccessed()
	{
		$this->routeMatch->setParam('action', 'index');
		
		$result   = $this->controller->dispatch($this->request);
		$response = $this->controller->getResponse();
		
		$this->assertEquals(200, $response->getStatusCode());
	}
}