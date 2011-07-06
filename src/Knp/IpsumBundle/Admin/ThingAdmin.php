<?php

namespace Knp\IpsumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Knp\Bundle\MenuBundle\Menu;

class ThingAdmin extends Admin
{
    protected $list = array(
        'name' => array('identifier' => true),
        'category',
        '_action' => array('actions' => array('edit' => array(), 'delete' => array())),
    );

    protected $form = array(
        'name',
        'category',
    );

    protected $baseRoutePattern = '/things';

    public function getBreadcrumbs($action)
    {
        $menu = new Menu();
        $item = $menu->addChild('Home', $this->getRouter()->generate('knp_ipsum'))->addChild('Dashboard', $this->getRouter()->generate('sonata_admin_dashboard'));

        return $this->buildBreadcrumbs($action, $item);
    }
}
