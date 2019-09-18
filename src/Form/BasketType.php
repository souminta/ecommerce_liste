<?php

namespace App\Form;

use App\Entity\Basket;
use App\Entity\Product;
use App\Entity\User;
use App\Entity\Category;
use App\Entity\Order;
use App\Entity\SubCategory;
use App\Entity\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BasketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('user', EntityType::class, [
                            'class' => User::class,
                            'choice_label' => 'lastname',
                        ])
                ->add('product', EntityType::class, [
                                'class' => Product::class,
                                'choice_label' => 'name',
                            ]);
    
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Basket::class,
        ]);
    }
}
