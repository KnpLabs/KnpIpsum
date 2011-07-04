<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TwigController extends Controller
{
    public function helloAction($name)
    {
        return $this->render('KnpIpsumBundle:Twig:hello.html.twig', array(
            'name' => $name
        ));
    }
}
