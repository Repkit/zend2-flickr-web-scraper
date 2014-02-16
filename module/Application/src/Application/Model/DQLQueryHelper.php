<?php

namespace Application\Model;

use Doctrine\ORM\EntityManagerInterface;

/**
 * @author Andrea Fiori
 * @since  14 January 2014
 */
abstract class DQLQueryHelper
{
	protected $queryBasic, $query;
	
	protected $entityManager;
	
	protected $bindParameters = array();
	
	protected $defaultFieldsSelect;
	
	protected $queryContainer;
	
	protected $queryBuilder;
	
	protected $doctrineConfig;
	
	protected $limit;
	
	public function __construct(EntityManagerInterface $entityManager)
	{
		$this->entityManager = $entityManager;
	}
		
	public function setDefaultFieldsSelect($fieldList)
	{
		$this->defaultFieldsSelect = $fieldList;
		
		return $this->defaultFieldsSelect;
	}
	
	public function getDefaultFieldsSelect()
	{
		return $this->defaultFieldsSelect;
	}

	abstract public function setQueryBasic();
	
	public function getQueryBasic()
	{
		return $this->queryBasic;
	}

	public function setBindParameters(array $parameters)
	{
		$this->bindParameters = $parameters;

		return $this->bindParameters;
	}

	public function getBindParameters()
	{
		return $this->bindParameters;
	}

	public function addToBindParameters($key, $value)
	{
		$this->bindParameters[$key] = $value;
	}
	
	public function getSelectQuery()
	{
		if (!$this->queryBasic) {
			$this->setqueryBasic();
		}
		
		return $this->getQueryBasic().$this->query;
	}
	
	public function getSelectResult()
	{
		$this->entityManager->create($this->entityManager->getConnection(), $this->entityManager->getConfiguration() );

		$query = $this->entityManager->createQuery($this->getSelectQuery());
		$query->setParameters( $this->getBindParameters() );
		if ($this->limit) {
			$query->setMaxResults($this->limit);
		}
		
		return $query->getResult();	
	}

	public function getDoctrineConfig()
	{
		return $this->doctrineConfig;
	}

	public function setOrderBy($oderBy)
	{
		$this->query .= "ORDER BY $oderBy ";
	}
	
	public function setLimit($limit)
	{
		if (is_numeric($limit)) {
			$this->limit = $limit;
		}
	}
}