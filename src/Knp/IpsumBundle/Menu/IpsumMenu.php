<?php

namespace Knp\IpsumBundle\Menu;

use Knp\Bundle\MenuBundle\Menu;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

class IpsumMenu extends Menu
{
    /**
     * @param Request $request
     * @param Router $router
     */
    public function __construct(Request $request, Router $router)
    {
        parent::__construct(array(
            'id'    => 'nav-ipsum',
            'class' => 'menu'
        ));

        $this->setCurrentUri($request->getRequestUri());

        $this->addChild('menu', $router->generate('_ipsum_knp_menu'))->setLabel("KnpMenuBundle");
        $this->addChild('menu-john', $router->generate('_ipsum_knp_menu', array('name' => "John")))->setLabel("KnpMenuBundle with John");
        $this->addChild('menu-bob', $router->generate('_ipsum_knp_menu', array('name' => "Bob")))->setLabel("KnpMenuBundle with Bob");
        $this->addChild('menu-bill', $router->generate('_ipsum_knp_menu', array('name' => "Bill")))->setLabel("KnpMenuBundle with Bill");
    }
}
