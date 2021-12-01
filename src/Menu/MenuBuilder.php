<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MenuBuilder
{
    private $factory;
    /**
     * Add any other dependency you need...
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', ['route' => 'app']);
        $menu->addChild('Objets', ['route' => 'objet_index']);
        // ... add more children

        return $menu;
    }
}