<?php

namespace Knp\IpsumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SwiftmailerController extends Controller
{
    public function indexAction()
    {
        return $this->render('KnpIpsumBundle:SwiftMailer:index.html.twig');
    }

    public function sendAction()
    {
        $email = $this->get('request')->query->get('email', 'nope@localhost.com');

        $vars = array('time' => date('H:i:s'));

        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('me@localhost.com')
            ->setTo($email)
            ->setBody($this->renderView('KnpIpsumBundle:SwiftMailer:email.html.twig', $vars), 'text/html')
            ->addPart($this->renderView('KnpIpsumBundle:SwiftMailer:email.txt.twig', $vars), 'text/plain')
        ;
        $this->get('mailer')->send($message);

        return $this->render('KnpIpsumBundle:SwiftMailer:send.html.twig');
    }
}
