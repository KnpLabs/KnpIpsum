<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knp\IpsumBundle\Document\Product;
use Knp\IpsumBundle\Document\Category;

class DoctrineOdmController extends Controller
{
    public function indexAction()
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $products = $dm->getRepository('KnpIpsumBundle:Product')->findAll();

        return $this->render('KnpIpsumBundle:DoctrineOdm:index.html.twig', array(
            'products' => $products,
        ));
    }

    public function createAction()
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');

        // Let's create a new product
        $product = new Product();
        $product->setName('Lorem'.\uniqid());

        $dm->persist($product);

        //Lets create a new category
        $category = new Category();
        $category->setName('Category'.\uniqid());

        $product->setCategory($category);

        $dm->flush();

        return $this->render('KnpIpsumBundle:DoctrineOdm:create.html.twig', array(
            'product' => $product,
        ));
    }

    public function deleteAction($id)
    {
        // Here we are only showing how you can delete an entity
        // In real life, a GET query should not create or delete your data
        // You should use a form and a POST
        // If you don't get why, the internet has the answer you're looking for

        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $product = $dm->getRepository('KnpIpsumBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException("Product with id '$id' not found");
        }

        $dm->remove($product);
        $dm->flush();

        return $this->render('KnpIpsumBundle:DoctrineOdm:delete.html.twig');
    }
}
