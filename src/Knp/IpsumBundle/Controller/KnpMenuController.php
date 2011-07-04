<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class KnpMenuController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KnpIpsumBundle:KnpMenu:index.html.twig', array(
            'name' => $name
        ));
    }
}
