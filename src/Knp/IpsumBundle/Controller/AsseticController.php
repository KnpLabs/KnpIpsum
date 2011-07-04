<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AsseticController extends Controller
{
    public function indexAction()
    {
        return $this->render('KnpIpsumBundle:Assetic:index.html.twig');
    }
}
