<?php

namespace Backend\Model;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Set Doctrine2 Entity
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class EntityHandler
{
	private $entityManager;

	private $entity;

	public function __construct(EntityManagerInterface $entityManager)
	{
		$this->entityManager = $entityManager;
	}
	
	public function setEntity($entity)
	{
		$this->entity = $entity;
		
		return $this->entity;
	}
}