<?php

namespace FlickrTest\Model;

use ApplicationTest\TestSuite;
use Flickr\Model\ImagesEntitySetter;

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

	public function testSetImageEntityProperties()
	{		
		$this->assertNotEmpty( $this->imagesEntitySetter->setImageEntityProperties(array("here is fake :( ")) );
	}
}