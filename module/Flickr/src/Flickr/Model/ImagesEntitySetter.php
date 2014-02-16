<?php

namespace Flickr\Model;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class ImagesEntitySetter
{
	private $imageEntity;
	
	public function __construct(\Application\Entity\Images $images)
	{
		$this->imageEntity = $images;
	}
	
	public function setImageEntityProperties($photo)
	{
		if ( is_object($photo) ) {
			$this->imageEntity->setWidth($photo->Thumbnail->width);
			$this->imageEntity->setHeight($photo->Thumbnail->height);
			$this->imageEntity->setImageUrl($photo->Thumbnail->uri);
			$this->imageEntity->setTitle($photo->title);
			$this->imageEntity->setOwner($photo->owner);
		}
		
		return $this->imageEntity;
	}
	
	public function getImageEntity()
	{
		return $this->imageEntity;
	}
}