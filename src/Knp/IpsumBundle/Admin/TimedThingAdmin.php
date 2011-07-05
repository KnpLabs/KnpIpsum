<?php

namespace Knp\IpsumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Knp\Bundle\MenuBundle\Menu;

class TimedThingAdmin extends Admin
{
    protected $list = array(
        'name' => array('identifier' => true),
        'content',
        '_action' => array('actions' => array('view' => array(), 'edit' => array(), 'delete' => array())),
    );

    protected $view = array(
        'name' => array('identifier' => true),
        'content',
        'createdAt',
        'updatedAt',
    );

    protected $form = array(
        'name',
        'content',
    );

    protected $baseRoutePattern = '/timed-things';

    public function getBreadcrumbs($action)
    {
        $menu = new Menu();
        $item = $menu->addChild('Home', $this->getRouter()->generate('knp_ipsum'));

        return $this->buildBreadcrumbs($action, $item);
    }
}
