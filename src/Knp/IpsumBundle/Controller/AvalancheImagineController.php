<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AvalancheImagineController extends Controller
{
    public function indexAction()
    {
        return $this->render('KnpIpsumBundle:AvalancheImagine:index.html.twig');
    }
}
