<?php

use ApplicationTest\TestSuite;
use Application\Entity\Images;

/**
 * @author Andrea Fiori
 * @since  16 February 2014
 */
class ImagesTest extends TestSuite
{
	private $images;
	
	protected function setUp()
	{
		parent::setUp();
		
		$this->images = new Images();
	}
	
	public function testSetImageUrl()
	{
		$this->images->setImageUrl('http://www.mydomain.com/images.png');
		
		$this->assertEquals($this->images->getImageUrl(), 'http://www.mydomain.com/images.png');
	}

	public function testSetWidth()
	{
		$this->images->setWidth(100);
	
		$this->assertEquals(100, $this->images->getWidth());
	}
	
	public function testSetHeigth()
	{
		$this->images->setHeight(70);
	
		$this->assertEquals(70, $this->images->getHeight());
	}

	public function testSetTitle()
	{
		$this->images->setTitle('Image title test');
	
		$this->assertEquals('Image title test', $this->images->getTitle());
	}

	public function testSetOwner()
	{
		$this->images->setOwner('John Doe');
	
		$this->assertEquals('John Doe', $this->images->getOwner());
	}
}