<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

class PagerfantaController extends Controller
{
    public function indexAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        /* @var $em \Doctrine\ORM\EntityManager */
        $query = $em->createQuery('SELECT t FROM KnpIpsumBundle:Thing t');
        $paginator = new Pagerfanta(new DoctrineORMAdapter($query));
        $paginator->setMaxPerPage(10);
        $paginator->setCurrentPage($this->get('request')->query->get('page', 1));

        return $this->render('KnpIpsumBundle:Pagerfanta:index.html.twig', array(
            'paginator' => $paginator,
        ));
    }
}
