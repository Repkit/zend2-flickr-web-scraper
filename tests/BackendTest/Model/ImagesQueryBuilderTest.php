<?php

namespace BackendTest\Model;

use ServiceLocatorFactory\ServiceLocatorFactory;
use ApplicationTest\TestSuite;
use Backend\Model\ImagesQueryBuilder;

/**
 * @author Andrea Fiori
 * @since  03 January 2014
 */
class ImagesQueryBuilderTest extends TestSuite
{
	private $imagesQueryBuilder;

	private $setupManager;
	
	protected function setUp()
	{
		parent::setUp();
		
		$this->imagesQueryBuilder = new ImagesQueryBuilder($this->getEntityManagerMock());
	}
	
	public function testGetQueryResult()
	{
		$this->imagesQueryBuilder->setBasicBindParameters();
		$this->imagesQueryBuilder->setQueryBasic();
		
		$this->assertTrue( is_array($this->imagesQueryBuilder->getSelectResult()) );
	}
	
	public function testSetId()
	{
		$this->imagesQueryBuilder->setBasicBindParameters();
		$this->imagesQueryBuilder->setId(1);
	
		$this->assertArrayHasKey('id', $this->imagesQueryBuilder->getBindParameters());
	}
}