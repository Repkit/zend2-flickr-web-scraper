<?php

namespace BackendTest\Model;

use ApplicationTest\TestSuite;
use Backend\Model\ImagesEntitySetter;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class ImagesEntitySetterTest extends TestSuite
{
	private $imagesEntitySetter;
	
	public function setUp()
	{
		parent::setUp();

		$this->imagesEntitySetter = new ImagesEntitySetter( new \Application\Entity\Images() );
	}

	/**
	 * TODO: test set Flickr Object photo on to setImageEntityProperties()
	 */
	public function testSetImageEntityProperties()
	{
		$this->assertNotEmpty( $this->imagesEntitySetter->setImageEntityProperties(array("here is fake :( ")) );
		
		// $this->imagesEntitySetter->setImageEntityProperties();
		// $this->assertNotEmpty( $this->imagesEntitySetter->getImageEntity() );
	}
}