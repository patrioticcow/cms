<?php

namespace Backend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Backend\Form\Addpage;
use Backend\Form\AddpageValidator;
use Backend\Model\Pages;

class IndexController extends AbstractActionController
{

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

    public function aboutAction()
    {
        return $this->loadPage();
    }

    public function articlesAction()
    {
        return $this->loadPage();
    }

    public function pagesAction()
    {
        $form = new Addpage();

        $this->loadPage();

        return ['form' => $form];
    }

    public function loadPage()
    {
        $request = $this->getRequest();
        $results = $request->getQuery();

        $result = new ViewModel();
        $result->setTerminal(true);

        return $result;
    }
}
