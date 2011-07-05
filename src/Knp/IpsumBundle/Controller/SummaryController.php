<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SummaryController extends Controller
{
    public function indexAction()
    {
        return $this->render('KnpIpsumBundle:Summary:index.html.twig');
    }
    
}
