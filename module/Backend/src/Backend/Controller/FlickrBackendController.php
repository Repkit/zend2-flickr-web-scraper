<?php

namespace Backend\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Backend\Model\ImagesQueryBuilder;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class FlickrBackendController extends AbstractRestfulController
{
	private $imagesQueryBuilder;

    public function getList()
    {
    	$this->setImagesQueryBuilder();
    	
    	$this->imagesQueryBuilder->setOrderBy("i.id DESC");

		return new JsonModel(array(
            'data' => $this->imagesQueryBuilder->getSelectResult(),
        ));
    }

    public function get($id)
    {
    	$this->setImagesQueryBuilder();
    	
    	$this->imagesQueryBuilder->setId($id);
    	$this->imagesQueryBuilder->setLimit(1);

    	return new JsonModel(array(
    			'data' => $this->imagesQueryBuilder->getSelectResult(),
    	));
	}
	
		private function setImagesQueryBuilder()
		{
			$this->imagesQueryBuilder = new ImagesQueryBuilder($this->getServiceLocator()->get('\Doctrine\ORM\EntityManager'));
			$this->imagesQueryBuilder->setBasicBindParameters();
			$this->imagesQueryBuilder->setQueryBasic();
		}
}