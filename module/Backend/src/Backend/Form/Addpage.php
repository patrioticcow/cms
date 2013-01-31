<?php

namespace Backend\Form;

use Zend\Form\Form;

class Addpage extends Form

{
    public function __construct($name = null)
    {
        parent::__construct('add_page');

        $this->setAttribute('method', 'post');

        $this->add(array(
                'name' => 'title',
                'type' => 'Zend\Form\Element\Text',
                'attributes' => array(
                        'class' => 'page_name',
                        'placeholder' => 'Enter page name',
                ),
        ));

        $this->add(array(
                'name' => 'content',
                'type' => 'Zend\Form\Element\Textarea',
                'attributes' => array(
                        'class' => 'page_content',
                ),
        ));

        $this->add(array(
            'name' => 'page_id',
            'type' => 'Zend\Form\Element\Hidden',
        ));

        /*
        $this->add(array(
                'name' => 'csrf',
                'type' => 'Zend\Form\Element\Csrf',
        ));
        */

        $this->add(array(
                'name' => 'submit',
                'attributes' => array(
                    'type'  => 'Zend\Form\Element\Submit',
                    'class' => 'btn',
                    'value' => 'Save Page',
                ),
        ));
    }
}