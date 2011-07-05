<?php

namespace Knp\IpsumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Knp\Bundle\MenuBundle\Menu;

class CategoryAdmin extends Admin
{
    protected $list = array(
        'name' => array('identifier' => true),
        '_action' => array('actions' => array('edit' => array(), 'delete' => array())),
    );

    protected $form = array(
        'name',
    );

    protected $baseRoutePattern = '/category';

    public function getBreadcrumbs($action)
    {
        $menu = new Menu();
        $item = $menu->addChild('Home', $this->getRouter()->generate('_ipsum'));

        return $this->buildBreadcrumbs($action, $item);
    }
}
