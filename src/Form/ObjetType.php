<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Objet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityRepository;
use Knp\Menu\FactoryInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Security\Core\Security;

class ObjetType extends AbstractType
{

    private $security;

    public function __construct(Security $security /* private Security $security*/)
    {
        $this->security = $security; //PHP7
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        if ($this->security->isGranted('ROLE_USER')) {
            $builder
                ->add('Nom', null)
                ->add('Description', null)
                ->add('Marque')
                ->add('Prix')
                ->add('categories', EntityType::class, [
                    'class' => Categories::class,
                    'label' => 'Catégories de l\'objet',
                    'multiple' => true,
                ])
                ->add('image', ImageType::class, [
                    'required' => false,
                ])
            ;
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Objet::class,
            'translation_domain' => 'forms'
        ]);
    }
}
