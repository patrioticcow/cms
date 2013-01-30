<?php

namespace Backend\Form;

use Zend\Form\Form;

class Addpage extends Form

{
    public function __construct($name = null)
    {
        parent::__construct('backend');

        $this->setAttribute('method', 'post');

        $this->add(array(
                'name' => 'title',
                'type' => 'Zend\Form\Element\Text',
                'attributes' => array(
                        'class' => 'page_title',
                        'placeholder' => 'Enter page title',
                        'required' => 'required',
                ),
                'options' => array(
                        'label' => 'Title',
                ),
        ));

        $this->add(array(
                'name' => 'content',
                'type' => 'Zend\Form\Element\Textarea',
                'attributes' => array(
                        'class' => 'page_content',
                        'required' => 'required',
                ),
                'options' => array(
                ),
        ));

        $this->add(array(
                'name' => 'csrf',
                'type' => 'Zend\Form\Element\Csrf',
        ));
    }
}