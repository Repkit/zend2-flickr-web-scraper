<?php

namespace Backend\Model;

use Application\Model\DQLQueryHelper;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class ImagesQueryBuilder extends DQLQueryHelper
{
	public function setQueryBasic()
	{
		if (!$this->getDefaultFieldsSelect()) {
			$this->setDefaultFieldsSelect('i.imageUrl, i.title, i.width, i.height, i.owner ');
		}
		
		$this->queryBasic = "SELECT ".$this->getDefaultFieldsSelect()." FROM Application\\Entity\\Images i WHERE i.id IS NOT NULL ";
	}
	
	public function setBasicBindParameters()
	{
		return false;
	}
	
	public function setId($id)
	{
		if ( !is_numeric($id) ) {
			return false;
		}
	
		$this->query .= "AND i.id = :id ";
		$this->addToBindParameters('id', $id);
	}
	
	public function setImageURL($imageUrl)
	{
		if ( $imageUrl ) {
			$this->query .= "AND i.imageUrl = :imageUrl ";
			$this->addToBindParameters('imageUrl', $imageUrl);
		}
	}
	
	public function setTitle($title)
	{
		if ( $title ) {
			$this->query .= "AND i.title = :title ";
			$this->addToBindParameters('title', $title);
		}
	}
	
	public function setWidth($width)
	{
		if ( !is_numeric($width) ) {
			return false;
		}

		$this->query .= "AND i.width = :width ";
		$this->addToBindParameters('width', $width);
	}
	
	public function setOwner($owner)
	{
		if ($owner) {
			$this->query .= "AND i.owner = :owner ";
			$this->addToBindParameters('owner', $owner);
		}
	}	
}