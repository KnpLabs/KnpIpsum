<?php

namespace Knp\IpsumBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }
    
    /**
     * @param Request $request
     */
    public function createDemoMenu(Request $request)
    {
        $menu = $this->factory->createItem('root', array(
            'id'    => 'nav-ipsum',
            'class' => 'menu'
        ));

        $menu->setCurrentUri($request->getRequestUri());

        $menu->addChild('menu', array('route' => 'knp_ipsum_knp_menu'))->setLabel("KnpMenuBundle");
        $menu->addChild('menu-john', array('route' => 'knp_ipsum_knp_menu', 'routeParameters' => array('name' => "John")))->setLabel("KnpMenuBundle with John");
        $menu->addChild('menu-bob', array('route' => 'knp_ipsum_knp_menu', 'routeParameters' => array('name' => "Bob")))->setLabel("KnpMenuBundle with Bob");
        $menu->addChild('menu-bill', array('route' => 'knp_ipsum_knp_menu', 'routeParameters' => array('name' => "Bill")))->setLabel("KnpMenuBundle with Bill");
        
        return $menu;
    }
}
