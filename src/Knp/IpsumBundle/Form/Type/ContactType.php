<?php

namespace Knp\IpsumBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('email', 'text', array('required' => true, 'label' => 'Your email:'));
        $builder->add('message', 'textarea', array('required' => true, 'label' => 'Your delightful message:'));
        $builder->add('attachment', 'file', array('required' => false, 'label' => 'Your attachment:'));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Knp\IpsumBundle\Form\Model\Contact',
        );
    }
}
