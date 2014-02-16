<?php

namespace Flickr\Model;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class FlickrScraper
{
	protected $flickr;
	
	/**
	 * 
	 * @param object $flickr
	 */
	public function __construct($flickr)
	{
		$this->flickr = $flickr;
	}

	/**
	 * @param string $tag
	 * @return \ZendService\Flickr\ResultSet
	 */
	public function setTagSearch($tag)
	{
		return $this->flickr->tagSearch($tag);
	}

	public function getFlickr()
	{
		return $this->flickr;
	}
}