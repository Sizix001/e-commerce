<?php

namespace App\Form;

use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\FraisPort;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('photo')
            ->add('price')
            ->add('cat', EntityType::class, [
                'class'=>Categories::class,
                'choice_label'=>'name',
                'attr'=>['class'=>'form-control inp2'],
                'label'=>'Catégorie'
            ])
            ->add('frais', EntityType::class, [
                'class'=>FraisPort::class,
                'choice_label'=>'price',
                'attr'=>['class'=>'form-control inp2'],
                'label'=>'Frais de port'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
