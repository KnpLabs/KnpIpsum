<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FOSRestController extends Controller
{
    public function indexAction()
    {
        $view = $this->get('fos_rest.view');
        /* @var $view \FOS\RestBundle\View\View */

        $em = $this->get('doctrine')->getEntityManager();
        $things = $em->getRepository('KnpIpsumBundle:TimedThing')->findAll();

        $view->setTemplate('KnpIpsumBundle:FOSRest:index.html.twig');
        $view->setParameters(array('things' => $things));

        return $view->handle();
    }
}
