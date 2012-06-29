<?php

namespace Knp\IpsumBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormViewInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FileWithHelpType extends AbstractType implements FormTypeInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAttribute('help', $options['help']);
    }

    public function buildView(FormViewInterface $view, FormInterface $form, array $options)
    {
        $view->setVar('help', $form->getAttribute('help'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null,
            'help'       => 'Attach an awesome picture please!'
        ));
    }

    public function getParent()
    {
        return 'file';
    }

    public function getName()
    {
        return 'file_with_help';
    }
}