<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knp\IpsumBundle\Entity\TimedThing;

class GedmoExtensionsController extends Controller
{
    public function indexAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $things = $em->getRepository('KnpIpsumBundle:TimedThing')->findAll();

        return $this->render('KnpIpsumBundle:GedmoExtensions:index.html.twig', array(
            'things' => $things,
        ));
    }

    public function createAction()
    {
        $em = $this->get('doctrine')->getEntityManager();

        // Let's create a new timed thing
        // note that we don't set the creation date. It will be added
        // automatically by the Doctrine extension based on the
        // mapping.
        $thing = new TimedThing();
        $thing->setName('Lorem '.uniqid());
        $thing->setContent('Lorem ipsum '.uniqid());

        // This does not actually save the entity but rather mark it
        // as "should-be-saved-on-the-next-flush"
        $em->persist($thing);

        // Now we save everything: let's flush!
        $em->flush();

        return $this->render('KnpIpsumBundle:GedmoExtensions:create.html.twig', array(
            'thing' => $thing,
        ));
    }

    public function updateAction($id)
    {
        $em = $this->get('doctrine')->getEntityManager();
        $thing = $em->getRepository('KnpIpsumBundle:TimedThing')->find($id);

        if (!$thing) {
            throw $this->createNotFoundException("TimedThing with id '$id' not found");
        }

        // Note that we don't update the updatedAt field. this will be
        // done automatically by the Doctrine extension based on the
        // mapping.
        $thing->setContent('Lorem ipsum '.uniqid().' updated');

        $em->flush();

        return $this->render('KnpIpsumBundle:GedmoExtensions:update.html.twig', array(
            'thing' => $thing,
        ));
    }
}
