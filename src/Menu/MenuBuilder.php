<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\Security\Core\Security;

class MenuBuilder
{
    private $factory;
    private $security; //PHP7

    /**
     * Add any other dependency you need...
     */
    public function __construct(FactoryInterface $factory, Security $security /* private Security $security*/)
    {
        $this->factory = $factory;
        $this->security = $security; //PHP7
    }

    public function createMainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Amazoom', ['route' => 'app']);
        $child = $menu->addChild('Produits', ['route' => 'objet_index']);
        if ($this->security->isGranted(('ROLE_USER'))) {
            $child->addChild('Afficher', ['route' => 'objet_index']);
            $child->addChild('Ajouter', ['route' => 'objet_new']);
        }
    
        if ($this->security->isGranted(('ROLE_ADMIN'))) {
            $menu->addChild('Nouvelle catégorie', ['route' => 'categories_new']);
        }

        if ($this->security->isGranted(('ROLE_USER'))) {
            $user = $this->security->getUser();
            $message = "Bienvenue, " . $user->getUsername();
            $child = $menu->addChild($message, [
                'uri' => '#',
            ]);
            $child->addChild('Déconnexion', [
                'route' => 'app_logout',
                'attributes' => [
                    'class' => 'menu-register',
                ]
            ]);
            $child->addChild('Panier', ['route' => 'panier_show']);
        }
        else{
            $menu->addChild('Se connecter', ['route' => 'app_login']);
            $menu->addChild('S\'inscrire', [
                'route' => 'app_register',
                'attributes' => [
                    'class' => 'menu-register',
                ]
            ]);
    }

        return $menu;
    }
}