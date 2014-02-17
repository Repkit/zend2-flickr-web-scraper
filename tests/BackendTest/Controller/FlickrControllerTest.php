<?php

namespace BackendTest\Controller;

use ApplicationTest\TestSuite;
use Backend\Controller\FlickrBackendController;

/**
 * @author Andrea Fiori
 * @since  16 February 2014
 */
class FlickrControllerTest extends TestSuite
{
	private $flickrController;
	
	protected function setUp()
	{
		parent::setUp();
		
		$this->controller = new FlickrBackendController();
		$this->controller->setEvent($this->event);
		$this->controller->setServiceLocator($this->serviceManager);
	}
	
	public function testIndexActionCanBeAccessed()
	{
		// $this->routeMatch->setParam('action', 'index');
		
		$result   = $this->controller->dispatch($this->request);
		$response = $this->controller->getResponse();
		
		$this->assertEquals(200, $response->getStatusCode());
	}
}