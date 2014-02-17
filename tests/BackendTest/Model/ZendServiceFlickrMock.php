<?php

namespace BackendTest\Model;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class ZendServiceFlickrMock extends \PHPUnit_Framework_TestCase 
{
	private $flickrMock;
	
	public function getFlickrMock()
	{
		$this->flickrMock = $this->getMockBuilder('\ZendService\Flickr\Flickr')
								 ->disableOriginalConstructor()
								 ->getMock();
		
		$this->flickrMock->expects($this->any())
			 ->method('tagSearch')
			 ->will($this->returnValue( array( array("id"=>1,"url"=>'http://myimage.com','width'=>100,'heigth'=>100) ) ));
		
		return $this->flickrMock;
	}
	
	public function testFake()
	{
		$this->assertTrue(true);
	}
}