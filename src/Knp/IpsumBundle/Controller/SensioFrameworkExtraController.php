<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/sensio-frameworkextra")
 */
class SensioFrameworkExtraController extends Controller
{
    /**
     * @Route("/", name="_ipsum_sensio_frameworkextra")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/hello/{name}", name="_ipsum_sensio_frameworkextra_hello")
     * @Template()
     */
    public function helloAction($name)
    {
        return array('name' => $name);
    }

}
