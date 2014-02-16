<?php

namespace FlickrBackend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use ZendService\Flickr\Flickr;
use Flickr\Model\FlickrScraper;
use Flickr\Model\FlickrStore;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class FlickrBackendInsertorController extends AbstractActionController
{
	private $apiKey;
	
	public function indexAction()
	{
		$this->setApiKey();
		
		$flickrInstance = new Flickr( $this->getApiKey() );
		$flickrScraper = new FlickrScraper( $flickrInstance );
		$flickrStore = new FlickrStore( $flickrScraper );
		
		$photos = $flickrScraper->setTagSearch('education');
		foreach ($photos as $photo)
		{
			$imagesEntity = $flickrStore->setImageEntityProperties($photo);
			
			$objectManager = $this->getServiceLocator()->get('\Doctrine\ORM\EntityManager');
			$objectManager->persist($imagesEntity);
			$objectManager->flush();
		}
		
		return new JsonModel(
			array("data" => $photos)
		);
	}

		private function setApiKey()
		{
			$config = $this->getServiceLocator()->get('config');
			
			$this->apiKey = $config['flickr']['apiKey'];
			
			if (!$this->apiKey) {
				throw new \Exception('Flickr API Key is not set');
			}
			
			return $this->apiKey;
		}

		private function getApiKey()
		{
			return $this->apiKey;
		}
}