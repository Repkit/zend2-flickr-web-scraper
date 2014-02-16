<?php

namespace Flickr\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class FlickrController extends AbstractActionController
{
    public function indexAction()
    {
		return new ViewModel();
    }
}
