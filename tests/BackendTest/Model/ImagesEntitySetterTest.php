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

	public function testSetImageEntityProperties()
	{		
		$this->assertInstanceOf('\Application\Entity\Images', $this->imagesEntitySetter->setImageEntityProperties($this->getFlickrResultSetMock()) );
	}
	
		/**
		 * @return \ZendService\Flickr\Result $flickrResultSetMock
		 */
		private function getFlickrResultSetMock()
		{
			$flickrResultSetMock = $this->getMockBuilder('\ZendService\Flickr\Result')
							   					->disableOriginalConstructor()
							   					->getMock();
			
			$flickrResultSetMock->Thumbnail = $this->getMockBuilder('\ZendService\Flickr\Image')
							   					->disableOriginalConstructor()
							   					->getMock();
					
			return $flickrResultSetMock;
		}
}