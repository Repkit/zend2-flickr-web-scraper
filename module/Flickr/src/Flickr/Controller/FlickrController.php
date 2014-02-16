<?php

namespace Flickr\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use ZendService\Flickr\Flickr;
use Flickr\Model\FlickrScraper;
use Flickr\Model\FlickrStore;
use Flickr\Model\ImagesQueryBuilder;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class FlickrController extends AbstractActionController
{
	/**
	 * TODO: set a grid to get data from a get REST call
	 */
    public function indexAction()
    {
    	$apiKey = $this->getApiKeyFromServiceLocatorConfig();
    	if (!$apiKey) {
    		throw new \Exception('Flickr API Key is not set');
    	}
    	
    	$flickrInstance = new Flickr( $apiKey );
    	$flickrScraper = new FlickrScraper( $flickrInstance );
    	$flickrStore = new FlickrStore( $flickrScraper );
    	
    	/*
    	$imagesQueryBuilder = new ImagesQueryBuilder($this->getServiceLocator()->get('\Doctrine\ORM\EntityManager'));
    	$imagesQueryBuilder->setBasicBindParameters();
    	$imagesQueryBuilder->setQueryBasic();
    	$imagesQueryBuilder->setOrderBy("i.id DESC");
		$imagesQueryBuilder->setLimit(3);
		
    	var_dump( $imagesQueryBuilder->getSelectResult() );
    	*/
    	
    	$photos = $flickrScraper->setTagSearch('education');
		foreach ($photos as $photo)
		{
			/*
			echo '<img src="'. $photo->Thumbnail->uri .'" alt=""> <br>'." \n";
			echo $photo->title . "<br /> \n";
			echo $photo->Thumbnail->uri;
			*/
			$imagesEntity = $flickrStore->setImageEntityProperties($photo);

			/*
			$objectManager = $this->getServiceLocator()->get('\Doctrine\ORM\EntityManager');
			$objectManager->getRepository($entityName)->findAll();
			$objectManager->persist($imagesEntity);
			$objectManager->flush();
			*/
		}
		
		return array();
    }
    
    private function getApiKeyFromServiceLocatorConfig()
    {
    	$config = $this->getServiceLocator()->get('config');
    	return $config['flickr']['apiKey'];
	}
}
