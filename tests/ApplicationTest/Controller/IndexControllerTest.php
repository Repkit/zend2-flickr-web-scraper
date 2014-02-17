<?php

namespace BackendTest\Controller;

use ApplicationTest\TestSuite;
use Application\Controller\IndexController;

/**
 * @author Andrea Fiori
 * @since  16 February 2014
 */
class IndexControllerTest extends TestSuite
{
	protected function setUp()
	{
		parent::setUp();

		$this->controller = new IndexController();
		$this->controller->setEvent($this->event);
		$this->controller->setServiceLocator($this->serviceManager);
	}
	
	public function testIndexActionCanBeAccessed()
	{
		$this->routeMatch->setParam('action', 'index');

		$result   = $this->controller->dispatch($this->request);
		$response = $this->controller->getResponse();
	
		$this->assertEquals(200, $response->getStatusCode());
	}
}