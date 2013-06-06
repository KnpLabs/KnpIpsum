<?php

namespace Knp\IpsumBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'text', array('required' => true, 'label' => 'Your email:'));
        $builder->add('message', 'textarea', array('required' => true, 'label' => 'Your delightful message:'));
        $builder->add('attachment', 'file', array('data_class' => null, 'required' => false, 'label' => 'Your attachment:'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Knp\IpsumBundle\Form\Model\Contact',
        ));
    }

    public function getName()
    {
        return 'knpipsumbundle_contact';
    }
}
