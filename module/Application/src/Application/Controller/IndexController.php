<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * @author Andrea Fiori
 * @since  14 February 2014
 */
class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	$config = $this->getServiceLocator()->get('config');
    	
    	$viewModel = new ViewModel();
    	$viewModel->setVariable("urlGetImages", $config['flickr']['urlGetImages']);
        
    	return $viewModel;
    }
}
