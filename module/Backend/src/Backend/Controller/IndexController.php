<?php

namespace Backend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        $this->layout('layout/backend');

        return array();
    }

    public function aboutAction()
    {
        $request = $this->getRequest();
        $results = $request->getQuery();

        $result = new ViewModel();
        $result->setTerminal(true);

        return $result;
    }

    public function articlesAction()
    {
        $request = $this->getRequest();
        $results = $request->getQuery();

        $result = new ViewModel();
        $result->setTerminal(true);

        return $result;
    }

    public function pagesAction()
    {
        $request = $this->getRequest();
        $results = $request->getQuery();

        $result = new ViewModel();
        $result->setTerminal(true);

        return $result;
    }
}
