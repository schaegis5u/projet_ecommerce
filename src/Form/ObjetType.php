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
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ObjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
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
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Objet::class,
            'translation_domain' => 'forms'
        ]);
    }
}
