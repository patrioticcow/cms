<?php

namespace Backend\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class AddpageValidator implements InputFilterAwareInterface

{
    protected $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter)
        {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

            $inputFilter->add(
                $factory->createInput([
                   'name' => 'title',
                   'required' => true,
                   'filters' => array(
                       array('name' => 'StripTags'),
                       array('name' => 'StringTrim'),
                   ),
               ])
            );

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}