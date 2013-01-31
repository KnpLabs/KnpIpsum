<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LiipImagineController extends Controller
{
    public function indexAction()
    {
        return $this->render('KnpIpsumBundle:LiipImagine:index.html.twig');
    }
}
