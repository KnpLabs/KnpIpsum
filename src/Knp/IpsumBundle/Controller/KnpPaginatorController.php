<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

class KnpPaginatorController extends Controller
{
    public function indexAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        /* @var $em \Doctrine\ORM\EntityManager */
        $query = $em->createQuery('SELECT t FROM KnpIpsumBundle:Thing t');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('KnpIpsumBundle:KnpPaginator:index.html.twig', array(
            'pagination' => $pagination,
        ));
    }
}
