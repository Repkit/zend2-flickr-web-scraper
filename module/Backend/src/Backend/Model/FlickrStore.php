<?php

namespace Backend\Model;

use Backend\Model\FlickrScraper;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class FlickrStore
{
	private $flickrScraper;
	
	public function __construct(FlickrScraper $flickrScraper)
	{
		$this->flickrScraper = $flickrScraper;
	}
	
	/**
	 * @param ZendService\Flickr\Result $result
	 */
	public function setImageEntityProperties($photo)
	{
		$imageEntitySetter = new ImagesEntitySetter( new \Application\Entity\Images() );
		
		return $imageEntitySetter->setImageEntityProperties($photo);
	}
}