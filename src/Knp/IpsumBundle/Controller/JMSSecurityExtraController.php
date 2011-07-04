<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;

class JMSSecurityExtraController extends Controller
{
    public function indexAction()
    {
        return $this->render('KnpIpsumBundle:JMSSecurityExtra:index.html.twig');
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function adminAction()
    {
        return $this->render('KnpIpsumBundle:JMSSecurityExtra:admin.html.twig');
    }
}
