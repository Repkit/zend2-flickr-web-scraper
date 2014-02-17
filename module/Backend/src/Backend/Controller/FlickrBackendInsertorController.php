<?php

namespace Backend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use ZendService\Flickr\Flickr;
use Backend\Model\FlickrScraper;
use Backend\Model\FlickrStore;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class FlickrBackendInsertorController extends AbstractActionController
{
	private $objectManager;

	/**
	 * persist an image on the db
	 * avoid to insert image with same URL
	 */
	public function indexAction()
	{	
		$flickrInstance = new Flickr( $this->recoverFlickrApiKey() );
		$flickrScraper  = new FlickrScraper( $flickrInstance );
		$flickrStore 	= new FlickrStore( $flickrScraper );
		
		$photos = $flickrScraper->setTagSearch('education');
		foreach ($photos as $photo) {
			$imagesEntity = $flickrStore->setImageEntityProperties($photo);
			
			$this->objectManager = $this->getServiceLocator()->get('\Doctrine\ORM\EntityManager');

			$photo2 = $this->objectManager->getRepository('\Application\Entity\Images')
										  ->findOneBy( array('imageUrl' => $imagesEntity->getImageUrl()) );

			if ($photo2) {
				if ( !$photo2->getId() ) {
					$this->persistImage( $imagesEntity );
				}
			} else {
				$this->persistImage( $imagesEntity );
			}
		}
		
		return new JsonModel(
			array("data" => $photos)
		);
	}

		private function recoverFlickrApiKey()
		{
			$config = $this->getServiceLocator()->get('config');

			if ( !$config['flickr']['apiKey'] ) {
				throw new \Exception('Flickr API Key is not set');
			}
			
			return $config['flickr']['apiKey'];
		}

		private function persistImage(\Application\Entity\Images $imagesEntity)
		{
 			$this->objectManager->persist($imagesEntity);
			$this->objectManager->flush();
		}
}