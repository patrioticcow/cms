<?php

namespace Backend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Backend\Form\Addpage;
use Backend\Form\AddpageValidator;
use Backend\Model\Pages;
use Backend\Form\Addarticle;
use Backend\Model\PagesTable;

class IndexController extends AbstractActionController
{
    protected $pagesTable;

    public function indexAction()
    {
        $this->layout('layout/backend');

        $form = new Addpage();
        $request = $this->getRequest();

        if($request->isPost())
        {
            $user = new Pages();

            $formValidator = new AddpageValidator();
            {
                $form->setInputFilter($formValidator->getInputFilter());
                $form->setData($request->getPost());
            }

            if($form->isValid()){
                $user->exchangeArray($form->getData());
            }

        }

        return ['form' => $form];
    }

    public function layoutAction()
    {
        return $this->loadPage();
    }

    public function aboutAction()
    {
        return $this->loadPage();
    }

    public function articlesAction()
    {
        $form = new Addarticle();

        $this->loadPage();

        return ['form' => $form];
    }

    public function pagesAction()
    {
        $form = new Addpage();

        $pagesResult = $this->getPagesTable()->fetchAll();

        $this->loadPage();

        return ['form' => $form, 'pages'=>$pagesResult];
    }

    public function loadPage()
    {
        $request = $this->getRequest();
        $results = $request->getQuery();

        $result = new ViewModel();
        $result->setTerminal(true);

        return $result;
    }

    public function getPagesTable()
    {
        if (!$this->pagesTable) {
            $sm = $this->getServiceLocator();
            $this->pagesTable = $sm->get('Backend\Model\PagesTable');
        }
        return $this->pagesTable;
    }
}
