<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knp\IpsumBundle\Entity\Thing;
use Knp\IpsumBundle\Entity\Category;

class DoctrineOrmController extends Controller
{
    public function indexAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $things = $em->getRepository('KnpIpsumBundle:Thing')->findAll();

        return $this->render('KnpIpsumBundle:DoctrineOrm:index.html.twig', array(
            'things' => $things,
        ));
    }

    public function customRepositoryAction()
    {
        $text = $this->get('request')->query->get('q', '');

        $em = $this->get('doctrine')->getEntityManager();
        $things = $em->getRepository('KnpIpsumBundle:Thing')->findAllWhoseNameContains($text);

        return $this->render('KnpIpsumBundle:DoctrineOrm:custom_repository.html.twig', array(
            'things' => $things,
            'text'   => $text,
        ));
    }

    public function createAction()
    {
        $em = $this->get('doctrine')->getEntityManager();

        // Let's create a new thing
        $thing = new Thing();
        $thing->setName('Lorem'.\uniqid());

        // This does not actually save the entity but rather mark it
        // as "should-be-saved-on-the-next-flush"
        $em->persist($thing);

        // ... and let's create a new category!
        // Yes sir, we are in a good mood today.
        $category = new Category();
        $category->setName('Category'.\uniqid());
        $thing->setCategory($category);

        $em->persist($category);

        // Now we save everything: let's flush!
        $em->flush();

        return $this->render('KnpIpsumBundle:DoctrineOrm:create.html.twig', array(
            'thing' => $thing,
        ));
    }

    public function deleteAction($id)
    {
        // Here we are only showing how you can delete an entity
        // In real life, a GET query should not create or delete your data
        // You should use a form and a POST
        // If you don't get why, the internet has the answer you're looking for

        $em = $this->get('doctrine')->getEntityManager();
        $thing = $em->getRepository('KnpIpsumBundle:Thing')->find($id);

        if (!$thing) {
            throw $this->createNotFoundException("Thing with id '$id' not found");
        }

        $em->remove($thing);
        $em->flush();

        return $this->render('KnpIpsumBundle:DoctrineOrm:delete.html.twig');
    }
}
