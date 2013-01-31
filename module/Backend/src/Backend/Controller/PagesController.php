<?php

namespace Backend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Backend\Form\Addpage;
use Backend\Form\AddpageValidator;
use Backend\Model\Pages;
use Backend\Model\PagesTable;
use Zend\Debug\Debug as dump;

class PagesController extends AbstractActionController
{
    protected $pagesTable;

    public function pagesAction()
    {
        $form = new Addpage();

        $pagesResult = $this->getPagesTable()->fetchAll();

        $this->loadPage();

        return ['form' => $form, 'pages'=>$pagesResult];
    }

    public function addpageAction()
    {
        $form = new Addpage();

        $request = $this->getRequest();

        if($request->isPost())
        {
            $formValidator = new AddpageValidator();
            $form->setInputFilter($formValidator->getInputFilter());
            $form->setData($request->getPost());

            $page = new Pages();
            if($form->isValid()){
                $page->exchangeArray($form->getData());
                $this->getPagesTable()->savePages($page);
            }
        }

        return 'test';
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
