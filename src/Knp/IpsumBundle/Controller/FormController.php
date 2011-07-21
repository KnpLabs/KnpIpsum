<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Knp\IpsumBundle\Form\Type\ContactType;
use Knp\IpsumBundle\Form\Model\Contact;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FormController extends Controller
{
    public function contactAction()
    {
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);

        $request = $this->container->get('request');

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $file = $form['attachment']->getData();
                if ($file) {
                    $file->move($contact->getUploadDir(), $contact->generateRandomFileName($file));
                }

                $ret = $contact->dummySend();

                $this->get('session')->setFlash('notice', $ret);

                return new RedirectResponse($this->generateUrl('knp_ipsum'));
            }
        }

        return $this->render('KnpIpsumBundle:Form:contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
