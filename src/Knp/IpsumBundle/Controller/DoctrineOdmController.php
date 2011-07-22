<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knp\IpsumBundle\Document\Thing;
use Knp\IpsumBundle\Document\Category;

class DoctrineOdmController extends Controller
{
    public function indexAction()
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $things = $dm->getRepository('KnpIpsumBundle:Thing')->findAll();

        return $this->render('KnpIpsumBundle:DoctrineOdm:index.html.twig', array(
            'things' => $things,
        ));
    }

    public function createAction()
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');

        // Let's create a new thing
        $thing = new Thing();
        $thing->setName('Lorem'.\uniqid());

        $dm->persist($thing);

        //Lets create a new category
        $category = new Category();
        $category->setName('Category'.\uniqid());

        $thing->setCategory($category);

        $dm->flush();

        return $this->render('KnpIpsumBundle:DoctrineOdm:create.html.twig', array(
            'thing' => $thing,
        ));
    }

    public function deleteAction($id)
    {
        // Here we are only showing how you can delete an entity
        // In real life, a GET query should not create or delete your data
        // You should use a form and a POST
        // If you don't get why, the internet has the answer you're looking for

        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $thing = $dm->getRepository('KnpIpsumBundle:Thing')->find($id);

        if (!$thing) {
            throw $this->createNotFoundException("Thing with id '$id' not found");
        }

        $dm->remove($thing);
        $dm->flush();

        return $this->render('KnpIpsumBundle:DoctrineOdm:delete.html.twig');
    }
}
